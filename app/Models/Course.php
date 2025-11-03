<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme_id',
        'title',
        'base_code',
        'campus_id',
        'intake'
    ];

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
