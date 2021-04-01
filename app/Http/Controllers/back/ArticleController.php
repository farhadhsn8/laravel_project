<?php

namespace App\Http\Controllers\back;
use App\Models\category;
use App\Models\Article;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id','DESC')->paginate(20);
        return view('back.articles.articles',compact('articles'));
    }

    public function updatestatus($article)
    {
        // dd($article);
        // echo " salamAlaikom ";
        // DB::table('users')
        //     ->where('id', 1)
        //     ->update(['votes' => 1]);
       $a =  DB::table('articles')->where('id', $article);

        if($a->value('status'))
        {
            $a->update(['status'=>0]);
        }
        else
        {
            $a->update(['status'=>1]);
        }


        return redirect(route('admin.articles'))->with('success');//بک مینکنه عقب    
    }
    
   
    
    // public function updatestatus(Article $article)
    // {
    //     // if($article->status == 1)
    //     // {
    //     //     $article->status=0;
    //     // }
    //     // else
    //     // {
    //     //     $article->status=1;
    //     // }

    //     // $article->save();

    //     // return redirect(route('admin.articles'))->with('success');//بک مینکنه عقب    
    //     echo "salam";

    // }
     
    public function create()
    {
        $categories = DB::table('categories')->select('*')->get();
        // $categories = Article::orderBy('id','DESC');
        return view('back.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //شی دریافتی را بصورت جزء جزء درون یک آرایه و شی جدید ذخیره میکنیم .
        // و متود سیو آنرا صدا میزنیم تا در دیتابیس ذخیره شود

        // اعتبار سنجی ابتدا انجام میشود . انواع خفنترین اعتبار سنجی ها رو لاراول آماده داره
        
        //dd($request);
        $request->validate([
                            'name'=>'required',
                            'slug'=>'required|unique:categories'
                                ]);

        $article = new Article();
        try
        {
            
             $article->create($request->all());
        
        }
        catch(Exception $ex)
        {
            $msg1='ذخیره سازی با مشکل مواجه شد لطفا مجددا اقدام کنید';
            return redirect(route('admin.articles.create'))->with('save_error',$ex->getCode());
        }

        $msg='ذخیره دسته بندی جدید با موفقیت انجام شد';
        return redirect(route('admin.articles'))->with('success',$msg);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $Article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all()->pluck('id','name'); //آیدی و نام دسته ها را از دیتابیس بیرون میکشیم و به ویو میفرستیم

        return view('back.articles.edit',compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
           //شی دریافتی را بصورت جزء جزء درون یک آرایه و شی جدید ذخیره میکنیم .
        // و متود سیو آنرا صدا میزنیم تا در دیتابیس ذخیره شود

        // اعتبار سنجی ابتدا انجام میشود . انواع خفنترین اعتبار سنجی ها رو لاراول آماده داره
        $messages =['name.required'=> 'فیلد عنوان نباید خالی باشد' ,
        'slug.unique'=> 'فیلد نام مستعار نباید تکراری باشد',
        'slug.required'=> 'فیلد نام مستعار نباید خالی باشد'
       ];
$request->validate([
               'name'=>'required',
               'slug'=>'required|unique:categories'
                   ],$messages);

        
        // $category->title = $request->title;
        // $category->description = $request->description;
        // $category->active = $request->active;
        try
        {
        //    $category->save();
              $article->update($request->all()); // این روش دوم است که تنها با یک خط انجام میشود  و نیازی با سط خط بالا که کامنت شده اند ندارد
        }
        catch(Exception $ex)
        {
            $msg1='ذخیره سازی با مشکل مواجه شد لطفا مجددا اقدام کنید';
            return redirect(route('admin.articles.edit'))->with('save_error',$msg1);
        }

        $msg='ویرایش با موفقیت انجام شد';
        return redirect(route('admin.articles'))->with('success',$msg);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function destroy($article)
    {
        DB::table('articles')->where('id', '=', $article)->delete();
        $msg='حذف  با موفقیت انجام شد';
        return redirect(route('admin.articles'))->with('success',$msg);
    }

}



