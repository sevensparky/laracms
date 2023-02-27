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
                <div class="col-md-12">
                    <div class="x_panel">
                        {{-- <div class="x_title">
                            <h2>آخرین کاربران
                            </h2>
                            <h5 class="pull-left">
                                <a href="{{ route('users.index') }}">مشاهده</a>
                            </h5>
                            <div class="clearfix"></div>
                        </div> --}}
                        <div class="x_content">
                            <article class="media event">
                                <p class="pull-left">
                                    <img src="{{ auth()->user()->image != null ? asset('images/'. auth()->user()->image) : asset('images/user.png') }}">
                                </p>
                                <div class="media-body">
                                    <a href="{{ route('news.select.items') }}" class="title">آیتم اصلی</a>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                            </article>

                            <article class="media event">
                                <p class="pull-left">
                                    <img src="{{ auth()->user()->image != null ? asset('images/'. auth()->user()->image) : asset('images/user.png') }}">
                                </p>
                                <div class="media-body">
                                    <a class="title">آیتم اول</a>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                            </article>

                            <article class="media event">
                                <p class="pull-left">
                                    <img src="{{ auth()->user()->image != null ? asset('images/'. auth()->user()->image) : asset('images/user.png') }}">
                                </p>
                                <div class="media-body">
                                    <a class="title">آیتم دوم</a>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                            </article>

                            <article class="media event">
                                <p class="pull-left">
                                    <img src="{{ auth()->user()->image != null ? asset('images/'. auth()->user()->image) : asset('images/user.png') }}">
                                </p>
                                <div class="media-body">
                                    <a class="title">آیتم سوم</a>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                    <p>Lorem ipsum dolor sit amet.</p>
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
