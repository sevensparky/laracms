<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

      <div class="navbar-left">
        <button class="navbar-toggler" type="button">&#9776;</button>
        <a class="navbar-brand" href="{{ route('home') }}">
          <img class="logo-dark" src="{{ asset('images/icons/logo.png') }}" alt="logo" width="60" height="15">
          <img class="logo-light" src="{{ asset('images/icons/logo.png') }}" alt="logo" width="60" height="15">
        </a> 
      </div>

      <section class="navbar-mobile">
        <span class="navbar-divider d-mobile-none"></span>

        
      </section>

      @guest()
      <a class="btn btn-xs btn-round btn-success" href="{{ route('register') }}">ثبت نام</a>
      <a class="btn btn-xs btn-round btn-success ml-3" href="{{ route('login') }}">ورود</a>
      @else
      <a class="btn btn-xs btn-round btn-success" href="{{ route('panel.index') }}">پنل کاربری</a>
      @endguest

    </div>
  </nav><!-- /.navbar -->