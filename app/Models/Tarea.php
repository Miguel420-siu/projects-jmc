<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'fecha_limite', 'prioridad', 'proyecto_id'];
    
    public function proyecto()
    {
        return $this->belongsTo(Proyectos::class, 'proyecto_id');
    }
}
