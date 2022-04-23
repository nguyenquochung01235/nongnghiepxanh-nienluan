<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryNewsService;
use App\Http\Services\NewsService;
use App\Models\CategoryNews;
use App\Models\NewComment;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;
    protected $newsCategoryService;

    public function __construct(NewsService $newsService, CategoryNewsService $newsCategoryService)
    {
        $this->newsService = $newsService;   
        $this->newsCategoryService = $newsCategoryService;   
    }


    public function newsByCategory(CategoryNews $news){
        $listNews = $this->newsService->newsByCategory($news->id_news_category);
        return view('nongnghiepxanh.news.listnews',[
            'title' => $news->news_category,
            'listNews' => $listNews
        ]);
    }


    public function newsDetailByID(News $news){
        $news = $this->newsService->getNew($news->news_id);
        $listnews = $this->newsService->getListNewsByCategory($news->categorynews->id_news_category);
        $listComment = $this->newsService->getAllComment($news->news_id);
        $replyComment = $this->newsService->getAllCommentByParentComment($news->news_id);
        //  return dd($replyComment);
        return view('nongnghiepxanh.news.detail',[
            'title' => $news->news_title,
            'news' => $news,
            'listnews' => $listnews,
            'listComment' => $listComment,
            'replyComment' => $replyComment
        ]);
    }

    public function commentNewsDetail(News $news, User $users, Request $request){
        $result = $this->newsService->commentNewsDetail($news->news_id, $users->user_id, $request);
        if($result){
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }


    public function replyCommentNewsDetail(News $news, User $users, NewComment $comments ,Request $request){
        $result = $this->newsService->replyCommentNewsDetail($news->news_id,$users->user_id,$comments->id_news_comment,$request);
        if($result){
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }
}
