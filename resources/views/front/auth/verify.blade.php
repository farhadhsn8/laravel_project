@extends('front.index')
@section('content')

  <section id="intro2" class="clearfix"></section>


  <main class="container main2">



    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb bgcolor">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item active" aria-current="page">فعالسازی حساب کاربری</li>
      </ol>
    </nav>




    <div class="d-flex justify-content-center">
       

      <div class="card">
     
        برای فعالسازی حساب کاربری روی دکمه زیر کلیک کنید تا ایمیل برای شما ارسال شود
        <hr>
      <form action="{{route('verification.resend')}}" method="post">
        @csrf
        <button>ارسال ایمیل فعالسازی</button>
      </form>

      </div>
  </div>
  </main>

@endsection
 
 