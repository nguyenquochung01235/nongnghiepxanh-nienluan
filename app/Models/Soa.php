<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soa extends Model
{
    protected $table = 'tbl_soa';
    protected $primaryKey = 'soa_id';
    protected $fillable =[
        'soa_name',
        'soa_description',
        'soa_img_1',
        'soa_img_2',
        'soa_img_3',

    ];
    public function animal(){
        return $this->belongsToMany('App\Models\Animal');
    }
}
