<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    use HasFactory;

    protected $table = 'tbl_news_category';
    protected $primaryKey = 'id_news_category';
    protected $fillable = [
        'news_category',
        'active'
    ];


}
