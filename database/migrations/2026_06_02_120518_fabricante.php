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
        Schema::create('fabricantes', function (Blueprint $table) {
				$table->id();                                           // ID único
				$table->string('nome');                                
				$table->string('pais');                                   
				$table->timestamps();                                   // created_at e updated_at
			});
    }
};
