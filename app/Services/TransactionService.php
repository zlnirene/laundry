<?php

namespace App\Services;

use App\Models\Transaction;

class TransactionService extends Service
{
    public function search($params = [])
    {
        $transaction = Transaction::orderBy('id', 'desc');

        $customer = $params['customer'] ?? '';
        if ($customer !== '') $transaction = $transaction->where('customer', 'like', "%$customer%");

        $date = $params['date'] ?? '';
        if ($date !== '') $params['date'] = unformat_date($date);

        $range = $params['range'] ?? '';
        if (($range !== '') && (count(explode(" to ", $range)) > 1)) {
            $from = unformat_date(explode(" to ", $range)[0]);
            $to = unformat_date(explode(" to ", $range)[1]);
            $transaction = $transaction->whereBetween('date', [$from, $to]);
        }

        $transaction = $this->searchFilter($params, $transaction, ['no_transaction', 'date']);
        $transaction = $transaction->with(['transactionsItems.item']);
        return $this->searchResponse($params, $transaction);
    }

    public function find($value, $column = 'id')
    {
        return Transaction::where($column, $value)->first();
    }

    public function store($params)
    {
        return Transaction::create($params);
    }

    public function update($params, $id)
    {
        $transaction = Transaction::find($id);
        if (!empty($transaction)) $transaction->update($params);
        return $transaction;
    }

    public function delete($id)
    {
        $transaction = Transaction::find($id);
        if (!empty($transaction)) {
            try { $transaction->delete(); } catch (\Exception $e) { 
                return ['error' => 'Delete failed! This data currently being used']; 
            }
        }
        
        return $transaction;
    }

    public function getTotal($item, $userQuantity)
    {
        $price = $item->price;
        $unit = (double)$item->unit;
        $quantity = (double)$userQuantity;

        $pricePerKg = $price / $unit;
        $total = $pricePerKg * $quantity;
        return $total;
    }

}

?>