<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'apellido', 'numero_ci', 'email', 'fecha_nacimiento', 'telefono', 'direccion',
    ];
    public function documentos()
    {
        return $this->hasMany(Document::class);
    }
}
