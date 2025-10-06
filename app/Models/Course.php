<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model {
    use HasFactory;

    protected $fillable = [
        'programme_id',
        'courseDescription',
        'courseCode',
        'courseFullCode',
        'onlyOneCourseForProgramme',
        'status',
    ];

    public function programme() {
        return $this->belongsTo(Programme::class);
    }

    public function activities() {
        return $this->hasMany(Activity::class);
    }
}
