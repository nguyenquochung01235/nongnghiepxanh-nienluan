<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\NewsService;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;   
    }

    public function newsDetailByID(News $news){
        $news = $this->newsService->getNew($news->news_id);
        return view('nongnghiepxanh.news.detail',[
            'title' => $news->news_title,
            'news' => $news
        ]);
    }
}
