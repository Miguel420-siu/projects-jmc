<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarea extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descripcion', 'fecha_limite', 'prioridad', 'estado'];
}
