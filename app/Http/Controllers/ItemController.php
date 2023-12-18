<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Item;
use App\Models\OrderItem;
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
                ->paginate(Constants::PAGINATION_SIZE);
        } else {
            return Item::sortable()
                ->paginate(Constants::PAGINATION_SIZE);
        }
    }

    public function updateForm($itemId)
    {
        $item = Item::findOrFail($itemId);
        return view('items.update', compact('item'));
    }


    public function updateItem(Request $request, $itemId)
    {
        $item = Item::findOrFail($itemId);
        $item->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'available_amount' => $request->input('available_amount'),
        ]);

        return redirect()->route('items.update', $item->id)->with('success', 'Item updated successfully');
    }

    public function deleteItem($itemId)
    {
        $item = Item::findOrFail($itemId);
        $itemInOrders = OrderItem::where('item_id', $itemId)->exists();

        if ($itemInOrders) {
            return redirect()->route('items.admin_all')->with('error', 'Cannot delete item. It is associated with one or more orders.');
        }
        Item::destroy($itemId);
        return redirect()->route('items.admin_all', $item->id)->with('success', 'Item deleted successfully');
    }
}
