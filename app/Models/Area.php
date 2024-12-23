<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;

    protected $table = 'dbo.area';

    protected $fillable = [
        'regional_id',
        'nama_area',
    ];

    public function regional()
    {
        return $this->belongsTo(Regional::class, 'regional_id');
    }

    public function units()
    {
        return $this->hasMany(Unit::class, 'area_id');
    }
}
