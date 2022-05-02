<?php

namespace App\Http\Services;

use App\Models\Forum;
use App\Models\ForumComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ForumService{

    public function getAllForumByUser($user_id){
        return Forum::with('user')->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
    }


    public function getAllContent(){
        return Forum::with('user')->orderBy('created_at', 'desc')->paginate();
    }
      

    public function getForumDetail($forum_id){
        return Forum::with('user')->with('admin')->where('forum_id', $forum_id)->orderBy('created_at', 'desc')->first();
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

    public function approve($forum_id, $request){
        try {
            $admin_id = Auth::user()->admin_id;
            $request->except('_token');
            $updateForum = Forum::find($forum_id);    
            $updateForum->active = $request->input('active');
            $updateForum->admin_id =  $admin_id;
            $updateForum->updated_at = date('Y-m-d H:i:s');
            $updateForum->save();
            
            Session::flash('success', 'Cập Nhật Trạng Thái Bài Viết Thành Công!!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Trạng Thái Bài Viết Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function delete($request){
        $forum = Forum::where('forum_id', $request->input('id'))->first();
        if($forum){
            $forum->delete();
            return true;
        }
        return false;
    }
   

    public function filter($request){
        $filter = explode("-", filter_var(trim($request->input('filterBy'), "-")));
        if($request->input('active') == null ){
            return Forum::with('user')->with('admin')->orderBy('tbl_forum.'.$filter[0], $filter[1])
                    ->where('forum_title', 'like', "%". $request->input('seachTitle') ."%")
                    ->paginate(15)->withQueryString();
        }
        return Forum::with('user')->with('admin')->orderBy('tbl_forum.'.$filter[0], $filter[1])
                    ->where('forum_title', 'like', "%". $request->input('seachTitle') ."%")
                    ->where('active', $request->input('active'))
                    ->paginate(15)->withQueryString();
    }
}   