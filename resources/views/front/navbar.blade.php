<header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links">
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="#intro" class="scrollto"><span>Rapid</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="front/img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">خانه</a></li>
          <li><a href="#about">درباره ما</a></li>
          <li><a href="#services">خدمات</a></li>
          <li><a href="#portfolio">نمونه کار ها</a></li>
          <li><a href="#team">اعضای تیم</a></li>
        <li><a href="{{route('articles')}}">مطالب </a></li>
          <li class="drop-down"><a href="">منوی کاربری</a>
            <ul>

              
              @auth
              {{-- با استفاده از دستور زیر میتوانیم به ایدی کاربر دسترسی داشته باشیم --}}
            <li><a  href="{{route('profile',Auth()->user()->id)}}"> پروفایل </a></li>
                    @if (Auth()->user()->role==1)
                    <li><a target="_blank" href="{{route('admin.index')}}">پنل مدیریت </a></li>
                    
                    @endif
              {{-- اگر کار بر لاگین کرده بود دکمه خروج ببینه  --}}
                    <form action="{{route('logout')}}" method="POST">
                      @csrf 
                      <button type="submit" class="btn btn-danger" > خروج </button>  
                      
                    </form>
              @else
              
                  <li><a  href="{{route('register')}}">ثبت نام </a></li>
                  <li><a  href="{{route('login')}}">ورود  </a></li>
              
              @endauth
              
              <li>
              </li>
            </ul>
          </li>
          <li><a href="#footer">تماس باما</a></li>
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->