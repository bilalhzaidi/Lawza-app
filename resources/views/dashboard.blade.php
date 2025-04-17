@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6 text-center">Generate New Property Document</h2>

    <ul>
        @foreach($templates as $t)
            <li class="mb-4">
                <form method="get" action="{{ route('document.form', $t['key']) }}" style="display:inline">
                    <button type="submit" class="bg-blue-700 hover:bg-blue-900 text-white px-4 py-2 rounded">
                        {{ $t['name'] }}
                    </button>
                    <span class="text-gray-700 text-sm ml-2">{{ $t['description'] ?? '' }}</span>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
