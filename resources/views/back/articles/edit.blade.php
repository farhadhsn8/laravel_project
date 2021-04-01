@extends('back.index')

@section('title')
   ویرایش  مطلب  
@endsection

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title">  مطلب جدید </h4>
        </div>
      </div>
       
    </div>
    <!-- Page Title Header Ends-->
  <div class="row">
     
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          @include('back.message')

          <form action="{{ route('admin.articles.update' , $article) }}" method="POST">
            {{-- این برای زمانی است که ما از متود پست استفاده میکنیم و این به امنیت کمک میکند --}}
            @csrf
            <div class="form-group">
                <label for="title">نام مطلب  </label>
                {{-- باعث میشه که کاربر در صورت اشتباه وادر کردن فرم را از اول پر نکند --}}
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$article->name}}">
  
                {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}
  
                @error('name')
                     <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
  
            <div class="form-group">
                <label for="title">نام مستعار</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{$article->slug}}">
  
                {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}
  
                @error('slug')
                     <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
              <label for="title">محتوا </label>
              <textarea id="editor" type="text" class="form-control @error('description') is-invalid @enderror" name="description"> {{$article->description}} </textarea>

              {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}

              @error('description')
                   <div class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>

          
          

          <div class="form-group">
            <label for="title">وضعیت </label>
            <select  class="form-control" name="status" >
              
              <option value="1">منتشر شده</option>
              <option value="0">منتشر نشده</option>
          </select>
        </div>
        
        
        <div class="form-group">
          <label for="title">دسته بندی  </label>
          <br>
            @foreach ($categories as $name => $id)
              <input type="checkbox"  name="categories[]" value="{{$id}}">
              <label for="title"> {{$name}} </label><br>
            @endforeach
           
        </select>
      </div>
      
      
      <div class="input-group">
        <span class="input-group-btn">
          <a href="#" id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> انتخاب
          </a>
        </span>
        <input id="image" class="form-control" type="text" name="image" value="{{$article->image}}">
      </div>
      <img id="holder" src="{{$article->image}}" style="margin-top:15px;max-height:100px;">
      
      
      
      <hr>
      
      <div class="form-group">
        <label for="title"></label>
        <button type="submit" class="btn btn-success">ذخیره </button>
        <a href="{{route('admin.articles')}}" class="btn btn-warning">بازگشت</a>
      </div>
     
     
      <div class="form-group">
        <label for="title">نویسنده|{{Auth::user()->name}}</label>
      <input type="hidden"  name="user_id" value="{{Auth::user()->id}}">
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


