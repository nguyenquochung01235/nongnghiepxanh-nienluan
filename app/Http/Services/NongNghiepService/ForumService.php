<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\Forum;
use App\Models\ForumComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ForumService{

    public function getAllForumByUser($user_id){
        return Forum::with('user')->where('user_id', $user_id)->where('active', 1)->orderBy('created_at', 'desc')->get();
    }


    public function getAllContent(){
        return Forum::with('user')->orderBy('created_at', 'desc')->where('active', 1)->paginate();
    }

    public function searchForum($request){
        return Forum::with('user')
        ->orderBy('created_at', 'desc')
        ->where('active', 1)
        ->where('forum_title', 'like', '%'.$request->searchnews.'%')
        ->paginate();
    }
      

    public function getForumDetail($forum_id){
        return Forum::with('user')->where('forum_id', $forum_id)->where('active', 1)->orderBy('created_at', 'desc')->first();
    }

    
    public function getAllComment($forum_id){
        Return ForumComment::with('user')->with('forum')
        ->where('forum_id', $forum_id)
        ->where('parent_comment',null)
        ->get();
    }

    public function getAllCommentByParentComment($forum_id){
        Return ForumComment::with('user')->with('forum')
        ->where('forum_id', $forum_id)
        ->where('parent_comment','!=',null)
        ->get();
    }

    public function commentForumDetail($forum_id, $user_id, $request){
        try {
            $request->except('_token');
            ForumComment::create([
                'comment' => $request->input('comment'),
                'user_id' => $user_id,
                'forum_id' => $forum_id
            ]);
            Session::flash('success', 'Bình Luận Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Bình Luận Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function replyCommentForumDetail($forum_id, $user_id, $forum_comment_id, $request){

        // return dd($forum_id, $user_id, $forum_comment_id, $request->input('comment'));
        try {
            $request->except('_token');
            ForumComment::create([
                'comment' => $request->input('comment'),
                'user_id' => $user_id,
                'forum_id' => $forum_id,
                'parent_comment' => $forum_comment_id
            ]);
            Session::flash('success', 'Bình Luận Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Bình Luận Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }



    public function uploadImg($request)
    {
        if ($request->hasFile('file')) {
            try {
                // $type = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_EXTENSION);
                // $pathFull = 'uploads/' . date("Y/m/d");
                $name = date("Y-m-d-H-m-s").$request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/forum';

                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );

                return '/storage/' . $pathFull . '/' . $name;

            } catch (\Exception $error) {
                return false;
            }
        }
    }



    public function create($request){
        try {
            
            $request->except('_token');
            Forum::create([
                'forum_title' => $request->input('forum_title'),
                'forum_content' => $request->input('content'),
                'forum_img_1' => $request->input('img_1_link'),
                'forum_img_2' => $request->input('img_2_link'),
                'forum_img_3' => $request->input('img_3_link'),
                'active' => 0,
                'user_id' => Auth::guard('user')->user()->user_id
            ]);
            Session::flash('success', 'Thêm thành công bài viết - VUI LÒNG CHỜ DUYỆT !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Bài Viết Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

}   