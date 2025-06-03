<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transaction.index');
        
    }

    public function create()
    {
        return view('transaction.create');
    }

    public function store()
    {
        return redirect()->route('transaction.index');
    }

    public function edit()
    {
        return view('transaction.edit');
    }

    public function update()
    {
        return redirect()->route('transaction.index');
    }

    public function destroy()
    {
        return redirect()->route('transaction.index');
    }
}
