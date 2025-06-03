<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('item.index');
    }

    public function create()
    {
        return view('item.create');
    }

    public function store()
    {
        return redirect()->route('item.index');
    }

    public function edit()
    {
        return view('item.edit');
    }

    public function update()
    {
        return redirect()->route('item.index');
    }

    public function destroy()
    {
        return redirect()->route('item.index');
    }
}
