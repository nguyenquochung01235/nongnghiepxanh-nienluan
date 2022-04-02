<?php

namespace App\Http\Services;

use App\Models\News;


class NongNghiepNewsService{

    public function getHotNew1(){
        return News::with('categorynews')->where('active',1)
        ->offset(0)->limit(2)->orderBy('created_at', 'desc')->get();
    }
    public function getHotNew2(){
        return News::with('categorynews')->where('active',1)
        ->offset(2)->limit(4)->orderBy('created_at', 'desc')->get();
    }
    public function getHotNew3(){
        return News::with('categorynews')->where('active',1)
        ->offset(4)->limit(6)->orderBy('created_at', 'desc')->get();
    }


    public function marketHot1(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 2)
        ->offset(0)->limit(2)
        ->orderBy('created_at', 'desc')->get();
    }

    public function marketHot2(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 2)
        ->offset(2)->limit(3)
        ->orderBy('created_at', 'desc')->get();
    }



    public function agriculturue(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 1)
        ->offset(0)->limit(4)
        ->orderBy('created_at', 'desc')->get();
    }


    public function localProduct1(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 3)
        ->offset(0)->limit(2)
        ->orderBy('created_at', 'desc')->get();
    }
    
    public function localProduct2(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 3)
        ->offset(2)->limit(3)
        ->orderBy('created_at', 'desc')->get();
    }

    public function enterprise1(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 4)
        ->offset(0)->limit(1)
        ->orderBy('created_at', 'desc')->get();
    }

    public function enterprise2(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 4)
        ->offset(1)->limit(2)
        ->orderBy('created_at', 'desc')->get();
    }

    public function financy1(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 5)
        ->offset(0)->limit(1)
        ->orderBy('created_at', 'desc')->get();
    }

    public function financy2(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 5)
        ->offset(1)->limit(2)
        ->orderBy('created_at', 'desc')->get();
    }

    public function organic1(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 6)
        ->offset(0)->limit(1)
        ->orderBy('created_at', 'desc')->get();
    }

    public function organic2(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 6)
        ->offset(1)->limit(2)
        ->orderBy('created_at', 'desc')->get();
    }

    public function cuisine1(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 8)
        ->offset(0)->limit(1)
        ->orderBy('created_at', 'desc')->get();
    }

    public function cuisine2(){
        return News::with('categorynews')
        ->where('active',1)
        ->where('id_news_category', 8)
        ->offset(1)->limit(2)
        ->orderBy('created_at', 'desc')->get();
    }



}
