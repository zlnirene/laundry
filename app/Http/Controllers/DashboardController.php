<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
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
