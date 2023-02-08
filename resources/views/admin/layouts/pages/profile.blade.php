@extends('admin.section.master')
@section('app')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li title="برگشت"><a href="#"><i class="fa fa-arrow-left"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div class="col-md-4 col-sm-4 col-xs-12">
                <div >
                    <img src="{{ asset("images/user.png") }}" height="128" width="128" />
                </div>
            </div>

            <div class="col-md-8 col-sm-8 col-xs-12" style="border:0px solid #e5e5e5;">
                <h5 class="prod_title">نام کاربری</h5>
                <h5>{{ auth()->user()->name }}</h5>
                <br/>
                <h5 class="prod_title">ایمیل</h5>
                <h5>{{ auth()->user()->email }}</h5>
                <br/>
                <h5 class="prod_title">عضویت در تاریخ</h5>
                <h5>{{ \Carbon\Carbon::parse(auth()->user()->created_at)->diffForHumans() }}</h5>
                <br/>

                <form action="{{ route('panel.index') }}" method="post">
                    @csrf   
                    @method('GET')
                    <a href="#" class="btn btn-warning">ویرایش</a>
                    <button type="submit" class="btn btn-primary">تایید</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection