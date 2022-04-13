<?php

namespace App\Http\Services;

use App\Models\NewComment;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NewsService{


    
    public function getAllNews(){
        return News::with('admin')->orderBy('created_at', 'desc')->with('categorynews')->paginate(10);
    }

    public function getNew($id){
        return News::with('admin')->with('categorynews')->where('news_id', $id)->first();
    
    }

    public function newsByCategory($id){
        return News::with('categorynews')->where('id_news_category', $id)->orderBy('created_at', 'desc')->get();
    }

    public function getListNewsByCategory($id){
        return News::with('admin')->with('categorynews')->where('id_news_category', $id)->offset(0)->limit(5)->get();
    }


    public function getAllComment($news_id){
        Return NewComment::with('user')->with('news')
        ->where('news_id', $news_id)
        ->where('parent_comment',null)
        ->get();
    }

    public function getAllCommentByParentComment($news_id){
        Return NewComment::with('user')->with('news')
        ->where('news_id', $news_id)
        ->where('parent_comment','!=',null)
        ->get();
    }

    public function commentNewsDetail($news_id, $user_id, $request){
        try {
            $request->except('_token');
            NewComment::create([
                'comment' => $request->input('comment'),
                'user_id' => $user_id,
                'news_id' => $news_id
            ]);
            Session::flash('success', 'Bình Luận Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Bình Luận Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    public function replyCommentNewsDetail($news_id, $user_id, $id_news_comment, $request){
        try {
            $request->except('_token');
            NewComment::create([
                'comment' => $request->input('comment'),
                'user_id' => $user_id,
                'news_id' => $news_id,
                'parent_comment' => $id_news_comment
            ]);
            Session::flash('success', 'Bình Luận Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Bình Luận Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }

    
    


    public function upload($request){
        if ($request->hasFile('file')) {
            try {
               
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/news';

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
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }
            $request->except('_token');
            News::create([
                'news_title' => $request->input('newTitle'),
                'news_content' => $request->input('content'),
                'news_img' => $request->input('news_img'),
                'admin_id' => Auth::user()->admin_id,
                'id_news_category'=> $request->input('id_news_category'),
                'active' => (int)$active
            ]);
            Session::flash('success', 'Thêm Tin Tức Thành Công !!! ');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Tin Tức Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }


    public function update($request, $news){
        try {
            $active = 1;
            if($request->input('active') =="on"){
                $active = 1;
            }else{
                $active = 0;
            }
            $request->except('_token');
            $news->news_title = $request->input('newTitle');
            $news->news_content= $request->input('content');
            $news->news_img= $request->input('news_img');
            $news->active = (int)$active;
            $news->admin_id = Auth::user()->admin_id;
            $news->id_news_category = $request->input('id_news_category');
            $news->updated_at =  date('Y-m-d H:i:s');
            $news->save();

            Session::flash('success', 'Cập Nhật Tin Tức Thành Công !!! ' );
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Tin Tức Không Thành Công !!! <hr>' . $err->getMessage());

            return  false;
        }
        return true;
    }



    public function delete($request){
        $news = News::where('news_id', $request->input('id'))->first();
        if($news){
            $news->delete();
            return true;
        }
        return false;
    }

}
