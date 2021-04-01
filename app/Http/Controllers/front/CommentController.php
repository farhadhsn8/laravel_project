<?php

namespace App\Http\Controllers\front;
use App\frontmodels\Article;
use App\frontmodels\Comment;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentSend;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Article $article , Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'body'=>'required'
                ]);


        $article->comments()->create([
            'name'=>$request->name ,
            'email'=>$request->email,
            'body'=>$request->body
                ]);
        
       // Mail::to($request->email)->send(new CommentSend()); برای ایمیل فرستادن

       return back();
    }   
}
