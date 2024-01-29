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
        Schema::create('lignemarchandisesortie', function (Blueprint $table) {
            $table->id();
            $table->decimal('qte',10,2)->nullable();
            $table->string('produit')->nullable();
            $table->foreignId('idmarchandisesortie')->references('id')->on('marchandisesortie')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lignemarchandisesortie');
    }
};
