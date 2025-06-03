<?php

namespace App\Services;

use App\Models\Transaction;

class TransactionService extends Service
{
    public function search($params = [])
    {
        $transaction = Transaction::orderBy('id');

        $customer = $params['customer'] ?? '';
        if ($customer !== '') $transaction = $transaction->where('customer', 'like', "%$customer%");

        $transaction = $this->searchFilter($params, $transaction, ['no_transaction', 'date']);
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
            try { $transaction->delete(); } catch (\Exception $e) { return ['error' => 'Delete failed! This data currently being used']; }
        }
        return $transaction;
    }

}

?>