<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Activity extends Model
{
    use HasFactory;
    use LogsActivity;
    protected static $logAttributes = ['*'];

    public function getActivitylogOptions()
{
    return [
        'log_name' => 'default',
        // Otras opciones de configuración que desees especificar
    ];
}
}
