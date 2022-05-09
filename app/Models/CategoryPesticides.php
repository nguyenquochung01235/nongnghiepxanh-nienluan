<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPesticides extends Model
{

    use HasFactory;
    protected $table = 'tbl_category_pesticides';
    protected $primaryKey = 'category_pesticides_id';
    protected $fillable = [
        'category_pesticides'
    ];

}
