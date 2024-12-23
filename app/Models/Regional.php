<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regional extends Model
{
    use HasFactory;


    protected $table = 'dbo.regional';


    protected $fillable = [
        'nama_regional',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function areas()
    {
        return $this->hasMany(Area::class, 'regional_id');
    }
}
