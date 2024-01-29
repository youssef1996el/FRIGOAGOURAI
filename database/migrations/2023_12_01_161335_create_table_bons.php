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
        Schema::create('table_bons', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing primary key column named 'id'
            $table->bigInteger('number')->default(0); // This is not a primary key
            $table->timestamps(); // This will add 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_bons');
    }
};
