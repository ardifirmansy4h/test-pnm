<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Unit extends Model
{
    use HasFactory;

    protected $table = 'dbo.unit';
    protected $fillable = [
        'area_id',
        'nama_unit',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
