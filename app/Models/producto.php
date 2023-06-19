<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(categoria::class);
    }
    public function marca()
    {
        return $this->belongsTo(marca::class);
    }
    public function stock()
    {
    return $this->hasOne(Stock::class);
    }
    
}
