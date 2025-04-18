<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserPendingApproval extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The pending User instance.
     *
     * @var \App\Models\User
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        // Store the user so the view can access it
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('[Lawza] New User Pending Approval')
            ->view('emails.new_user_pending') // make sure this view exists
            ->with([
                'userEmail'   => $this->user->email,
                'userPackage' => $this->user->package,
            ]);
    }
}
