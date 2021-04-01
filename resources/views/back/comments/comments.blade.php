@extends('back.index')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title">  مدیریت نظرات  </h4>
        </div>
      </div>
       
    </div>
    <!-- Page Title Header Ends-->
  <div class="row">
  
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          @include('back.message')
          <table class="table table-hover">
            <thead>
              <tr>
                <th>خلاصه</th>
                <th> نویسنده کامنت</th>
                <th> مطلب مربوطه</th>
                <th>تاریخ ثبت</th>
                <th>وضعیت</th>
                <th>مدیریت</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($comments as $i)


              @php
              $url = route('admin.comments.status',$i->id);
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
                    <td>{!!mb_substr($i->body , 0 , 30)!!}</td>
                    <td>{{$i->name}}</td>
                    <td>{{$i->article->name}}</td>
                    <td>{!!jdate($i->create_at)->format('%Y-%m-%d')!!}</td>
                  
                    <td><?php echo $status; ?></td>
                    <td>
                      
                    <a href="{{route('admin.comments.edit',$i)}}"><label class="badge badge-success">ویرایش</label></a>
                      <a href="{{route('admin.comments.destroy',$i->id)}}" 
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
    
    
    
    {{$comments->links()}}
  </div>
</div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('back.footer')
  <!-- partial -->
</div>  
@endsection


@section('title')
پنل مدیریت | مدیریت نظرات 
@endsection
