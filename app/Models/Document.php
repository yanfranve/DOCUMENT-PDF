<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['name', 'file_path'];

    // Define el accesor para obtener la URL completa del documento
    public function getUrlAttribute()
    {
        return asset('storage/app/document/' . $this->file_path);
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
