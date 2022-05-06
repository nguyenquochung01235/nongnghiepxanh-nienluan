<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toa extends Model
{
    use HasFactory;
    protected $table = 'tbl_type_of_animal';
    protected $primaryKey = 'toa_id';
    protected $fillable =[
        'toa_name',
    ];

    public function animal(){
        return $this->hasMany('App\Models\Animal');
        
    }
}
