<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use App\Services\TransactionItemService;
use App\Services\ItemService;
use App\Exports\TransactionsExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    protected $transactionService;
    protected $transactionItemService;
    protected $itemService;

    public function __construct()
    {
        $this->transactionService = new Transactionservice();
        $this->transactionItemService = new TransactionItemService();
        $this->itemService = new ItemService();
    }

    public function index()
    {
        return view('transaction.index');
        
    }

    public function search(Request $request)
    {
        $transactions = $this->transactionService->search($request->all());
        return view('transaction._table', compact('transactions'));
    }

    public function create()
    {
        $items = $this->itemService->search();
        return view('transaction._form', compact('items'));
    }

    public function store(Request $request)
    {
        $item = $this->itemService->find($request->item_id, 'id');
        
        $request->merge([
            'date' => unformat_date($request->date),
            'time' => format_time($request->time, false),
            'price' => $item->price,
        ]);

        $id = $this->transactionService->store($request->all())->id;
        
        $request->merge([
            'transaction_id' => $id
        ]);
        $total = $this->transactionService->getTotal($item, $request->quantity);
        $request->merge([
            'total' => $total
        ]);
        $this->transactionItemService->store($request->all());
    }

    public function edit($id)
    {
        $transaction = $this->transactionService->find($id);
        return view('transaction._form', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        return $this->transactionService->update($request->all(), $id);
        // $this->transactionService->update($request->all(), $id);
        // return redirect()->route('transaction.index');
    }

    public function destroy($id)
    {
        return $this->transactionService->delete($id);
        // $this->transactionService->delete($id);
        // return redirect()->route('transaction.index');
    }

    public function export_pdf(Request $request)
    {
        $transactions = $this->transactionService->search();
        $pdf = Pdf::loadView('exports.transactions', compact('transactions'));
        return $pdf->download('transactions.pdf');
    }

    public function export_excel(Request $request)
    {
        $transactions = $this->transactionService->search($request->all());
        return Excel::download(new TransactionsExport($transactions), 'transactions.xlsx');
    }
}