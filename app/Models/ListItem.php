<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    public $table = 'lists_items';
    use HasFactory;

    public function shoppingList() {
        return $this->belongsTo(ShoppingList::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function toggleAcquired()
    {
        $this->acquired = !$this->acquired;
    }
}
