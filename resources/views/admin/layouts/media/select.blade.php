@extends('admin.section.master')
@section('app')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>آخرین اخبار منتخب</h2>
            {{-- <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a href="{{ route('news.create') }}"><i class="fa fa-plus"></i></a>
                </li>
                <li>
                    <a href="{{ route('news.check.items') }}"><i class="fa fa-check"></i></a>
                </li>
            </ul> --}}
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-6">
                    <div class="x_panel">
                        <div class="x_content">
                            <article class="media event">
                                <p class="pull-left">
                                    <img src="{{ auth()->user()->image != null ? asset('images/'. auth()->user()->image) : asset('images/user.png') }}">
                                </p>
                                <div class="media-body">
                                    <h4>
                                        <a href="{{ route('images.index') }}" class="title">بخش تصاویر</a>
                                    </h4>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="x_panel">
                        <div class="x_content">
                            <article class="media event">
                                <p class="pull-left">
                                    <img src="{{ auth()->user()->image != null ? asset('images/'. auth()->user()->image) : asset('images/user.png') }}">
                                </p>
                                <div class="media-body">
                                    <h4>
                                        <a href="{{ route('videos.index') }}" class="title">بخش ویدیو ها</a>
                                    </h4>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
