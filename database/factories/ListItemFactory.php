<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ShoppingList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListItem>
 */
class ListItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween( 1,10),
            'shopping_list_id' => ShoppingList::factory(),
            'item_id' => Item::factory(),
            'acquired' => $this->faker->boolean(),
        ];
    }
}
