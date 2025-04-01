<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_proyecto',
        'titulo',
        'descripcion',
        'fecha_limite',
        'prioridad',
        'estado',
        'user_id'
    ];
    
    public function proyecto()
    {
        return $this->belongsTo(Proyectos::class, 'proyecto_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
