@extends('back.index')

@section('title')
    ویرایش کاربر
@endsection

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title"> ویرایش کاربر</h4>
        </div>
      </div>
       
    </div>
    <!-- Page Title Header Ends-->
  <div class="row">
     
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          
          <form action="{{ route('admin.profileupdate',$user->id) }}" method="POST">
            {{-- این برای زمانی است که ما از متود پست استفاده میکنیم و این به امنیت کمک میکند --}}
            @csrf
            <div class="form-group">
                <label for="title">نام و نام خانوادگی</label>
                {{-- باعث میشه که کاربر در صورت اشتباه وادر کردن فرم را از اول پر نکند --}}
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}">
  
                {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}
  
                @error('name')
                     <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
  
            <div class="form-group">
                <label for="title">ایمیل</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
  
                {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}
  
                @error('email')
                     <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
  
            <div class="form-group">
              <label for="title">تلفن</label>
              <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
  
    
              
          </div>
  
            <div class="form-group">
                <label for="title">رمز ورود</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
  
                {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}
  
                @error('password')
                     <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
  
            <div class="form-group">
                <label for="title">تکرار رمز  ورود</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
  
                {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}
  
                @error('password_confirmation')
                     <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
  
  
            <div class="form-group">
                <label for="title"></label>
                <button type="submit" class="btn btn-success">ویرایش پروفایل</button>
            <a href="{{route('admin.users')}}" class="btn btn-warning">بازگشت</a>
            </div>
        </form>
        </div>
      </div>
    </div>



  </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('back.footer')
  <!-- partial -->
</div>  
@endsection


