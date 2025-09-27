<?php

use App\Models\Item;
use App\Models\ShoppingList;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lists_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ShoppingList::class);
            $table->foreignIdFor(Item::class);
            $table->boolean('acquired')->default(false);
            $table->integer('quantity')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lists_items');
    }
};
