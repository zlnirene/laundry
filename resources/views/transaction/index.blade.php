@extends('layouts.index')
@section('content')
  <div class="w-[90%] mx-auto mt-[2vh]">
    <h1 class="text-navy font-semibold text-xl">History Transaction</h1>
    <div class="flex justify-between pt-2">
      <div class=" w-fit">
        <form action="tabs" class="flex text-sm w-full h-[35px] bg-light border-[1.5px] text-navy rounded-lg gap-1 items-center *:mx-[5px] *:hover:bg-nav *:active:bg-nav *:pr-[15px] *:py-[4px] *:rounded">
          <div class="">
            <input type="radio" id="transaction" name="tab" value="AllTransaction" class="invisible">
            <label for="transaction">All Transaction</label>
          </div>
          <div class="">
            <input type="radio" id="pickup" name="tab" value="PickUps" class="invisible">
            <label for="pickup">Pickups</label>
          </div>
          <div class="">
            <input type="radio" id="unpaid" name="tab" value="Unpaid" class="invisible">
            <label for="unpaid">Unpaid</label>
          </div>
        </form>
      </div>
      <div class="flex gap-2 place-content-center">
        <div class="bg-light w-[200px] h-[35px] flex items-center rounded-lg border-[1.5px] border-navy">
              <select class="js-item-basic-single from-control w-full text-sm" name="" id="">
                  <option value="wash">Wash</option>
                  <option value="wash_and_iron">Wash and Iron</option>
                  <option value="dry_clean">Dry Clean</option>
                  <option value="steam">Steam</option>
              </select>
        </div>
        <div class="flex w-fit *:hover:bg-light *:bg-navy *:h-[35px] gap-2 *:rounded-lg *:hover:border-[1.5px] text-light *:hover:text-navy *:content-center *:justify-center ">
          <div class="w-[80px] flex items-center gap-1 text-light hover:text-navy">
            <x-fas-plus class="size-[20px]"/>
            <a href="{{ route('transaction.create') }}" class="no-underline font-medium">New</a>
          </div>
  
          <div class="w-[120px] flex items-center gap-1 hover:*:first:bg-navy hover:*:first:text-light">
            <div class="bg-light w-fit rounded-sm px-[2px] h-fit hover:text-light text-navy self-center flex items-center gap-0.5">
              <div class="">10</div>
              <x-fas-angle-down class="size-[15px]"/>
            </div>
            <div class="">per page</div>
          </div>
  
          <div class="w-[40px] items-center flex ">
            <x-fas-calendar-days class="size-[25px]"/>
          </div>
          <a class="w-[40px] items-center flex ">
            <x-fas-arrow-up-short-wide class="size-[25px]"/>
          </a>
          <div class="w-[40px] items-center flex">
            <x-fas-ellipsis class="size-[25px]"/>
          </div>
        </div>
      </div>
    </div>

      <div class="">
        <div class="min-w-full border-3 border-blue rounded-[15px] mt-[10px]">
          <table class="group table-auto mx-auto w-full *:*:*:text-center *:*:*:first:w-[50px]">
            <thead class="bg-blue h-[30px] text-light *:first:*:first:rounded-tl-[10px] *:first:*:last:rounded-tr-[10px] ">
              <tr>
                <th class="">ID</th>
                <th class="">Date</th>
                <th class="">Time</th>
                <th class="">Customer</th>
                <th class="">Item</th>
                <th class="">Quantity</th>
                <th class="">Price</th>
                <th class="">Total</th>
                <th class="">Cashier</th>
              </tr>
            </thead>
            <tbody class="bg-light *:*:h-[5vh] *:*:px-[1vw] rounded-es-xl *:last:*:first:rounded-bl-xl *:last:*:last:rounded-br-xl divide-y-[1.5px] divide-blue *:last:*:pb-[10px]  *:*:text-center *:*:p-[5px]">
              <tr>
                <td>12</td>
                <td>12 May</td>
                <td>9 AM</td>
                <td>Cassie</td>
                <td>Wash</td>
                <td>5kg</td>
                <td>$3.00</td>
                <td>$3.00</td>
                <td>Jane</td>
              </tr>
              <tr>
                <td>12</td>
                <td>12 May</td>
                <td>9 AM</td>
                <td>Cassie</td>
                <td>Wash</td>
                <td>5kg</td>
                <td>$3.00</td>
                <td>$3.00</td>
                <td>Jane</td>
              </tr>
              <tr>
                <td>12</td>
                <td>12 May</td>
                <td>9 AM</td>
                <td>Cassie</td>
                <td>Wash</td>
                <td>5kg</td>
                <td>$3.00</td>
                <td>$3.00</td>
                <td>Jane</td>
              </tr>
              <tr>
                <td>12</td>
                <td>12 May</td>
                <td>9 AM</td>
                <td>Cassie</td>
                <td>Wash</td>
                <td>5kg</td>
                <td>$3.00</td>
                <td>$3.00</td>
                <td>Jane</td>
              </tr>
    
            </tbody>
          </table>
        </div>
        <div class=""></div>
      </div>

      
  </div>
<script>
$(document).ready(function() {
    $('.js-item-basic-single').select2({
        theme: 'tailwindcss-3',
        allowClear: true,
        placeholder: "Select Item",
    })
});
</script>
@endsection