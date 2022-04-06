<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    use HasFactory;

    protected $table = 'tbl_forum_comment';
    protected $primaryKey = 'forum_comment_id';
    protected $fillable = [
        'forum_comment',
        'forum_id',
        'user_id',
        'comment',
        'parent_comment'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');   
    }

    public function forum(){
        return $this->belongsTo('App\Models\Forum', 'forum_id');
    }

}
