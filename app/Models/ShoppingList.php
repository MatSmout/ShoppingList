<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShoppingList extends Model
{

    public function listItems(): hasMany {
        return $this->hasMany(ListItem::class);
    }
    public function items(): HasManyThrough {
        return $this->hasManyThrough(Item::class, ListItem::class);
    }
}
