<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'cantidad',
    ];

    public function producto()
    {
        return $this->belongsTo(producto::class);
    }
}
