@extends('admin.section.master')
@section('app')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>مشاهده نظر {{ $comment->user->name }}
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li title="برگشت"><a href="{{ route('comments.index') }}"><i class="fa fa-arrow-left"></i></a>
                    </li>
                </ul>
                
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <br/>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ایمیل کاربر</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <p>
                                {{ $comment->user->email }}
                            </p>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">تاریخ ارسال نظر</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <p>
                                {{ \Carbon\Carbon::parse($comment->created_at) }}
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">متن کامل نظر</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <p>
                                {{ $comment->comment }}
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
