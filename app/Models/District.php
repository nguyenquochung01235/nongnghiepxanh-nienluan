<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'tbl_district';
    protected $primaryKey = 'district_id';
    protected $fillable = [
        'district_name',
        'province_id',
    ];


    public function province(){
        return $this->belongsTo('App\Models\Province', 'province_id');   
    }
}
