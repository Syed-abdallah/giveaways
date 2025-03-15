<?php

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
        Schema::create('unhappies', function (Blueprint $table) {
            $table->id();
            $table->string('amazon_id')->nullable();
            $table->string('option');
            $table->string('option2');
            $table->string('noid', 100);
            $table->string('email');
            $table->string('name');
            $table->text('shipping_address')->nullable();
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unhappies');
    }
};
