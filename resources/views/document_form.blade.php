<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate New Property Document') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-10 px-4">
        <!-- Your existing document form content -->
        <ul>
            @foreach($templates as $t)
                <li>
                    <a href="{{ route('document.generate', ['template_id' => $t->id]) }}"
                       class="text-blue-600 hover:text-blue-800 underline">
                        {{ $t->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
