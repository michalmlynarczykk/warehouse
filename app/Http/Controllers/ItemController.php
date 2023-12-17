<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
        return view('items.create');
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|gt:0',
            'available_amount' => 'required|integer|gt:0',
        ]);

        Item::create($request->all());

        return redirect()->route('items.admin_all')->with('success', 'Item added successfully!');
    }


    public function all(Request $request)
    {
        $items = $this->getItems($request);
        return view('items.all', compact('items'));
    }

    public function adminAll(Request $request)
    {
        $items = $this->getItems($request);
        return view('items.admin_all', compact('items'));
    }

    /**
     * @return mixed
     */
    private function getItems(Request $request)
    {
        $filter = $request->query('filter');
        if (!empty($filter)) {
            return Item::sortable()
                ->where('name', 'like', '%' . $filter . '%')
                ->paginate(10);
        } else {
            return Item::sortable()
                ->paginate(10);
        }
    }
}
