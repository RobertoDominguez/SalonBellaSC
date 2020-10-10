<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable=[
        'client_name',
        'service_name',
        'phone',
        'date',
        'time',
        'id_service',
        'id_branch'
    ];

}
