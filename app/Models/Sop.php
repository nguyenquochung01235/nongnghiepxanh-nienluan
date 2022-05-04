<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    use HasFactory;
    protected $table = 'tbl_sop';
    protected $primaryKey = 'sop_id';
    protected $fillable =[
        'sop_name',
        'sop_description',
        'sop_img_1',
        'sop_img_2',
        'sop_img_3',

    ];
    public function plant(){
        return $this->belongsToMany('App\Models\Plant');
        
    }
}
