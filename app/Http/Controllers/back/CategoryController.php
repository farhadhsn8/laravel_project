<?php

namespace App\Http\Controllers\back;
use Exception;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;//ارث بری از کنترل اصلی باید این را یوز کنیم

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->paginate(20);
        return view('back.categories.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.categories.create');
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
        $messages =['name.required'=> 'فیلد عنوان نباید خالی باشد' ,
                     'slug.unique'=> 'فیلد نام مستعار نباید تکراری باشد',
                     'slug.required'=> 'فیلد نام مستعار نباید خالی باشد'
                    ];
        $request->validate([
                            'name'=>'required',
                            'slug'=>'required|unique:categories'
                                ],$messages);

        $category = new Category();
        try
        {
            
            $category->create($request->all());
        }
        catch(Exception $ex)
        {
            $msg1='ذخیره سازی با مشکل مواجه شد لطفا مجددا اقدام کنید';
            return redirect(route('admin.categories.create'))->with('save_error',$ex->getCode());
        }

        $msg='ذخیره دسته بندی جدید با موفقیت انجام شد';
        return redirect(route('admin.categories'))->with('success',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('back.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
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
              $category->update($request->all()); // این روش دوم است که تنها با یک خط انجام میشود  و نیازی با سط خط بالا که کامنت شده اند ندارد
        }
        catch(Exception $ex)
        {
            $msg1='ذخیره سازی با مشکل مواجه شد لطفا مجددا اقدام کنید';
            return redirect(route('admin.categories.edit'))->with('save_error',$ex->getCode());
        }

        $msg='ویرایش با موفقیت انجام شد';
        return redirect(route('admin.categories'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        $msg='حذف  با موفقیت انجام شد';
        return redirect(route('admin.categories'))->with('success',$msg);//این متود مارا به ویو میفرستد
    }
}
