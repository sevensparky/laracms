@extends('admin.section.master')
@section('app')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>بخش ایجاد شبکه های اجتماعی
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li title="برگشت"><a href="{{ route('social.index') }}"><i class="fa fa-arrow-left"></i></a>
                        </li>
                    </ul>

                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <br/>

                    <div class="alert alert-warning">
                        <p><i class="fa fa-exclamation-triangle"></i>
                            در صورت عدم وجود شماره همراه، صفحه (پیج)، و آیدی (ID) از هر شبکه اجتماعی که در پایین ذکر شده
                            نیاز به پرکردن آن نمی باشد.
                            <br>فقط مواردی را پر کنید که شماره، صفحه (پیج)، و آیدی (ID) آن موجود می باشد.
                        </p>
                    </div>

                    {{--                <form action="{{ route('social.store') }}" method="POST"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">--}}

                    <form class="form" action="{{ route('social.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-addon">
                                            <span class="input-group-text" id="telegram">تلگرام</span>
                                        </div>
                                        <input type="text" class="form-control" name="telegram" id="telegram"
                                               placeholder="آیدی خود را وارد کنید.."
                                               aria-describedby="telegram"
                                        >
                                    </div>
                                    @error('telegram')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-addon">
                                            <span class="input-group-text" id="whatsapp">واتس اپ</span>
                                        </div>
                                        <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                                               placeholder="شماره تلفن همراه خود را وارد کنید.."
                                               aria-describedby="whatsapp"
                                        >
                                    </div>
                                    @error('whatsapp')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-addon">
                                            <span class="input-group-text" id="youtube">یوتیوب</span>
                                        </div>
                                        <input type="text" class="form-control" name="youtube" id="youtube"
                                               placeholder="آدرس صفحه خود را وارد کنید.." aria-describedby="youtube"
                                        >
                                    </div>
                                    @error('youtube')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-addon">
                                            <span class="input-group-text" id="twitter">توییتر</span>
                                        </div>
                                        <input type="text" class="form-control" name="twitter" id="twitter"
                                               placeholder="آدرس صفحه یا آیدی خود را وارد کنید.."
                                               aria-describedby="twitter"
                                        >
                                    </div>
                                    @error('twitter')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-addon">
                                            <span class="input-group-text" id="facebook">فیسبوک</span>
                                        </div>
                                        <input type="text" class="form-control" name="facebook" id="facebook"
                                               placeholder="آدرس صفحه یا آیدی خود را وارد کنید.."
                                               aria-describedby="facebook"
                                        >
                                    </div>
                                    @error('facebook')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-addon">
                                            <span class="input-group-text" id="instagram">اینستاگرام</span>
                                        </div>
                                        <input type="text" class="form-control" name="instagram" id="instagram"
                                               placeholder="آدرس صفحه یا آیدی خود را وارد کنید.."
                                               aria-describedby="instagram"
                                        >
                                    </div>
                                    @error('instagram')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-addon">
                                            <span class="input-group-text" id="skype">اسکایپ</span>
                                        </div>
                                        <input type="text" class="form-control" name="skype" id="skype"
                                               placeholder="آدرس صفحه یا آیدی خود را وارد کنید.."
                                               aria-describedby="skype"
                                        >
                                    </div>
                                    @error('skype')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-addon"> 
                                            <span class="input-group-text" id="linkedin">لینکدین</span>
                                        </div>
                                        <input type="text" class="form-control" name="linkedin" id="linkedin"
                                               placeholder="آدرس صفحه یا آیدی خود را وارد کنید.."
                                               aria-describedby="linkedin"
                                        >
                                    </div>
                                    @error('linkedin')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('social.index') }}" class="btn btn-primary">انصراف</a>
                                <button type="submit" class="btn btn-success">ارسال</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
