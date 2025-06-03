<?php 
$user_id = 1;
?>
@extends('layouts.index')
@section('content')
<div class="w-[90%] mx-auto mt-[2vh]">
        <h1 class="text-navy font-semibold text-xl">Item Service</h1>
        <div class="flex justify-between pt-2">
            <div class="bg-light w-[200px] h-[35px] flex items-center rounded-xl border-[1.5px] border-navy">
                <select class="js-item-placeholder-single js-items from-control w-full text-sm" name="" id="">
                    <option value="wash">Wash</option>
                    <option value="wash_and_iron">Wash and Iron</option>
                    <option value="dry_clean">Dry Clean</option>
                    <option value="steam">Steam</option>
                </select>
            </div>
            
            <div class="flex w-fit *:hover:bg-light *:bg-navy *:h-[35px] gap-2 *:rounded-lg *:hover:border-[1.5px] text-light *:hover:text-navy *:content-center *:justify-center ">
            <div class="w-[80px] flex items-center gap-1 text-light hover:text-navy">
                <x-fas-plus class="size-[20px]"/>
                <a href="{{ route('item.create') }}" class="no-underline font-medium">New</a>
            </div>

            <div class="w-[130px] flex items-center gap-1 hover:*:first:bg-navy hover:*:first:text-light">
                <div class="bg-light w-fit rounded-sm px-[2px] h-fit hover:text-light text-navy self-center flex items-center gap-0.5">
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
            <a class="w-[40px] items-center flex ">
                <x-fas-arrow-up-short-wide class="size-[25px]"/>
            </a>
            <div class="w-[40px] items-center flex">
                <x-fas-ellipsis class="size-[25px]"/>
            </div>
            </div>
        </div>
        <div class="min-w-full border-3 border-blue rounded-[15px] mt-[10px]">
          <table class="group table-auto mx-auto w-full *:*:*:text-center *:*:*:first:w-[50px]">
            <thead class="bg-blue h-[30px] text-light *:first:*:first:rounded-tl-[10px] *:first:*:last:rounded-tr-[10px] ">
              <tr>
                <th class=""></th>
                <th class="">Item</th>
                <th class="">Unit</th>
                <th class="">Price</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody class="bg-light *:*:h-[5vh] *:*:px-[1vw] rounded-es-xl *:last:*:first:rounded-bl-xl *:last:*:last:rounded-br-xl divide-y-[1.5px] divide-blue *:last:*:pb-[20px]  *:*:text-center *:*:p-[5px]">
              <tr>
                <td><img src="{{ url('images/wash.jpg') }}" alt=""></td>
                <td>Wash</td>
                <td>3kg</td>
                <td>$1.00</td>
                <td>
                    <div class="flex gap-3 justify-center *:*:bg-light *:*:border-[1.5px] border-navy *:*:p-[5px] *:*:text-navy *:*:hover:bg-navy *:*:hover:text-light *:*:w-[30px] *:*:h-[30px] *:*:self-center *:*:flex *:*:items-center *:*:justify-center *:*:rounded-[5px]">
                        <div class="">
                            
                            <a href="{{ route('item.edit',['id'=> $user_id]) }}"><x-fas-pencil class=""/></a>
                        </div>
                        <div class="">
                            <a href="{{ route('item.destroy',['id'=> $user_id]) }}"><x-fas-trash class=""/></a>
                        </div>
                    </div>
                </td>
              </tr>
    
            </tbody>
          </table>
        </div>
</div>
<script>
    $(".js-item-placeholder-single").select2({
        placeholder: "Select items",
        allowClear: true
        theme:
    });
</script>
@endsection
