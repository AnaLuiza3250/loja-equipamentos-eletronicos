<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->string('processador')->nullable()->after('detalhes');
            $table->string('memoria_ram')->nullable()->after('processador');
            $table->string('armazenamento')->nullable()->after('memoria_ram');
            $table->string('tamanho_tela')->nullable()->after('armazenamento');
            $table->string('resolucao_camera')->nullable()->after('tamanho_tela');
            $table->string('sistema_operacional')->nullable()->after('resolucao_camera');
        });
    }

    public function down(): void
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->dropColumn([
                'processador', 
                'memoria_ram', 
                'armazenamento', 
                'tamanho_tela', 
                'resolucao_camera', 
                'sistema_operacional'
            ]);
        });
    }
};
