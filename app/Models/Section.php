<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';
    protected $primaryKey = 'SectionID';
    protected $keyType = 'int';

    protected $fillable = [
        'SectionCode',
        'Section',
    ];
    
    public function programmes()
    {
        return $this->hasMany(Programme::class, 'section_id', 'SectionID');
    }
}
