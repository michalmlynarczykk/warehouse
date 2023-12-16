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

        return redirect()->route('items.all')->with('success', 'Item added successfully!');
    }


    public function all()
    {
        $items = Item::paginate(15);
        return view('items.all', compact('items'));
    }
}