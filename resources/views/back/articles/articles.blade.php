@extends('back.index')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title">  مدیریت مطالب  </h4>
        </div>
      </div>
       
    </div>
    <!-- Page Title Header Ends-->
  <div class="row">
  <a href="{{route("admin.articles.create")}}" class="btn btn-primary">   مطلب جدید</a>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          @include('back.message')
          <table class="table table-hover">
            <thead>
              <tr>
                <th>نام</th>
                <th>نام مستعار</th>
                <th>نویسنده</th>
                <th>دسته بندی</th>
                <th>بازدید</th>
                <th>وضعیت</th>
                <th>مدیریت</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($articles as $i)


              @php
              $url = route('admin.articles.status',$i->id);
          @endphp
          @switch($i->status)
              @case('1')
                  <?php $status = ' <a href="'.$url.'"><label class="badge badge-success">فعال</label></a>';?>
                  @break
              @case('0')
              <?php $status =  ' <a href="'.$url.'"><label class="badge badge-danger">  غیر فعال</label></a>';?>
                  @break
              @default

                  
          @endswitch
            
                  <tr>
                    <td>{{$i->name}}</td>
                    <td>{{$i->slug}}</td>
                    <td>{{$i->user->email}}</td>
                    <td>
                        @foreach ($i->categories()->pluck('name') as $cat)
                            {{$cat}}  | 
                        @endforeach
                    </td>
                    <td>{{$i->hit}}</td>
                    <td><?php echo $status; ?></td>
                    <td>
                      
                    <a href="{{route('admin.articles.edit',$i)}}"><label class="badge badge-success">ویرایش</label></a>
                      <a href="{{route('admin.articles.destroy',$i->id)}}" 
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
    
    
    
    {{$articles->links()}}
  </div>
</div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('back.footer')
  <!-- partial -->
</div>  
@endsection


@section('title')
پنل مدیریت | مدیریت مطالب 
@endsection
