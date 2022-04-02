<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_job';
    protected $primaryKey = 'job_id';
    protected $fillable = [
        'job_name',
        'job_salary',
        'active',
        'department_id'
    ];

    public function department(){
        return $this->hasOne(Department::class, 'department_id', 'department_id');
    }

    public function admins(){
        return $this->hasOne('App\Models\Admin', 'job_id');   
    }
}
