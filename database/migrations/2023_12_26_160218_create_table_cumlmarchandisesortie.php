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
        Schema::create('table_cumlmarchandisesortie', function (Blueprint $table) {
            $table->id();
            $table->string('dateoperation')->nullable();
            $table->decimal('cuml',10,2)->nullable();
            $table->decimal('nombre',10,2)->nullable();
            $table->foreignId('idclient')->references('id')->on('clients')->onDelete('cascade');
            $table->string('compagnie')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_cumlmarchandisesortie');
    }
};
