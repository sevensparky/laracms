@include('auth.section.header')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
            <a href="{{ route('home') }}"><img src="{{ asset('images/icons/logo.png') }}" alt="logo" width="60" height="60"></a>

                <span class="login100-form-title-1">
                    ثبت نام در سایت
                </span>
                @include('auth.section.error')
            </div>

            <form action="{{ route('register') }}" method="POST" class="login100-form validate-form">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="وارد کردن نام ضروریست">
                    <span class="label-input100">نام</span>
                    <input class="input100" type="text" name="name" style="text-align: right" placeholder="...نام خود را وارد کنید">
                    <span class="focus-input100"></span>
                </div>

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

                <div class="wrap-input100 validate-input m-b-18" data-validate="تکرار کلمه عبور ضروریست">
                    <span class="label-input100">تکرار کلمه عبور</span>
                    <input class="input100" type="password" name="password_confirmation" style="text-align: right" placeholder="...تکرار کلمه عبور خود را وارد کنید">
                    <span class="focus-input100"></span>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        ثبت نام
                    </button>

                    <a href="{{ route('login') }}" class="ml-4 mt-3">
                       ورود
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('auth.section.footer')