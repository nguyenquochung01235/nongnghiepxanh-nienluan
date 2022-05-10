<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NongNghiepService\ForumService;
use App\Models\Forum;
use App\Models\ForumComment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ForumController extends Controller
{
    protected $forumService;

    public function __construct(ForumService $forumService)
    {
        $this->forumService = $forumService;
    }


    public function index(){
        $forum = $this->forumService->getAllContent();
        return view('nongnghiepxanh.forum.list',[
            'title' => 'Diễn Đàn Hỏi Đáp Nông Nghiệp',
            'forum' => $forum
        ]);
    }

    public function searchForum(Request $request){
        $forum = $this->forumService->searchForum($request);
        return view('nongnghiepxanh.forum.list',[
            'title' => 'Kết Quả Tìm Kiếm: ' . $request->searchnews,
            'forum' => $forum
        ]);
    }

    public function detail(Forum $forum){
        $forumDetail = $this->forumService->getForumDetail($forum->forum_id);
        $listComment = $this->forumService->getAllComment($forum->forum_id);
        $replyComment = $this->forumService->getAllCommentByParentComment($forum->forum_id);
        return view('nongnghiepxanh.forum.detail',[
            'title' => 'Diễn Đàn Hỏi Đáp Nông Nghiệp',
            'forumDetail' => $forumDetail,
            'listComment' => $listComment,
            'replyComment' => $replyComment
        ]);
    }

    public function add(){
        return view('nongnghiepxanh.forum.add',[
            'title' => 'Thêm Bài Viết - Câu Hỏi'
        ]);
    }


    public function create(Request $request){
        $result = $this->forumService->create($request);
        if($result){
            return redirect('/forum');
        }
        return redirect()->back()->withInput();
       
    }


    public function commentForumDetail(Forum $forum, User $user, Request $request){
        
        $result = $this->forumService->commentForumDetail($forum->forum_id, $user->user_id, $request);
        if($result){
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }


    public function replyCommentForumDetail(Forum $forum, User $user, ForumComment $comment ,Request $request){
        $result = $this->forumService->replyCommentForumDetail($forum->forum_id,$user->user_id,$comment->forum_comment_id,$request);
        if($result){
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }



    public function uploadImg(Request $request){
        $url = $this->forumService->uploadImg($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }

        return response()->json(['error' => true]);
    }
}
