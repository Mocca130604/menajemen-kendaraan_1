<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $table = 'agreement';

    protected $fillable = [
        'id_user',
        'type',
        'brands',
        'admin_name',
        'driver_id',
        'driver',
        'note',
        'status',
    ];
}
