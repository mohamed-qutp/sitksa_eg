<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('admin.home') }}">
        <img src="{{ asset('img/logos/logo-2.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="me-1 font-weight-bold">المصدر لتقنية المعلومات</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse px-0 w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="{{ route('slider.index') }}">
            <i class="fas fa-images"></i>
            <span class="nav-link-text me-1">سلايدر الصفحة الرئيسية</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('about-us.index') }}">
            <i class="fas fa-user-secret"></i>
            <span class="nav-link-text me-1">عن الشركة</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('category.index') }}">
            <i class="fas fa-screwdriver"></i>
            <span class="nav-link-text me-1">الخدمات</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('projects.index') }}">
            <i class="fas fa-tasks"></i>
            <span class="nav-link-text me-1">معرض البرامج</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('contactsIndex') }}">
            <i class="fas fa-bullhorn"></i>
            <span class="nav-link-text me-1">طلبات البرامج</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('clients.index') }}">
            <i class="fas fa-users"></i>
            <span class="nav-link-text me-1">عملائنا</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('newsletter.index') }}">
            <i class="fas fa-mail-bulk"></i>
            <span class="nav-link-text me-1">القائمة البريدية</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link " href="{{ route('hosting.index') }}">
            <i class="fas fa-receipt"></i>
            <span class="nav-link-text me-1">باقات الاستضافة</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">
            <i class="fas fa-receipt"></i>
            <span class="nav-link-text me-1">حجز الدومين</span>
          </a>
        </li> --}}
        {{-- <li class="nav-item">
          <a class="nav-link " href="#">
            <i class="fas fa-project-diagram"></i>
            <span class="nav-link-text me-1">العروض</span>
          </a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link " href="{{ route('meta.index') }}">
            <i class="fas fa-project-diagram"></i>
            <span class="nav-link-text me-1">META TAGS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('article.index') }}">
            <i class="fas fa-newspaper"></i>
            <span class="nav-link-text me-1">المقالات التقنية</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('contactsIndex') }}">
            <i class="fas fa-id-card-alt"></i>
            <span class="nav-link-text me-1">تواصل معنا</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('youtube.index') }}">
            <i class="fa fa-youtube"></i>
            <span class="nav-link-text me-1">فيديوهاتنا على اليوتيوب</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('support.index') }}">
            <i class="fas fa-headset"></i>
            <span class="nav-link-text me-1">مشاريع الدعم</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>