<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'base_code',
        'campus',
        'intake_month',
        'for_programme',
    ];
}
