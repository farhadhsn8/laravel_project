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
        <form action="{{ route('login') }}" method="POST">
            {{-- این برای زمانی است که ما از متود پست استفاده میکنیم و این به امنیت کمک میکند --}}
            @csrf
           

            <div class="form-group">
                <label for="title">ایمیل</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">

                {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}

                @error('email')
                     <div class="alert alert-danger">{{$message}}</div>
                @enderror
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
                <label for="title">مرا بخاطر بسپار </label>
                <input type="checkbox" name="remember" id="">

                {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}

                
            </div>

           

            <div class="form-group">
                <label for="title"></label>
                <button type="submit" class="btn btn-success">ورود</button>
                
            </div>
        </form>

  </div>
  </main>

@endsection
 
 