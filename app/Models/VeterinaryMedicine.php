<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinaryMedicine extends Model
{
    use HasFactory;
    protected $table = 'tbl_vm';
    protected $primaryKey = 'vm_id';
    protected $fillable = [
        'vm_name',
        'vm_description',
        'vm_img_1',
        'vm_img_2',
        'vm_img_3',
        'category_vm_id'
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function category_vm(){
        return $this->belongsTo('App\Models\CategoryVeterinaryMedicine', 'category_vm_id');
    }
    public function soa(){
        return $this->belongsToMany('App\Models\Soa');
    }
}
