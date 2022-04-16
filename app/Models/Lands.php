<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lands extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_lands';
    protected $primaryKey = 'land_id';
    protected $fillable = [
        'land_title',
        'land_content',
        'land_img_1',
        'land_img_2',
        'land_img_3',
        'district_id'
    ];

    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'district_id');
    }


}
