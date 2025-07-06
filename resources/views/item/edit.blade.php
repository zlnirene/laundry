@extends('layouts.index')
@section('content')
    <form action="{{ route('item.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="flex flex-col text-[14px] gap-2">
            <div class="flex flex-col *:last:bg-form gap-2 *:first:w-1/4 *:last:w-full *:first:font-medium">
                <label for="name">Items Name</label>
                <input type="text" id="name" name="name" class="" value="{{ $item->name }}">
            </div>
            <div class="flex flex-col *:last:bg-form gap-2 *:first:w-1/4 *:last:w-full *:first:font-medium">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" value="{{ $item->price }}">
            </div>
            <div class="flex flex-col *:last:bg-form gap-2 *:first:w-1/4 *:last:w-full *:first:font-medium">
                <label for="unit">Unit</label>
                <input type="text" name="unit" id="unit" value="{{ $item->unit }}">
            </div>
            <div class="flex flex-col *:last:bg-form gap-2 *:first:w-1/4 *:last:w-full *:first:font-medium">
                <label for="image">Image</label>
                <input type="file" name="photo" id="image">
            </div>
        </div>
        <button type="submit">submit</button>
    </form>
@endsection