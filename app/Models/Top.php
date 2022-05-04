<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
    use HasFactory;
    protected $table = 'tbl_type_of_plant';
    protected $primaryKey = 'top_id';
    protected $fillable =[
        'top_name',
    ];
    public function plant(){
        return $this->hasMany('App\Models\Plant');
        
    }
}
