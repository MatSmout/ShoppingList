<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use Illuminate\Support\Facades\Auth;

class ShoppingListController extends Controller
{
    public function index() {

        $list = Auth::user()->ShoppingList()->first();
        return view('dashboard')->with(['lists' => $list]);
    }
}
