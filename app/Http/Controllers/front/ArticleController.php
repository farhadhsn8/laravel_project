<?php

namespace App\Http\Controllers\front;
use App\frontmodels\Article;
use App\frontmodels\category;
use App\frontmodels\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id','DESC')->where('status',1)->paginate(20);
        return view('front.articles',compact('articles'));
    }

    public function show(Article $article) //وقتی روی لینک هر مطلب کلیک کردیم در یک صفحه کل مطلب را کامل نمایش میدهد
    {
        $article->increment('hit');//یدونه به بازدید اضافه میشود 
        $comments = $article->comments()->where('status',1)->get();
        return view('front.article',compact('article','comments'));
    }

    
   
   
}
