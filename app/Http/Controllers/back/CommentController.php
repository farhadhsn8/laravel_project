<?php

namespace App\Http\Controllers\back;
use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()// لیست همه نظرات را میخواهیم برای تمام ارتیکل ها
    {
        $comments = Comment::orderBy('id','DESC')->paginate(20);
        return view('back.comments.comments ',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    


    public function edit(Comment $comment)
    {
        return view('back.comments.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
           //شی دریافتی را بصورت جزء جزء درون یک آرایه و شی جدید ذخیره میکنیم .
        // و متود سیو آنرا صدا میزنیم تا در دیتابیس ذخیره شود

        // اعتبار سنجی ابتدا انجام میشود . انواع خفنترین اعتبار سنجی ها رو لاراول آماده داره
$request->validate([
               'name'=>'required',
               'email'=>'required',
               'body'=>'required'
                   ]);

        
        // $category->title = $request->title;
        // $category->description = $request->description;
        // $category->active = $request->active;
        try
        {
        //    $category->save();
              $comment->update($request->all()); // این روش دوم است که تنها با یک خط انجام میشود  و نیازی با سط خط بالا که کامنت شده اند ندارد
        }
        catch(Exception $ex)
        {
            $msg1='ذخیره سازی با مشکل مواجه شد لطفا مجددا اقدام کنید';
            return redirect(route('admin.comments.edit'))->with('save_error',$msg1);
        }

        $msg=' با موفقیت انجام شد';
        return redirect(route('admin.comments'))->with('success',$msg);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment)
    {
        DB::table('comments')->where('id', '=', $comment)->delete();
        $msg='حذف  با موفقیت انجام شد';
        return redirect(route('admin.comments'))->with('success',$msg);
    }

    public function updatestatus($comment)
    {
        $a =  DB::table('comments')->where('id', $comment);

        if($a->value('status'))
        {
            $a->update(['status'=>0]);
        }
        else
        {
            $a->update(['status'=>1]);
        }


        return redirect(route('admin.comments'))->with('success');//بک مینکنه عقب 
    }
}
