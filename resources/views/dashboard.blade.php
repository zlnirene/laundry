@extends('layouts.index')

@section('content')
    <div class="w-full flex-row min-w-md *:bg-light *:basis-full *:lg:basis-1/4 *:md:basis-1/2 gap-5 *:h-[120px] *:text-blue *:rounded-[10px] *:border-[1.5px] *:border-blue flex items-center py-2">
        <div class="flex items-center justify-center flex-col">
            <h3 class="text-[18px] font-medium mb-2">Total Transactions Today</h3>
            <p id="total-price-today" class="text-[28px] font-bold text-navy">$ {{ number_format($totalPriceToday, 2, '.', ',') }}</p>
        </div>
        <div class="flex items-center justify-center flex-col">
            <h2 class="text-[18px] font-medium mb-2">Today Orders</h2>
            <p id="today-orders" class="text-4xl font-bold text-navy">{{ $todayOrders }}</p>
        </div>
        <div class="flex items-center justify-center flex-col">
            <h2 class="text-[18px] font-medium mb-2">Weekly Orders</h2>
            <p id="today-orders" class="text-4xl font-bold text-navy">{{ $weeklyOrders }}</p>
        </div>
        <div class=""></div>
    </div>

<div class="flex mt-[10px] gap-4">
    <div class="min-w-3/4">
        <div class="flex flex-row justify-between items-center mb-1">
            <div class="text-[24px] text-navy font-bold">Latest Transaction</div>
            <div class="place-content-end flex py-2">
                <form action="" method="get" class="flex text-[14px] w-fit *:h-[35px] *:bg-blue text-light *:rounded-[8px] *:content-center *:justify-center *:hover:bg-light *:hover:text-blue *:border-[1.5px] *:border-blue font-medium">
                    @csrf
                    <div class="px-2">
                        <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                        <input name="customer" value="{{ request('customer') }}" placeholder="Search Customer" class="pr-6 pl-2">
                    </div>
                </form>
            </div>
        </div>
        <div class="border-3 border-blue rounded-[10px] h-fit">
            <table class="group table-auto mx-auto w-full *:*:*:text-center *:*:*:first:w-[150px] text-[14px]">
                <thead class="bg-blue h-[30px] text-light *:first:*:first:rounded-tl-[6px] *:first:*:last:rounded-tr-[6px] ">
                    <tr>
                        <th class="">Transaction ID</th>
                        <th class="">Date</th>
                        <th class="">Time</th>
                        <th class="">Customer</th>
                        <th class="">Item Laundry</th>
                        <th class="">Total</th>
                    </tr>
                </thead>
                <tbody class="bg-light *:*:h-[5vh] *:*:px-[1vw] rounded-es-xl *:last:*:first:rounded-bl-[6px] *:last:*:last:rounded-br-[6px] divide-y-[1.5px] divide-blue *:last:*:pb-[10px]  *:*:text-center *:*:p-[5px]">
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->no_transaction }}</td>
                            <td>{{ format_date($transaction->date) }}</td>
                            <td>{{ format_time($transaction->time) }}</td>
                            <td>{{ $transaction->customer }}</td>
                            <td>{{ $transaction->transactionsItems->where('transaction_id', $transaction->id)->first()?->item?->name }}</td>
                            <td>${{ number_format($transaction->transactionsItems->where('transaction_id', $transaction->id)->first()?->total ?? 0, 2, '.', ',') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($transactions->count() === 0)
                <div class="text-center text-navy py-4">
                    <p class="text-sm">{{ __('No transactions found') }}</p>
                </div>
            @endif
        </div>
    </div>
    <div class="w-1/4 h-[200px] bg-light rounded-[10px] border-3 border-blue">
        {{-- <canvas id="chart"></canvas> --}}
    </div>
</div>

@endsection
@push('scripts')
<script>
    let $chart = $('#chart')

    new Chart($chart, {
    type: 'pie',
    data: data,
    options: {
        interaction: {
            mode: 'index'
        }
    }
});
</script>
@endpush


