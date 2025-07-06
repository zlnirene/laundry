@extends('layouts.index')
@section('content')
    <form class="w-full mx-auto p-6 bg-white shadow-xl rounded-xl space-y-6 text-[14px]" action="{{ route('transaction.store') }}" method="post">
        @csrf
        <div class="flex flex-col space-y-4 *:*:first:w-1/4 *:*:last:w-3/4 *:*:first:font-medium">
            <div class="flex">
                <label for="customer" class="">Customer Name</label>
                <input type="text" id="customer" name="customer" class="h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
            </div>
            <div class="flex">
                <label for="cashier" class="">Cashier Name</label>
                <input type="text" id="cashier" name="cashier" class="h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
            </div>
            <div class="flex">
                <label for="no_transaction">Transaction ID</label>
                <input type="text" id="no_transaction" name="no_transaction" class="h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
            </div>
            <div class="flex">
                <label for="item">Item Service</label>
                <select class="js-create-basic-multiple mt-1 block w-full border-nav-text rounded-[4px] shadow-xl" id="item" name="items[]" multiple="multiple">
                    <option value="wash">Wash</option>
                    <option value="dry">Dry Clean</option>
                    <option value="WI">Wash and Iron</option>
                    <option value="SS">Self Service</option>
                    <option value="iron">Iron</option>
                </select>
            </div>
            <div class="flex">
                <label for="quantity">Quantity</label>
                <input type="text" id="quantity" name="quantity" class="h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
            </div>
            <div class="flex">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" min="0" class="h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
            </div>
            <div class="flex">
                <label for="total">Total</label>
                <input type="text" id="total" name="total" min="0" class="h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
            </div>
            <div class="flex">
                <label for="time">Time</label>
                <input id="timepicker" name="time" class="!font-normal h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
            </div>
            <div class="flex">
                <label for="date">Pick-Up Date</label>
                <input type="date" id="datepicker" name="date" class="!font-normal h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
            </div>
        </div>
        <div class="flex gap-2 place-content-end text-navy font-medium text-[14px]">
            <a href="{{ route('transaction.index') }}" class="flex justify-center w-[70px] bg-nav hover:bg-light border-2 border-nav h-fit py-1 rounded">Discard</a>
            <button type="submit" class="flex justify-center w-[70px] bg-nav hover:bg-light border-2 border-nav h-fit py-1 rounded" >Submit</button>
        </div>

    </form>
    <script>
        $(document).ready(function() {
            $('.js-create-basic-multiple').select2({
                // theme: 'tailwindcss-3'
                with: '100%',
            });
        })

        flatpickr("#timepicker", {
            enableTime: true,
            allowInput: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            defaultDate: flatpickr.formatDate(new Date(), "H:i")
            // defaultHour: flatpickr.formatDate(new Date(), "h"),
            // defaultMinute: flatpickr.formatDate(new Date(), "i")
        });
        flatpickr("#datepicker", {
            dateFormat: "d-m-Y",
            position: "auto center",
            allowInput: true,
            maxDate: "today",
            positionElement: document.querySelector("#datepicker"),
            nextArrow: '<icon class="fa-solid fa-angle-right size-[18px]"></icon>',
            prevArrow: '<icon class="fa-solid fa-angle-left size-[18px]"></icon>',
            defaultDate: flatpickr.formatDate(new Date(), "d-m-Y"),
        });
    </script>
@endsection