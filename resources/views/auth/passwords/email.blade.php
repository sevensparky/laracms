@include('auth.section.header')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url( {{ asset('images/bg-01.jpg')}} );">
            <a href="{{ route('home') }}"><img src="{{ asset('images/icons/logo.png') }}" alt="logo" width="60" height="60"></a>

                <span class="login100-form-title-1">
                   فراموشی رمز عبور
                </span>
                @include('auth.section.error')
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>

            <form action="{{ route('password.email') }}" method="POST" class="login100-form validate-form">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="وارد کردن ایمیل ضروریست">
                    <span class="label-input100">ایمیل</span>
                    <input class="input100" type="email" name="email" style="text-align: right" placeholder="...ایمیل خود را وارد کنید">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn ml-5">
                        ورود
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('auth.section.footer')