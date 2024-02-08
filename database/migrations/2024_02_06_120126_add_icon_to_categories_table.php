<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('icons')->after('name');
        });

        $allCategories = Category::all();
        $icons = [
            'fa-solid fa-earth-americas',
            'fa-solid fa-briefcase',
            'fa-regular fa-image',
            'fa-solid fa-clapperboard',
            'fa-solid fa-gamepad',
            'fa-solid fa-music',
            'fa-regular fa-futbol',
        ];
       foreach ($allCategories as $key => $category) {
            $category->update(['icons' => $icons[$key]]);
       }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('icons');
        });
    }
};
