<header id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="navbar-top-left-menu">
                        
                        <li class="nav-item">
                            <a href="" class="nav-link">{{ __('about us') }}</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="" class="nav-link">{{ __('gallery') }}</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="" class="nav-link">{{ __('news magazine') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="" class="nav-link"></a>
                        </li> --}}
                    </ul>
                    <ul class="navbar-top-right-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="{{ route('panel.index') }}" class="nav-link">{{ __('dashboard') }}</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">{{ __('sign in') }}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">{{ __('sign up') }}</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse justify-content-center collapse"
                            id="navbarSupportedContent">
                            <ul
                            class="navbar-nav d-lg-flex justify-content-between align-items-center"
                          >
                            <li>
                              <button class="navbar-close">
                                <i class="mdi mdi-close"></i>
                              </button>
                            </li>
                            @foreach ($categories as $category)
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ $category->url }}">{{ $category->name }}</a>
                            </li>                                    
                            @endforeach
                            <li class="nav-item active">
                              <a class="nav-link" href="/">{{ __('home') }}</a>
                            </li>
                          </ul>
                        </div>
                    </div>
                    <div>
                        <a href="/" class="navbar-brand">
                            <img src="{{ asset('storage/'. $footerRow->logo) }}" class="footer-logo" alt="{{ $footerRow->title }}" />
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>