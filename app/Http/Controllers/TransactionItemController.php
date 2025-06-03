<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionItemController extends Controller
{
    public function index()
    {
        return view(view: 'transaction_item.index');
    }

    public function create()
    {
        return view('transaction_item.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('transaction_item.index');
    }

    public function edit($id)
    {
        return view('transaction_item.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('transaction_item.index');
    }

    public function destroy()
    {
        return redirect()->route('transaction_item.index');
    }
}
