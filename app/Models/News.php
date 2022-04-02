<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'tbl_news';
    protected $primaryKey = 'news_id';
    protected $fillable = [
        'news_title',
        'news_content',
        'news_img',
        'active',
        'admin_id',
        'id_news_category',
    ];


    public function admin(){
        return $this->belongsTo('App\Models\Admin', 'admin_id');   
    }

    public function categorynews(){
        return $this->belongsTo('App\Models\CategoryNews', 'id_news_category');
    }
    
}
