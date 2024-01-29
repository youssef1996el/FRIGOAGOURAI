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
        Schema::create('historique', function (Blueprint $table) {
            $table->id();
            $table->string('dateoperation')->nullable();
            $table->string('client')->nullable();
            $table->decimal('entree',10,2)->default(0)->nullable();
            $table->decimal('sortie',10,2)->default(0)->nullable();
            $table->string('status')->nullable();
            $table->decimal('total',10,2)->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique');
    }
};
