@extends('front.index')
@section('content')

  <section id="intro2" class="clearfix"></section>


  <main class="container main2">



    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb bgcolor">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item active" aria-current="page">مطالب</li>
      </ol>
    </nav>




    <div class="d-flex justify-content-center">
        <div class='row'>


          @foreach ($articles as $i)
              
          <div class="col-sm-3">
          <img src="<?php echo '/photos/1/thumbs/'.basename($i->image) ?>" alt="">
          <h3><a href="{{route('article',$i->slug)}}"> <?php echo mb_substr($i->name,0,15,'UTF8');?></a> </h3>
          <div>
            <ul>
              <li>
                نویسنده:{{$i->user->name}}
              </li> 
              <li>
                تاریخ:{!! jdate($i->created_at)->format('%A, %d %B %y') !!}
              </li>
              <li>
                بازدید:{{$i->hit}}
              </li>

            </ul>
          </div>
          {{-- برای خلاصه ما باید تگ ها را از متن حذف و صد کارکتر اول را چاپ کنیم --}}
          <p> <?php echo mb_substr(strip_tags($i->description),0,100,'UTF8').'...';?></p> 
          </div>
          @endforeach


         
        </div>
      </div>
      {{$articles->links()}}
  
  </main>

@endsection
 
 