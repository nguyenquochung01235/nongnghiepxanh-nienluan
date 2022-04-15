<?php

namespace App\Http\Controllers;

use App\Http\Services\NewsService;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function searchNews(Request $request){
        $result = $this->newsService->searchNews($request);
        return view('nongnghiepxanh.news.searchnews',[
            'title' => 'Kết quả tìm kiếm: ' . $request->input('searchnews'),
            'listNews' => $result
        ]);
    }
}
