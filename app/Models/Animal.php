<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'tbl_animal';
    protected $primaryKey = 'animal_id';
    protected $fillable = [
        'animal_name',
        'animal_description',
        'animal_img_1',
        'animal_img_2',
        'animal_img_3',
        'toa_id'
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function soa(){
        return $this->belongsToMany('App\Models\Soa');
    }

    public function toa(){
        return $this->belongsTo('App\Models\Toa' , 'toa_id');
    }
}
