@extends('layouts.app') {{-- update if you're using a different layout --}}

@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Generate: {{ $template['name'] }}</h2>

        <form method="POST" action="">
            @csrf

            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input name="full_name" class="border border-gray-300 rounded w-full px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700">CNIC</label>
                <input name="cnic" class="border border-gray-300 rounded w-full px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700">Mobile Number</label>
                <input name="mobile" class="border border-gray-300 rounded w-full px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700">Address</label>
                <input name="address" class="border border-gray-300 rounded w-full px-3 py-2" required>
            </div>

            <button type="submit" class="bg-blue-700 hover:bg-blue-900 text-white px-6 py-3 rounded">
                Generate Document
            </button>
        </form>
    </div>
@endsection
