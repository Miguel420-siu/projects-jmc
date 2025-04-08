<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyectos extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estado', 'miembros','user_id'];

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'proyecto_user', 'proyecto_id', 'user_id')->withTimestamps();
    }
}
