<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;

    public function empresa()
    {
        return $this->belongsTo(empresa::class);
    }

    public function productos()
    {
        return $this->hasMany(producto::class);
    }
}
