<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'base_code',
        'region',
        'start_month',
    ];

    public function section() {
        return $this->belongsTo(Section::class, 'section_id', 'SectionID');
    }

    public function courses() {
        return $this->hasMany(Course::class);
    }
}
