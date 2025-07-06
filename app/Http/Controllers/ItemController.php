<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ItemService;
use App\Services\DocumentService;
use Dom\Document;

class ItemController extends Controller
{
    protected $itemService;
    public function __construct()
    {
        $this->itemService = new ItemService();
    }
    public function index()
    {
        return view('item.index');
    }

    public function search(Request $request)
    {
        $items = $this->itemService->search($request->all());
        return view('item._table', compact('items'));
    }

    public function create()
    {
        return view('item._form');
    }

    public function store(Request $request)
    {
        $filename = DocumentService::save_file($request, 'photo', 'public/images/items');
        if ($filename !== '') $request->merge(['image' => $filename]);
        
        return $this->itemService->store($request->all());
    }

    public function edit($id)
    {
        $item = $this->itemService->find($id);
        return view('item._form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $filename = DocumentService::save_file($request, 'photo', 'public/images/items');
        if ($filename !== '') $request->merge(['image' => $filename]);
        
        return $this->itemService->update($request->all(), $id);
    }

    public function destroy($id)
    {
        $item = $this->itemService->find($id);
        DocumentService::delete_file($item->image);
        return $this->itemService->delete($id);
    }
}
