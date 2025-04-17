@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-12">
    <h2 class="text-2xl font-bold mb-4 text-center">Generate: {{ $template['name'] }}</h2>
    <form method="POST" action="{{ route('document.generate', $type) }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1" for="party_name">Your Name</label>
            <input class="w-full border p-2 rounded" type="text" name="party_name" id="party_name" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1" for="cnic">CNIC</label>
            <input class="w-full border p-2 rounded" type="text" name="cnic" id="cnic" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1" for="address">Address</label>
            <input class="w-full border p-2 rounded" type="text" name="address" id="address" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1" for="mobile">Mobile</label>
            <input class="w-full border p-2 rounded" type="text" name="mobile" id="mobile" required>
        </div>
        
        <button class="bg-blue-700 hover:bg-blue-900 text-white px-6 py-2 rounded w-full" type="submit">
            Generate PDF
        </button>
    </form>
</div>
@endsection