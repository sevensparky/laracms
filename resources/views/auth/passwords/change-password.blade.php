@include('auth.section.header')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url({{ asset('images/bg-01.jpg') }});">
            <a href="{{ route('home') }}"><img src="{{ asset('images/icons/logo.png') }}" alt="logo" width="60" height="60"></a>

                <span class="login100-form-title-1">
                    تغییر رمز عبور
                </span>
                @include('auth.section.error')
            </div>

            <form action="{{ route('change-password.store') }}" method="POST" class="login100-form validate-form">
                @csrf

                <div class="wrap-input100 validate-input m-b-26" data-validate="وارد کردن ایمیل ضروریست">
                    <span class="label-input100">رمز عبور فعلی</span>
                    <input class="input100" type="password" name="oldPassword" style="text-align: right" placeholder="...ایمیل خود را وارد کنید">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate="رمز عبور ضروریست">
                    <span class="label-input100">رمز عبور جدید</span>
                    <input class="input100" type="password" name="password" style="text-align: right" placeholder="...رمز عبور جدید خود را وارد کنید">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate="تایید رمز عبور ضروریست">
                    <span class="label-input100">تایید رمز عبور</span>
                    <input class="input100" type="password" name="password_confirmation" style="text-align: right" placeholder="...تایید رمز عبور خود را وارد کنید">
                    <span class="focus-input100"></span>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        تایید
                    </button>

                    <a href="{{ route('panel.index') }}" class="ml-4 mt-3">
                       انصراف
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('auth.section.footer')