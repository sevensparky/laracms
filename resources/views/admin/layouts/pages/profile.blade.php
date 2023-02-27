@extends('admin.section.master')
@section('app')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li title="برگشت"><a href="{{ route('panel.index') }}"><i class="fa fa-arrow-left"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div class="col-md-4 col-sm-4 col-xs-12">
                <div >
                    @if (auth()->user()->image != null)
                        <img src="{{ asset("storage/". auth()->user()->image) }}" class="profile-page" height="128" width="128" /> 
                    @else
                        <img src="{{ asset("images/user.png") }}" height="128" width="128" />
                    @endif
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
                <h5>{{ definedDateFormat(auth()->user()->created_at) }}</h5>
                <br/>

                <a href="{{ route('edit.profile') }}" class="btn btn-warning">ویرایش</a>
            </div>
        </div>
    </div>
</div>
@endsection