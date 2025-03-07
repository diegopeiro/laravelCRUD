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
        //Atributos de la tabla categorías
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->timestamps();
        });

        //Agrego la clave foránea (FK) en la tabla ejercicios
        Schema::table('ejercicios', function (Blueprint $table) {
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Modifico tabla ejercicios
        Schema::table('ejercicios', function (Blueprint $table) {
            //Dropeo fk
            $table->dropForeign(['categoria_id']);
            //Elimino columna
            $table->dropColumn('categoria_id');
        });

        Schema::dropIfExists('categorias');
    }
};
