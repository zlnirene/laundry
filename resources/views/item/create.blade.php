@extends('layouts.index')

@section('content')
    <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data" class="w-full max-w-2xl mx-auto mt-10 mb-5 p-8 bg-white shadow-xl rounded-xl space-y-6 text-sm">
        @csrf
        <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">New Item</h2>
        <div class="flex flex-col gap-1">
            <label for="name" class="text-gray-700 font-medium">Items Name</label>
            <input type="text" id="name" name="name" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue">
        </div>
        <div class="flex flex-col gap-1">
            <label for="price" class="text-gray-700 font-medium">Price</label>
            <input type="text" id="price" name="price" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue">
        </div>
        <div class="flex flex-col gap-1">
            <label for="unit" class="text-gray-700 font-medium">Unit</label>
            <input type="text" name="unit" id="unit" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue">
        </div>
        <div class="flex flex-col gap-1">
            <label for="image" class="text-gray-700 font-medium">Image</label>
            <input type="file" name="photo" id="image" class="border border-gray-300 rounded-lg px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-navy hover:file:bg-blue-100">
        </div>
        <button type="submit" class="bg-navy hover:bg-nav hover:text-navy text-white font-semibold px-6 py-2 rounded-lg transition duration-200">Submit</button>
    </form>
@endsection