<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
     
    protected $table = 'tbl_forum';
    protected $primaryKey = 'forum_id';
    protected $fillable = [
        'forum_title',
        'forum_img_1',
        'forum_img_2',
        'forum_img_3',
        'forum_content',
        'user_id',
        'admin_id',
        'active'
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }

}
