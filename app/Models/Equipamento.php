<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = [
        'nome',
        'preco',
        'estoque',
        'detalhes',
        'image',
        'fabricantes_id', // Corrigido para bater com o banco de dados
        'tipos_id',       // Corrigido para bater com o banco de dados
        'processador',
        'memoria_ram',
        'armazenamento',
        'tamanho_tela',
        'resolucao_camera',
        'sistema_operacional',
    ];

    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class, 'fabricantes_id');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipos_id');
    }

    public function getImageUrlAttribute()
{
    return $this->image ? asset('storage/' . $this->image) : null;
}
}