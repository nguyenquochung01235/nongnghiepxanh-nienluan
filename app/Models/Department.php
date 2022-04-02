<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'tbl_department';
    protected $primaryKey = 'department_id';
    protected $fillable = [
        'department_name',
        'active'
    ];

    public function job(){
        return $this->hasMany(Job::class, 'department_id', 'department_id');
    }
}
