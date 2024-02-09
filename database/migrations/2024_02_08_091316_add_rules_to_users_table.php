<?php

use App\Models\User;
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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->nullable()->default(false);
            $table->boolean('is_revisor')->nullable()->default(false);
            $table->boolean('is_writer')->nullable()->default(false);
        });

        User::create([
            'name' => 'admin',
            'surname' => 'acc',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12341234'),
            'is_admin' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        User::where('email', 'admin@gmail.com')->delete();

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'is_revisor', 'is_writer']);
        });
    }
};
