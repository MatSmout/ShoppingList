<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use App\Models\ShoppingList as ShoppingListModel;
use Illuminate\View\Component;

class ShoppingList extends Component
{
    /**
     * Create a new component instance.
     */

    public ShoppingListModel $data;

    public function __construct(ShoppingListModel $data)
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shopping-list')->with(['data' => $this->data]);
    }
}
