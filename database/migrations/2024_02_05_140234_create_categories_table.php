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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $categories = [
            'Mondo',
            'Economia',
            'Arte',
            'Cinema',
            'Giochi',
            'Musica',
            'Sport'
        ];

        foreach($categories as $category) {
            Category::create(['name' => $category]);
        }
        // $categories = [
        //     ['name' => 'Mondo', 'icon' => 'fa-solid fa-earth-americas'],
        //     ['name' => 'Economia', 'icon' => 'fa-solid fa-briefcase'],
        //     ['name' => 'Arte', 'icon' => 'fa-regular fa-image'],
        //     ['name' => 'Cinema', 'icon' => 'fa-solid fa-clapperboard'],
        //     ['name' => 'Giochi', 'icon' => 'fa-solid fa-gamepad'],
        //     ['name' => 'Musica', 'icon' => 'fa-solid fa-music'],
        //     ['name' => 'Sport', 'icon' => 'fa-regular fa-futbol'],
        // ];
        // foreach($categories as $category) {
        //     echo $category['icon'];
        //     Category::create(
        //         ['name' => $category['name']],
        //         ['icon' => $category['icon']]
        //     );
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
