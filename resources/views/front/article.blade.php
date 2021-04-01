@extends('front.index')
@section('content')

  <section id="intro2" class="clearfix"></section>


  <main class="container main2">



    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb bgcolor">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item active" aria-current="page">مطالب</li>
      <li class="breadcrumb-item active" aria-current="page">{{$article->name}}</li>

      </ol>
    </nav>




    <div class="d-flex justify-content-center">
        <div class='container'>

          <ul>
            <li>
              نویسنده:{{$article->user->name}}
            </li> 
            <li>
              تاریخ:{!! jdate($article->created_at)->format('%A, %d %B %y') !!}
            </li>
            <li>
              بازدید:{{$article->hit}}
            </li>

          </ul>
          <div>
            
            <h1>{{$article->name}}</h1>
          </div>
          <p>
            {!!$article->description!!}
          </p>


         
        </div>
      </div>
      <br>
      <br>
      <br>
      <hr>
      
      <div>
        @foreach ($comments as $i)
            <div>
              <ul>
                <li><h5> نویسنده:{{$i->name}}</h5> </li>
                <li> <h5> ایمیل:{{$i->email}}</h5></li>
               
              </ul>
              <div>
                 <p> {{$i->body}} </p>
              </div>
            </div>
            <hr>
        @endforeach
      </div>

      <div>
        <hr>
        <hr>
      <form action="{{route('comment.store',$article->slug)}}" class="form-group" method="POST">
          @csrf
          <div class="form-row">
            
            @auth
                <div class="form-group col-md-6">
                  <label for="">    نام</label>
                <input  class="form-control" type="text" name="name" value="{{Auth::user()->name}}" readonly>
                </div>

                <div class="form-group col-md-6">
                  <label for="">    ایمیل</label>
                  <input  class="form-control" type="text" name="email" value="{{Auth::user()->email}}" readonly>
                </div>
              </div>

            @else

                <div class="form-group col-md-6">
                  <label for="">    نام</label>
                  <input  class="form-control" type="text" name="name">
                </div>

                <div class="form-group col-md-6">
                  <label for="">    ایمیل</label>
                  <input  class="form-control" type="text" name="email">
                </div>
              </div>
            @endauth
            <div class="form-group">
              <label for="recaptcha">  تصویر امنیتی</label>
              {{-- {!! htmlFormSnippet() !!} --}}
              {!! htmlFormSnippet() !!}
            </div>
            

          <div class="form-group">
            <label for="">متن نظر شما</label>
            <textarea name="body"  class="form-control" cols="30" rows="10" type="submit"></textarea>
          </div>



          <button class="btn btn-primary">
            ارسال نظر
          </button>
        </form>
      </div>
     
  </main>

@endsection
 
 