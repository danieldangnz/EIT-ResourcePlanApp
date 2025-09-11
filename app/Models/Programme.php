<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $fillable = [
        'title',
        'base_code',
        'region',
        'start_month',
    ];
}