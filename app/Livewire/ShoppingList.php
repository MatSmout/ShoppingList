<?php

namespace App\Livewire;

use Livewire\Component;

class ShoppingList extends Component
{
    public $shoppingList;
    public function mount($list)
    {
        $this->shoppingList = $list;
    }

    public function render()
    {
        return view('livewire.shopping-list');
    }
}
