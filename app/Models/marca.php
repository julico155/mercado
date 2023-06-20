<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marca extends Model
{
    use HasFactory;
    public function productos()
    {
        return $this->hasMany(producto::class);
    }

    public function proveedor()
{
    return $this->belongsTo(Proveedor::class, 'marca_id');
}
}
