<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                {{ __("You're logged in!") }}
            </div>

            <!-- ✅ New Document Template Buttons -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4">Generate New Property Document</h2>
                <ul>
                    @foreach($templates as $t)
                        <li class="mb-2">
                            <form method="get" action="{{ route('document.form', $t['key']) }}" style="display:inline">
                                <button type="submit" class="bg-blue-700 hover:bg-blue-900 text-white px-4 py-2 rounded">
                                    {{ $t['name'] }}
                                </button>
                                <span class="text-gray-500 text-sm ml-2">{{ $t['description'] }}</span>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>

