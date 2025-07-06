<form id="form_info" class="w-full mx-auto p-6 bg-white shadow-xl rounded-xl space-y-6 text-[14px]" >
    @csrf
    <div class="">
        <h3>{{ !empty($transaction) ? 'Ubah' : 'Tambah' }} Transaction</h3>
    </div>
    <div class="flex flex-col space-y-4 *:*:first:w-1/4 *:*:last:w-3/4 *:*:first:font-medium">
        <div class="flex">
            <label for="customer" class="">Customer Name</label>
            <input type="text" id="customer" name="customer" class="h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
        </div>
        <div class="flex">
            <label for="cashier" class="">Cashier Name</label>
            <input type="text" id="cashier" name="cashier" class="h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
        </div>
        <div class="flex hidden">
            <label for="no_transaction">Transaction ID</label>
            <input type="text" id="no_transaction" name="no_transaction" class="h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
        </div>
        <div class="flex">
            <label for="item">Item Service</label>
            <select class="item-single" name="item_id" id="item">
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex">
            <label for="quantity">Quantity</label>
            <input type="text" id="quantity" name="quantity" class="h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
        </div>
        <div class="flex hidden">
            <label for="time">Time</label>
            <input id="timepicker" name="time" class="!font-normal h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
        </div>
        <div class="flex hidden">
            <label for="date">Pick-Up Date</label>
            <input type="date" id="datepicker" name="date" class="!font-normal h-[30px] mt-1 block border-1 border-nav-text rounded-[4px] shadow-xl">
        </div>
    </div>
    <div class="flex gap-2 place-content-end text-navy font-medium text-[14px]">
        <button type="button" onclick="init()" class="flex justify-center w-[70px] bg-nav hover:bg-light border-2 border-nav h-fit py-1 rounded">Discard</button>
        <button type="submit" class="flex justify-center w-[70px] bg-nav hover:bg-light border-2 border-nav h-fit py-1 rounded" >Submit</button>
    </div>
</form>

    <script>
        id = '{{ $transaction->id ?? '' }}';
        $form_info = $('#form_info');
        $form_info.submit((e) => {
            e.preventDefault();
            let url = base_url;
            let data = new FormData($form_info.get(0));
            if (id !== '') url += '/' + id + '?_method=put';
            $.ajax({
                url,
                type: 'post',
                data,
                cache: false,
                processData: false,
                contentType: false,
                success: () => init(),
            }).fail((xhr) => {
                error_handle(xhr.responseText);
            });
        });
        $(document).ready(function() {
            $('.item-single').select2({
                placeholder: 'Select Item Service',
                allowClear: true,
                width: '100%',
            });
        });
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

        $(document).ready(function() {
            $('#price').on('input', function() {
                let price = parseFloat($(this).val()) || 0;
                $('#total').val(price);
            });

            const day = new Date().getDay();
            const dayCode = day === 0 ? 7 : day;

            const counterKey = 'counter_day_' + dayCode;

            let lastCounter = localStorage.getItem(counterKey);
            if (lastCounter === null) {
            lastCounter = 0;
            } else {
                lastCounter = parseInt(lastCounter);
            }

            let nextCounter = lastCounter + 1;

            let transactionID = '' + dayCode + nextCounter;

            $('#no_transaction').val(transactionID);

            localStorage.setItem(counterKey, nextCounter);
        });
    </script>