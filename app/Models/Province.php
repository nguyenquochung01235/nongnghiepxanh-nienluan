<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'tbl_province';
    protected $primaryKey = 'province_id';
    protected $fillable = [
        'province_id',
        'province_name',
    ];

    public function district(){
        return $this->hasMany(District::class, 'province_id', 'province_id');
    }
}
