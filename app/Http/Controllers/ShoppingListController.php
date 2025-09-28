<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ListItem;
use App\Models\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingListController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {

        $list = Auth::user()->ShoppingList()->firstOrCreate();
        return view('dashboard')->with(['lists' => $list]);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Throwable
     */
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

        return Auth::user()->shoppingList()->firstOrCreate()
            ->listItems()->save($listItem);
    }

    /**
     * Takes the request and removes the list item id that relates to that value
     * @param Request $request
     * @return bool
     */
    public function removeItem(Request $request): bool {
        $validated = $request->validate(['list_item_id' => 'required|integer']);

        return Auth::user()->shoppingList()->firstOrFail()
            ->listItems()->find($validated['list_item_id'])
            ->delete();
    }

    /**
     * Returns the total cost of the shopping list for the authenticated user
     * @return float
     */
    public function shoppingListCost(): float {
        return Auth::user()->ShoppingList()->firstOrFail()->totalCost();
    }

    public function toggleAcquired(Request $request):bool {
        $validated = $request->validate(['list_item_id' => 'required|integer']);

        return Auth::user()->ShoppingList()->firstOrFail()
            ->listItems()->findOrFail($validated['list_item_id'])
            ->toggleAcquired()->save();
    }
}
