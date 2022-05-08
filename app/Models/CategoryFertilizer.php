<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFertilizer extends Model
{
    use HasFactory;
    protected $table = 'tbl_category_fertilizer';
    protected $primaryKey = 'category_fertilizer_id';
    protected $fillable = [
        'category_fertilizer'
    ];

}
