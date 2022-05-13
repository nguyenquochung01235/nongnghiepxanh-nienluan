<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryECommerce extends Model
{
    use HasFactory;
    protected $table = 'tbl_category_ecommerce';
    protected $primaryKey = 'category_ecommerce_id';
    protected $fillable = [
        'category_ecommerce',
        'category_ecommerce_img',
        'active'
    ];
}
