<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class ShoppingList extends Model
{
    use HasFactory;
    public function listItems(): hasMany {
        return $this->hasMany(ListItem::class);
    }
    public function items(): HasManyThrough
    {
        return $this->hasManyThrough(Item::class, ListItem::class);
    }

    public function totalCost(): float
    {
        $costs = [];

        foreach ($this->listItems()->get() as $listItem) {
            $costs[] = ($listItem->quantity * $listItem->item->price);
        }

        return array_sum($costs);
    }
}
