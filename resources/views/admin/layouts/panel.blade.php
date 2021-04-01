@extends('admin.section.master')
@section('app')
<div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-newspaper-o"></i></div>
            <div class="count">{{ count(\App\Models\Post::all()) }}</div>
            <h3>مقالات</h3>
            <p>همه مقالات سایت</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-comments-o"></i></div>
            <div class="count">179</div>
            <h3>نظرات</h3>
            <p>همه نظرات برای مقالات</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-tags"></i></div>
            <div class="count">{{ count(\App\Models\Tag::all()) }}</div>
            <h3>تگ ها</h3>
            <p>همه تگ های ایجاد شده</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-users"></i></div>
            <div class="count">{{ count(\App\Models\User::all()) }}</div>
            <h3>کاربران</h3>
            <p>همه کاربران سایت</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>آخرین کاربران اخیر
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @foreach (\App\Models\User::orderBy('id','desc')->take(5)->get() as $user)
                <article class="media event">
                    <p class="pull-left">
                        <img src="{{ asset('images/user.png') }}">
                    </p>
                    <div class="media-body">
                        <a class="title">{{ $user->name }}</a>
                        <p>{{ $user->email }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>آخرین مقالات اخیر
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach (\App\Models\Post::orderBy('id','desc')->take(5)->get() as $post)
                    <article class="media event">
                        <p class="pull-left">
                            <img src="{{ asset('upload/posts/'.$post->image) }}" width="64" height="64">
                        </p>
                        <div class="media-body">
                            <a class="title">{{ Str::limit($post->description,31) }}</a>
                            <p>{{ Str::limit($post->description,35) }}</p>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>


    <div class="row">
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>آخرین نظرات ارسالی
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach (\App\Models\User::orderBy('id','desc')->take(5)->get() as $user)
                    <article class="media event">
                        <p class="pull-left">
                            <img src="{{ asset('images/user.png') }}">
                        </p>
                        <div class="media-body">
                            <a class="title">{{ $user->name }}</a>
                            <p>{{ $user->email }}</p>
                        </div>
                    </article>
                    @endforeach
                </div>
        </div>
    </div>
</div>

</div>
@endsection