@extends('back.index')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title"> مدیریت کاربران</h4>
        </div>
      </div>
       
    </div>
    <!-- Page Title Header Ends-->
  <div class="row">
     
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          
          <table class="table table-hover">
            <thead>
              <tr>
                <th>نام</th>
                <th>ایمیل</th>
                <th>تلفن</th>
                <th>نقش</th>
                <th>وضعیت</th>
                <th>مدیریت</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($myusers as $i)
               <?php $role = '';?>
              @switch($i->role)
                  @case('1')
                      <?php $role = 'مدیر ';?>
                      @break
                  @case('2')
                  <?php $role = 'کاربر ';?>
                      @break
                  @default

                      
              @endswitch

              @php
                  $url = route('admin.user.status',$i->id);
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
                    <td>{{$i->email}}</td>
                    <td>{{$i->phone}}</td>
                    <td>{{$role}}</td>
                    <td><?php echo $status; ?></td>
                    <td>
                      
                    <a href="{{route('admin.profile',$i->id)}}"><label class="badge badge-success">ویرایش</label></a>
                      <a href="{{route('admin.user.delete',$i->id)}}" 
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
    
    
    
    {{$myusers->links()}}
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
