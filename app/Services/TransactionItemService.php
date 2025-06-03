<?php

namespace App\Services;

use App\Models\TransactionItem;

class TransactionItemService extends Service
{
    public function search($params = [])
    {
        $transactionItem = TransactionItem::orderBy('id');

        $id_transaction = $params['transaction_id'] ?? '';
        if ($id_transaction !== '') $transactionItem = $transactionItem->where('transaction_id', 'like', "%$id_transaction%");

        $customer_name = $params['customer_name'] ?? '';
        if ($customer_name !== '') $transactionItem = $transactionItem->whereHas('transaction', fn($transaction) => $transaction->where('customer', 'like', "%$customer_name%"));

        $transactionItem = $this->searchFilter($params, $transactionItem, ['date']);
        return $this->searchResponse($params, $transactionItem);
    }

    public function find($value, $column = 'id')
    {
        return TransactionItem::where($column, $value)->first();
    }

    public function store($params)
    {
        return TransactionItem::create($params);
    }

    public function update($params, $id)
    {
        $transactionitem = TransactionItem::find($id);
        if (!empty($transactionitem)) $transactionitem->update($params);
        return $transactionitem;
    }

    public function delete($id)
    {
        $transactionitem = TransactionItem::find($id);
        if (!empty($transactionitem)) {
            try { $transactionitem->delete(); } catch (\Exception $e) { return ['error' => 'Delete failed! This data currently being used']; }
        }
        return $transactionitem;
    }

}

?>