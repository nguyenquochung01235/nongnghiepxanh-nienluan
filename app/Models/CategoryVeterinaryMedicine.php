<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryVeterinaryMedicine extends Model
{
    use HasFactory;
    protected $table = 'tbl_category_vm';
    protected $primaryKey = 'category_vm_id';
    protected $fillable = [
        'category_vm'
    ];
}
