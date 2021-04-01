@extends('back.index')

@section('title')
    دسته بندی ویرایش 
@endsection

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title"> ویرایش دسته بندی  </h4>
        </div>
      </div>
       
    </div>
    <!-- Page Title Header Ends-->
  <div class="row">
     
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          
          @include('back.message')

          
          <form action="{{ route('admin.categories.update',$category->id) }}" method="POST">
            {{-- این برای زمانی است که ما از متود پست استفاده میکنیم و این به امنیت کمک میکند --}}
            @csrf
            <div class="form-group">
                <label for="title">نام دسته بندی  </label>
                {{-- باعث میشه که کاربر در صورت اشتباه وادر کردن فرم را از اول پر نکند --}}
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$category->name}}">
  
                {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}
  
                @error('name')
                     <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
  
            <div class="form-group">
                <label for="title">نام مستعار</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{$category->slug}}">
  
                {{-- اگر ورودی نامعتبر بود به کاربر تذکر میدهد --}}
  
                @error('slug')
                     <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
  
            
  
            
  
            
  
  
            <div class="form-group">
                <label for="title"></label>
                <button type="submit" class="btn btn-success">ویرایش </button>
            <a href="{{route('admin.categories')}}" class="btn btn-warning">بازگشت</a>
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


