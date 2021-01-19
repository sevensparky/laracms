@include('auth.section.header')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
            <a href="{{ route('home') }}"><img src="{{ asset('images/icons/logo.png') }}" alt="logo" width="60" height="60"></a>

                <span class="login100-form-title-1">
                    ورود به سایت
                </span>
                @include('auth.section.error')
            </div>

            <form action="{{ route('login') }}" method="POST" class="login100-form validate-form">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="وارد کردن ایمیل ضروریست">
                    <span class="label-input100">ایمیل</span>
                    <input class="input100" type="email" name="email" style="text-align: right" placeholder="...ایمیل خود را وارد کنید">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate="کلمه عبور ضروریست">
                    <span class="label-input100">کلمه عبور</span>
                    <input class="input100" type="password" name="password" style="text-align: right" placeholder="...کلمه عبور خود را وارد کنید">
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
                        <label class="label-checkbox100" for="ckb1">
                            مرا به خاطر بسپار
                        </label>
                    </div>

                    <div>
                        <a href="{{ route('password.request') }}" class="txt1">
                            فراموشی رمز عبور
                        </a>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        ورود
                    </button>

                    <a href="{{ route('register') }}" class="ml-4 mt-3">
                       ثبت نام
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('auth.section.footer')