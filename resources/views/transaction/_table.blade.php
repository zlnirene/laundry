<div class="min-w-full border-3 border-blue rounded-[10px] mt-[10px]">
    <table class="group table-auto mx-auto w-full *:*:*:text-center *:*:*:first:w-[150px] text-[14px]">
    <thead class="bg-blue h-[30px] text-light *:first:*:first:rounded-tl-[6px] *:first:*:last:rounded-tr-[6px] ">
        <tr>
            <th class="">Transaction ID</th>
            <th class="">Date</th>
            <th class="">Time</th>
            <th class="">Customer</th>
            <th class="">Cashier</th>
            <th class="">Action</th>
        </tr>
    </thead>
    <tbody class="bg-light *:*:h-[5vh] *:*:px-[1vw] rounded-es-xl *:last:*:first:rounded-bl-[6px] *:last:*:last:rounded-br-[6px] divide-y-[1.5px] divide-blue *:last:*:pb-[10px]  *:*:text-center *:*:p-[5px]">
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->no_transaction }}</td>
                <td>{{ $transaction->date }}</td>
                <td>{{ $transaction->time }}</td>
                <td>{{ $transaction->customer }}</td>
                <td>{{ $transaction->cashier }}</td>
                <td class="">
                    <div class="flex gap-[10px] items-center justify-center min-w-0 !max-w-[210px] mx-auto flex-wrap">
                        <a onclick="delete_data({{ $transaction->id }})" href="javascript:void(0)" class="flex flex-row text-navy *:hover:text-navy text-[14px] items-center gap-1 bg-nav px-[8px] w-min py-[2px] hover:bg-light border-[1.5px] border-nav hover:border-navy hover:border-[1.5px] rounded-[5px]"><i class="fa-solid fa-trash"></i>Delete</a>
                    </div>
                </td>
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
<div class="d-flex flex-row justify-content-center pt-2">
    {{ $transactions->links() }}
    <div>
        <p class="text-sm text-navy leading-5">
            {!! __('Showing') !!}
            @if ($transactions->links()->paginator->firstItem())
                <span class="font-medium">{{ $transactions->links()->paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="font-medium">{{ $transactions->links()->paginator->lastItem() }}</span>
            @else
                {{ $transactions->links()->paginator->count() }}
            @endif
            {!! __('of') !!}
            <span class="font-medium">{{ $transactions->links()->paginator->total() }}</span>
            {!! __('results') !!}
        </p>
    </div>
</div>
<script>
    update_status = (id) => {
        let status = $('#status' + id).find('option:selected').val();
        $.post(...)
    }
</script>