<?php
namespace App\Http\Controllers\back;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Http\Controllers\Controller;//ارث بری از کنترل اصلی باید این را یوز کنیم

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myusers = User::orderBy('id' , 'DESC')->paginate(25);
        dd($myusers);
        return view('back.users.users',compact('myusers'));//لیست کاربران را هم به ویو میفرستد
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $pagetitle = 'ویرایش پروفایل';
        //آدرس ویو مربوطه را باید در پایین بدهیم
        return view('back.users.profile',compact('pagetitle','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        
          //شی دریافتی را بصورت جزء جزء درون یک آرایه و شی جدید ذخیره میکنیم .
        // و متود سیو آنرا صدا میزنیم تا در دیتابیس ذخیره شود

        // اعتبار سنجی ابتدا انجام میشود . انواع خفنترین اعتبار سنجی ها رو لاراول آماده داره
        $messages =['name.required'=> 'فیلد نام نباید خالی باشد' ,
        'email.required'=> 'فیلد ایمیل نباید خالی باشد',
        'phone.required'=> 'فیلد تلفن نباید خالی باشد'
                    
                      ];


        if(!empty($request->password))
        {
            $request->validate([
                'name'=>'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'min:8',
                'password_confirmation' => 'min:8'

                ],$messages);

            $password = Hash::make($request->password);
            $user->password = $password;
        }
        else
        {
            $request->validate([
                'name'=>'required',
                'email' => 'required',
                'phone' => 'required'
                ],$messages);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        
       




      

        
        // $category->title = $request->title;
        // $category->description = $request->description;
        // $category->active = $request->active;
        try
        {
                 $user->save();
            //   $user->update($request->all()); // این روش دوم است که تنها با یک خط انجام میشود  و نیازی با سط خط بالا که کامنت شده اند ندارد
        }
        catch(Exception $ex)
        {
            $msg1='ذخیره سازی با مشکل مواجه شد لطفا مجددا اقدام کنید';
            return redirect()->back()->with('save_error',$ex->getCode());
        }

        $msg='ویرایش با موفقیت انجام شد';
        return redirect(route('admin.users'))->with('success',$msg);//بک مینکنه عقب
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $msg='حذف با موفقیت انجام شد';
        $user->delete();
        return redirect(route('admin.users'))->with('success',$msg);//بک مینکنه عقب

    }

    public function updatestatus(User $user)
    {
        if($user->status == 1)
        {
            $user->status=0;
        }
        else
        {
            $user->status=1;
        }

        $user->save();

        return redirect(route('admin.users'))->with('success');//بک مینکنه عقب

    }
}
