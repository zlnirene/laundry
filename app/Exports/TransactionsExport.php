<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $transactions;

    public function __construct(Collection $transactions)
    {
        $this->transactions = $transactions;
    }

    public function collection()
    {
        return $this->transactions->loadMissing('transactionsItems.item');
    }

    public function map($transaction): array
    {
        return [
            $transaction->no_transaction,
            format_date($transaction->date),
            format_time($transaction->time),
            $transaction->customer,
            $transaction->transactionsItems->where('transaction_id', $transaction->id)->first()?->item?->name,
            $transaction->transactionsItems->where('transaction_id', $transaction->id)->first()?->quantity,
            $transaction->transactionsItems->where('transaction_id', $transaction->id)->first()?->price ?? '0',
            $transaction->transactionsItems->where('transaction_id', $transaction->id)->first()?->total ?? '0',
            $transaction->cashier,
        ];
    }

    public function headings(): array
    {
        return [
            'Transaction ID',
            'Date',
            'Time',
            'Customer Name',
            'Item Name',
            'Quantity',
            'Price',
            'Total',
            'Cashier',
        ];
    }
}
