<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'title',
        'base_code',
        'region',
        'intake',
        'full_prog_code',
        'campus',
        'full_desc',
        'prog_stud_set',
        'prog1_code',
    ];

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function section() {
        return $this->belongsTo(Section::class, 'section_id', 'SectionID');
    }
}
