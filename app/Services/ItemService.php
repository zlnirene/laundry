<?php

namespace App\Services;

use App\Models\Item;

class ItemService extends Service
{
    public function search($params = [])
    {
        $item = Item::orderBy('id');

        $name = $params['name'] ?? '';
        if ($name !== '') $item = $item->where('name', 'like', "%$name%");

        $item = $this->searchFilter($params, $item, ['items']);
        return $this->searchResponse($params, $item);
    }

    public function find($value, $column = 'id')
    {
        return Item::where($column, $value)->first();
    }

    public function store($params)
    {
        if (isset($params['image']) && $params['image'] instanceof \Illuminate\Http\UploadedFile) {
            $filename = time() . '_' . $params['image']->getClientOriginalName();
            $params['image']->storeAs('public/items', $filename);
            $params['image'] = $filename;
        }
        return Item::create($params);
    }

    public function update($params, $id)
    {
        $item = Item::find($id);
        if (!empty($item)) $item->update($params);
        return $item;
    }

    public function delete($id)
    {
        $item = Item::find($id);
        if (!empty($item)) {
            try { $item->delete(); } catch (\Exception $e) { return ['error' => 'Delete failed! This data currently being used']; }
        }
    }
}
?>