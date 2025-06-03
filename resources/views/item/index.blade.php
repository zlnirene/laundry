<?php 
$user_id = 1;
?>
@extends('layouts.index')

@section('content')
<div class="w-[90%] mx-auto mt-[2vh]">
        <h1 class="text-navy font-semibold text-[18px]">Item Service</h1>


    <div class="flex gap-2 place-content-end pt-2">
        <div class="bg-light w-[200px] h-[35px] flex items-center rounded-[8px] border-[1.5px] border-navy">
            <select class="js-item-basic-single from-control w-full text-sm" name="" id="">
                <option value="wash">Wash</option>
                <option value="wash_and_iron">Wash and Iron</option>
                <option value="dry_clean">Dry Clean</option>
                <option value="steam">Steam</option>
            </select>
        </div>
        
        <div class="flex gap-2 w-fit *:h-[35px] *:bg-light text-navy *:rounded-[8px] *:content-center *:justify-center *:hover:bg-navy *:hover:text-light *:border-[1.5px] *:border-navy">
          <div class="w-[80px] flex items-center gap-1">
            <a href="{{ route('item.create') }}" class="flex items-center gap-1 no-underline font-medium"><x-fas-plus class="size-[20px]"/>New</a>
          </div>

          <div class="w-[130px] flex items-center gap-1 hover:*:first:bg-light hover:*:first:text-navy">
            <div class="bg-navy w-fit rounded-sm px-[2px] h-fit hover:text-navy text-light self-center flex items-center gap-0.5">
              <div class="">
                <select name="perPage" id="perPage" class="*:text-navy">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
              </div>
              
            </div>
            <div class="">per page</div>
          </div>
        </div>
    </div>
        <div class="min-w-full border-3 border-blue rounded-[15px] mt-[10px]">
          <table class="group table-auto mx-auto w-full *:*:*:text-center *:*:*:first:w-[100px] [thead>tr>th:nth-child(1)]:w-[100px] [thead>tr>th:nth-child(2)]:w-[200px] [thead>tr>th:nth-child(3)]:w-[200px]">
            <thead class="bg-blue h-[30px] text-light *:first:*:first:rounded-tl-[10px] *:first:*:last:rounded-tr-[10px] ">
              <tr class="*:first:pl-[50px]">
                <th class=""></th>
                <th class="">Item</th>
                <th class="">Unit</th>
                <th class="">Price</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody class="bg-light *:*:h-[5vh] *:*:px-[1vw] rounded-es-xl *:last:*:first:rounded-bl-xl *:last:*:last:rounded-br-xl divide-y-[1.5px] divide-blue *:last:*:pb-[20px]  *:*:text-center *:*:p-[5px] *:*:first:pl-[50px]">
              <tr>
                <td><img src="{{ url('images/wash.jpg') }}" class="size-[40px] rounded-[5px]" alt=""></td>
                <td>Wash</td>
                <td>3kg</td>
                <td>$1.00</td>
                <td>
                    <div class="flex gap-3 justify-center  *:border-[1.5px] border-navy *:p-[7px] *:text-navy *:hover:bg-navy *:hover:text-light *:h-[35px] \  *:self-center *:flex *:items-center *:justify-center *:rounded-[5px]">
                        <a class="" href="{{ route('item.edit',['id'=> $user_id]) }}"><x-fas-pencil class="size-[20px] mr-[5px]"/>Edit</a>
                        <a href="{{ route('item.destroy',['id'=> $user_id]) }}"><x-fas-trash class="size-[20px] mr-[5px]"/>Delete</a>
                    </div>
                </td>
              </tr>
              <tr>
                <td><img src="{{ url('images/wash.jpg') }}" class="size-[40px] rounded-[5px]" alt=""></td>
                <td>Wash</td>
                <td>3kg</td>
                <td>$1.00</td>
                <td>
                    <div class="flex gap-3 justify-center  *:border-[1.5px] border-navy *:p-[7px] *:text-navy *:hover:bg-navy *:hover:text-light *:h-[35px] \  *:self-center *:flex *:items-center *:justify-center *:rounded-[5px]">
                        <a class="" href="{{ route('item.edit',['id'=> $user_id]) }}"><x-fas-pencil class="size-[20px] mr-[5px]"/>Edit</a>
                        <a href="{{ route('item.destroy',['id'=> $user_id]) }}"><x-fas-trash class="size-[20px] mr-[5px]"/>Delete</a>
                    </div>
                </td>
              </tr>
              <tr>
                <td><img src="{{ url('images/wash.jpg') }}" class="size-[40px] rounded-[5px]" alt=""></td>
                <td>Wash</td>
                <td>3kg</td>
                <td>$1.00</td>
                <td>
                    <div class="flex gap-3 justify-center  *:border-[1.5px] border-navy *:p-[7px] *:text-navy *:hover:bg-navy *:hover:text-light *:h-[35px] \  *:self-center *:flex *:items-center *:justify-center *:rounded-[5px]">
                        <a class="" href="{{ route('item.edit',['id'=> $user_id]) }}"><x-fas-pencil class="size-[20px] mr-[5px]"/>Edit</a>
                        <a href="{{ route('item.destroy',['id'=> $user_id]) }}"><x-fas-trash class="size-[20px] mr-[5px]"/>Delete</a>
                    </div>
                </td>
              </tr>
              <tr>
                <td><img src="{{ url('images/wash.jpg') }}" class="size-[40px] rounded-[5px]" alt=""></td>
                <td>Wash</td>
                <td>3kg</td>
                <td>$1.00</td>
                <td>
                    <div class="flex gap-3 justify-center  *:border-[1.5px] border-navy *:p-[7px] *:text-navy *:hover:bg-navy *:hover:text-light *:h-[35px] \  *:self-center *:flex *:items-center *:justify-center *:rounded-[5px]">
                        <a class="" href="{{ route('item.edit',['id'=> $user_id]) }}"><x-fas-pencil class="size-[20px] mr-[5px]"/>Edit</a>
                        <a href="{{ route('item.destroy',['id'=> $user_id]) }}"><x-fas-trash class="size-[20px] mr-[5px]"/>Delete</a>
                    </div>
                </td>
              </tr>
              <tr>
                <td><img src="{{ url('images/wash.jpg') }}" class="size-[40px] rounded-[5px]" alt=""></td>
                <td>Wash</td>
                <td>3kg</td>
                <td>$1.00</td>
                <td>
                    <div class="flex gap-3 justify-center  *:border-[1.5px] border-navy *:p-[7px] *:text-navy *:hover:bg-navy *:hover:text-light *:h-[35px] \  *:self-center *:flex *:items-center *:justify-center *:rounded-[5px]">
                        <a class="" href="{{ route('item.edit',['id'=> $user_id]) }}"><x-fas-pencil class="size-[20px] mr-[5px]"/>Edit</a>
                        <a href="{{ route('item.destroy',['id'=> $user_id]) }}"><x-fas-trash class="size-[20px] mr-[5px]"/>Delete</a>
                    </div>
                </td>
              </tr>
    
            </tbody>
          </table>
        </div>
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
