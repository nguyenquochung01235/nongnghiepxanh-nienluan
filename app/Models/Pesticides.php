<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesticides extends Model
{
    use HasFactory;
    protected $table = 'tbl_pesticides';
    protected $primaryKey = 'pesticides_id';
    protected $fillable = [
        'pesticides_name',
        'pesticides_description',
        'pesticides_img_1',
        'pesticides_img_2',
        'pesticides_img_3',
        'category_pesticides_id'
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function category_pesticides(){
        return $this->belongsTo('App\Models\CategoryPesticides', 'category_pesticides_id');
    }
    public function sop(){
        return $this->belongsToMany('App\Models\Sop');
    }
}
