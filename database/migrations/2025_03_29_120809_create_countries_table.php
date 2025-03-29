<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // php artisan db:seed --class=CountriesTableSeeder

        Schema::create('countries', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('code', 10)->unique(); // Country code (e.g., "US")
            $table->string('name'); // Country name
            $table->tinyInteger('status')->default(0); // Status (default: 0)
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
