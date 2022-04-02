<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryNewsService;
use App\Http\Services\NewsService;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    protected $newsService;
    protected $categoryNewsService;

    public function __construct(NewsService  $newsService, CategoryNewsService $categoryNewsService)
    {
        $this->newsService = $newsService;
        $this->categoryNewsService = $categoryNewsService;
    }


    public function index(){
        $news = $this->newsService->getAllNews();

        return view('administrator.news.list',[
            'title' => 'Danh Sách Tin Tức',
            'news' =>$news
        ]);
    }


    public function add(){
        $category = $this->categoryNewsService->getAllCategoryNews();
        return view('administrator.news.add',[
            'title' => 'Thêm Tin Tức',
            'category' => $category
        ]);
    }
    

    public function create(Request $request){

        $result = $this->newsService->create($request);
        if($result){
            return redirect('/administrator/news/');
        }
        return redirect()->back()->withInput();
    }

    public function upload(Request $request){
        $url = $this->newsService->upload($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }

        return response()->json(['error' => true]);
    }


    public function show(News $news){
        $category = $this->categoryNewsService->getAllCategoryNews();
        return view('administrator.news.update',[
            'title' => 'Cập Nhật Tin Tức',
            'category' => $category,
            'news' => $news
        ]);
    }

    public function update(Request $request, News $news){
        $result = $this->newsService->update($request, $news);
        if($result){
            return redirect('/administrator/news/');
        }
        return redirect()->back();

    }




    public function delete(Request $request){
        $result = $this->newsService->delete($request);
        if($request){
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



    public function view(News $news){
        $new = $this->newsService->getNew($news->news_id);
        return view('administrator.news.new',[
            'title' => 'Chi Tiết Tin Tức',
            'new' => $new
        ]);
    }
}
