<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proyectos extends Model
{
    protected $table = 'proyectos';
    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estado', 'miembros'];
    protected $guarded = ['id'];
    public $timestamps = true;  
}
