<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ListItem;
use App\Models\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingListController extends Controller
{
    public function index() {

        $list = Auth::user()->ShoppingList()->first();
        return view('dashboard')->with(['lists' => $list]);
    }

    public function addItem(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'sometimes|numeric',
            'quantity' => 'sometimes|numeric',
        ]);

        $item = new Item();
        $item->name = $validated['name'];
        $item->price = $validated['price'];
        $item->saveOrFail();

        $listItem = new ListItem([
            'item_id' => $item->id,
            'quantity' => $validated['quantity'],
        ]);

        return Auth::user()->shoppingList()->firstOrCreate()->listItems()->save($listItem);
    }

    public function removeItem(Request $request) {
        $validated = $request->validate(['listItem_id' => 'required|integer']);

        return Auth::user()->shoppingList()->firstOrFail()->listItems()->find($validated['listItem_id'])->delete();
    }
}
