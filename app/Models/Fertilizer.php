<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    use HasFactory;
    protected $table = 'tbl_fertilizer';
    protected $primaryKey = 'fertilizer_id';
    protected $fillable = [
        'fertilizer_name',
        'fertilizer_description',
        'fertilizer_img_1',
        'fertilizer_img_2',
        'fertilizer_img_3',
        'category_fertilizer_id'
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function category_fertilizer(){
        return $this->belongsTo('App\Models\CategoryFertilizer', 'category_fertilizer_id');
    }
    public function plant(){
        return $this->belongsToMany('App\Models\Plant');
    }



}
