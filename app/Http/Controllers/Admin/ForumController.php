<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ForumService;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    protected $forumService;

    public function __construct(ForumService $forumService)
    {
        $this->forumService = $forumService;
    }

    public function index(){
        $forum = $this->forumService->getAllContent();
        return view('administrator.forum.list',[
            'title' => 'Danh sách bài viết',
            'forum' => $forum
        ]);
    }

    public function view(Forum $forum){
        $forum = $this->forumService->getForumDetail($forum->forum_id);
        return view('administrator.forum.forum',[
            'title' => 'Chi tiết bài viết',
            'forum' => $forum
        ]);
    }

    public function approve(Forum $forum, Request $request){
        $result = $this->forumService->approve($forum->forum_id, $request);
        if($result){
            return redirect('/administrator/forum');
        }
        return redirect()->back();
    }

    public function delete(Request $request){
        $result = $this->forumService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => "Đã xóa thành công !!!"
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => "Không thể xóa vì đã liên kết dữ liệu !!!"
            ]);
        }
    }

    public function filter(Request $request){
        // return dd($request->all());
        $forum = $this->forumService->filter( $request);
        return view('administrator.forum.list',[
            'title' => 'Danh sách bài viết',
            'forum' => $forum
        ]);
    }
}
