<x-guest-layout>
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">📄 Available Legal Documents</h1>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @php
                $documents = [
                    'affidavit' => 'Affidavit',
                    'application-for-name-correction' => 'Application for Name Correction',
                    'bank-authority-letter' => 'Bank Authority Letter',
                    'demand-letter' => 'Demand Letter',
                    'gift-deed' => 'Gift Deed',
                    'indemnity-bond' => 'Indemnity Bond',
                    'partnership-deed' => 'Partnership Deed',
                    'power-of-attorney' => 'Power of Attorney',
                    'rent-deed' => 'Rent Deed',
                    'sale-agreement' => 'Sales Agreement',
                    'undertaking' => 'Undertaking',
                    'will-document' => 'Last Will / Testament'
                ];
            @endphp

            @foreach($documents as $slug => $title)
                <div class="bg-white rounded-lg shadow p-6 flex flex-col justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700">{{ $title }}</h2>
                        <p class="text-sm text-gray-500 mt-1">Click to generate this document.</p>
                    </div>
                    <a href="{{ route('login') }}?next={{ $slug }}"
                       class="mt-4 inline-block text-center bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded text-sm font-medium">
                        View Document
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
