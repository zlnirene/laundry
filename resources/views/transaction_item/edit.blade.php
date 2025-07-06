
@extends('layouts.index')

@section('content')
<div class="flex gap-2 place-content-end pt-2 text-[14px]">
    <div class="bg-light w-[200px] h-[35px] flex items-center rounded-[8px] border-[1.5px] border-blue">
        <select class="js-item-basic-single from-control w-full" name="" id="">
            <option value="wash">Wash</option>
            <option value="wash_and_iron">Wash and Iron</option>
            <option value="dry_clean">Dry Clean</option>
            <option value="steam">Steam</option>
        </select>
    </div>
    
    <div class="flex gap-2 w-fit *:h-[35px] *:bg-blue text-light *:rounded-[8px] *:transition-all duration-300 *:content-center *:justify-center *:border-[1.5px] *:last:hover:bg-light *:last:hover:text-blue *:border-blue font-medium">
        <div class=" flex items-center gap-1 px-[5px]">
            <span>Showing</span>
            <div class="bg-light w-fit rounded-sm p-[2px] h-fit text-blue self-center flex items-center gap-0.5">
                <select name="perPage" id="perPage" class="*:text-blue">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="flex items-center gap-1 px-[10px]">
            <a href="{{ route('item.create') }}" class="flex items-center gap-1 no-underline"><i class="fa-solid fa-plus"></i>New</a>
        </div>
    </div>
</div>
<div class="flex flex-wrap gap-5 mt-5">
    @foreach ($items as $item)
    <div class="flex *:first:rounded-l-[8px] *:last:rounded-r-[8px] w-[calc(1/3*100%-(--spacing(4)))] *:shadow-lg *:shadow-black/10">
        <img class="size-[120px] rounded-l-[8px] w-2/5" src="{{ asset('images/'. $item->image) }}" alt="{{ $item->name }}">
        <div class="flex flex-col bg-light p-2 pl-5 w-2/3 gap-3 justify-center">
            <div class="text-[16px] font-semibold leading-none">{{ $item->name }}</div>
            <div class="text-[14px] flex flex-col leading-none gap-1">
                <span>{{ $item->price }}</span>
                <span>{{ $item->unit }}</span>
            </div>
            {{-- @include('layouts._btn') --}}
        </div>
    </div>
    @endforeach
</div>
<script>
$(document).ready(function() {
    $('.js-item-basic-single').select2({
        theme: 'tailwindcss-3',
        allowClear: true,
        placeholder: "Select item",
    })
});
</script>
@endsection
