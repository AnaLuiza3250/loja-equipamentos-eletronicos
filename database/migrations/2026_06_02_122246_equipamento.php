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
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();                                           // ID único
            $table->string('nome');                                
            $table->float('preco');                                   
            
            $table->foreignId('tipos_id')                      
                ->constrained()
                ->onDelete('cascade');                                                             
            
            $table->foreignId('fabricantes_id')
                ->constrained()                                     
                ->onDelete('cascade');  

            $table->integer('estoque')->default(0); 
            
            $table->string('detalhes');
            $table->timestamps();                                   // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamento');
    }
};