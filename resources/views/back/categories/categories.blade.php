@extends('back.index')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title"> مدیریت دسته بندی ها</h4>
        </div>
      </div>
       
    </div>
    <!-- Page Title Header Ends-->
  <div class="row">
  <a href="{{route("admin.categories.create")}}" class="btn btn-primary">دسته بندی جدید</a>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          @include('back.message')
          <table class="table table-hover">
            <thead>
              <tr>
                <th>نام</th>
                <th>نام مستعار</th>
                <th>مدیریت</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($categories as $i)
            
                  <tr>
                    <td>{{$i->name}}</td>
                    <td>{{$i->slug}}</td>
                    <td>
                      
                    <a href="{{route('admin.categories.edit',$i->id)}}"><label class="badge badge-success">ویرایش</label></a>
                      <a href="{{route('admin.categories.destroy',$i->id)}}" 
                        onclick="return confirm('آیا کاربر مورد نظر حذف شود؟')"
                        ><label class="badge badge-danger">حذف</label></a>
                    </td>
                   
                  </tr>
              @endforeach
              
              
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    
    
    {{$categories->links()}}
  </div>
</div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('back.footer')
  <!-- partial -->
</div>  
@endsection


@section('title')
     مدیریت کاربران - پنل مدیریت
@endsection
