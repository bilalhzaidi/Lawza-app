use Illuminate\Support\Facades\Auth;
use App\Notifications\QuotaLowNotification;

public function download($documentId)
{
    $user = auth()->user();
    $subscription = $user->subscription;

    // Check if subscription exists and is active
    if (!$subscription || $subscription->documents_quota <= $subscription->documents_used) {
        $user->update(['is_blocked' => true]);
        Auth::logout();
        return redirect()->route('login')->withErrors(['message' => 'Quota exhausted. Renew your subscription.']);
    }

    // Increment used documents
    $subscription->increment('documents_used');

    // Optional: Notify if quota low
    $remaining = $subscription->documents_quota - $subscription->documents_used;
    if ($remaining <= 2) {
        $user->notify(new QuotaLowNotification($remaining));
    }

    // Replace this with your actual PDF generation logic
    return response()->download(storage_path("app/documents/{$documentId}.pdf"));
}
