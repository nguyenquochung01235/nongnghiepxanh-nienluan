<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewComment extends Model
{
    use HasFactory;

    protected $table = 'tbl_news_comment';
    protected $primaryKey = 'id_news_comment';
    protected $fillable = [
        'news_id',
        'user_id',
        'comment',
        'parent_comment'
    ];


    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');   
    }

    public function news(){
        return $this->belongsTo('App\Models\News', 'news_id');
    }
}
