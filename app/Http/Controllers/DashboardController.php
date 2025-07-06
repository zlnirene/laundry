<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use App\Services\TransactionService;
use App\Services\TransactionItemService;
use App\Services\ItemService;

class DashboardController extends Controller
{

protected $transactionService, $transactionItemService, $itemService;

public function __construct()
{
        $this->transactionService = new Transactionservice();
        $this->transactionItemService = new TransactionItemService();
        $this->itemService = new ItemService();
}
public function index(Request $request)
{
    $todayOrders = Transaction::whereDate('created_at', now())->count();
    $totalPriceToday = TransactionItem::join('transactions', 'transaction_items.transaction_id', '=', 'transactions.id')
    ->whereDate('transactions.created_at', now())
    ->sum('transaction_items.total');
    $startOfWeek = date('Y-m-d 00:00:00', strtotime('monday this week'));
    $endOfWeek = date('Y-m-d 23:59:59', strtotime('sunday this week'));
    $weeklyOrders = Transaction::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

    $transactions = $this->transactionService->search();
    $transactions = $this->transactionService->search($request);
    $transaction_items = $this->transactionItemService->search();
    $item = $this->itemService->search();
    return view('dashboard', compact( ['todayOrders', 'weeklyOrders', 'totalPriceToday', 'transactions', 'item', 'transaction_items']));
}

    public function create()
    {
        return view('dashboard.create');
    }

    public function store()
    {
        return redirect()->route('dashboard.index');
    }

    public function edit()
    {
        return view('dashboard.edit');
    }

    public function update()
    {
        return redirect()->route('dashboard.index');
    }

    public function destroy()
    {
        return redirect()->route('dashboard.index');
    }
}
