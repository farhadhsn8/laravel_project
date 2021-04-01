@extends('front.index')
@section('content')

  <section id="intro2" class="clearfix"></section>


  <main class="container main2">



    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb bgcolor">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item active" aria-current="page">ثبتنام</li>
      </ol>
    </nav>




    <div class="d-flex justify-content-center">
      <form action="{{ route('register') }}" method="POST">
          {{-- این برای زمانی است که ما از متود پست استفاده میکنیم و این به امنیت کمک میکند --}}
          @csrf
          <div class="form-group">
              <label for="title">نام و نام خانوادگی</label>
              {{-- باعث میشه که کاربر در صورت اشتباه وادر کردن فرم را از اول پر نکند --}}
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">

              {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}

              @error('name')
                   <div class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>

          <div class="form-group">
              <label for="title">ایمیل</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">

              {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}

              @error('email')
                   <div class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>

          <div class="form-group">
            <label for="title">تلفن</label>
            <input type="text" class="form-control" name="phone" value="{{old('phone')}}">


            
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
              <button type="submit" class="btn btn-success">ثبتنام</button>
              
          </div>
      </form>

  </div>
  </main>

@endsection
 
 