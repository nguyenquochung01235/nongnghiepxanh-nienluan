<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;
    protected $table = 'tbl_plant';
    protected $primaryKey = 'plant_id';
    protected $fillable = [
        'plant_name',
        'plant_description',
        'plant_img_1',
        'plant_img_2',
        'plant_img_3',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sop(){
        return $this->belongsToMany('App\Models\Sop');
    }

}
