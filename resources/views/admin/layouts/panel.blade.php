@extends('admin.section.master')
@section('app')

@if (auth()->user()->role == 'admin')

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
            <div class="count">{{ count(\App\Models\Comment::all()) }}</div>
            <h3>نظرات</h3>
            <p>همه نظرات برای مقالات</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-tags"></i></div>
            <div class="count">{{ count(\App\Models\Tag::all()) }}</div>
            <h3>برچسب ها</h3>
            <p>همه برچسب های ایجاد شده</p>
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
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>آخرین کاربران
                </h2>
                <h5 class="pull-left">
                    <a href="{{ route('users.index') }}">مشاهده</a>
                </h5>
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

    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>آخرین مقالات
                </h2>
                <h5 class="pull-left">
                    <a href="{{ route('posts.index') }}">مشاهده</a>
                </h5>
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
                        <p>{{ Str::limit($post->content,35) }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>آخرین نظرات
                </h2>
                <h5 class="pull-left">
                    <a href="{{ route('comments.index') }}">مشاهده</a>
                </h5>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @foreach (\App\Models\Comment::orderBy('id','desc')->take(5)->get() as $comment)
                <article class="media event">
                    <p class="pull-left">
                        @if ($comment->status == 'accepted')
                        <span class="label label-success">تایید شده</span>
                        @elseif($comment->status == 'rejected')
                        <span class="label label-danger">رد شده</span>
                        @else
                        <span class="label label-warning">مشاهده نشده</span>
                        @endif
                    </p>
                    <div class="media-body">
                        <p>{{ Str::limit($comment->comment,35) }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>آخرین برچسب ها
                </h2>
                <h5 class="pull-left">
                    <a href="{{ route('tags.index') }}">مشاهده</a>
                </h5>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @foreach (\App\Models\Tag::orderBy('id','desc')->take(5)->get() as $tag)
                <article class="media event">
                    <div class="media-body">
                        <p>{{ $tag->name }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</div>


@else

<div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-newspaper-o"></i></div>
            <div class="count">{{ count(\App\Models\Post::where('user_id',auth()->user()->id)->get()) }}</div>
            <h3>مقالات</h3>
            <p>همه مقالات ایجاد شده توسط شما</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-comments-o"></i></div>
            <div class="count">{{ count(\App\Models\Comment::where('user_id',auth()->user()->id)->get()) }}</div>
            <h3>نظرات</h3>
            <p>همه نظرات شما</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-tags"></i></div>
            <div class="count">{{ count(\App\Models\Tag::where('user_id',auth()->user()->id)->get()) }}</div>
            <h3>برچسب ها</h3>
            <p>همه برچسب های ایجاد شده توسط شما</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-cubes"></i></div>
            <div class="count">{{ count(\App\Models\Category::where('user_id',auth()->user()->id)->get()) }}</div>
            <h3>دسته بندی ها</h3>
            <p>همه دسته بندی های ایجاد شده توسط شما</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>آخرین مقالات شما
                </h2>
                <h5 class="pull-left">
                    <a href="{{ route('posts.index') }}">مشاهده</a>
                </h5>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @foreach (\App\Models\Post::where('user_id',auth()->user()->id)->orderBy('id','desc')->take(5)->get() as $post)
                <article class="media event">
                    <p class="pull-left">
                        <img src="{{ asset('upload/posts/'.$post->image) }}" width="64" height="64">
                    </p>
                    <div class="media-body">
                        <a class="title">{{ Str::limit($post->description,31) }}</a>
                        <p>{{ Str::limit($post->content,35) }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>آخرین نظرات
                </h2>
                <h5 class="pull-left">
                    <a href="{{ route('comments.index') }}">مشاهده</a>
                </h5>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @foreach (\App\Models\Comment::where('user_id',auth()->user()->id)->orderBy('id','desc')->orderBy('id','desc')->take(5)->get() as $comment)
                <article class="media event">
                    <p class="pull-left">
                        @if ($comment->status == 'accepted')
                        <span class="label label-success">تایید شده</span>
                        @elseif($comment->status == 'rejected')
                        <span class="label label-danger">رد شده</span>
                        @else
                        <span class="label label-warning">در انتظار تایید مدیران</span>
                        @endif
                    </p>
                    <div class="media-body">
                        <p>{{ Str::limit($comment->comment,35) }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>آخرین دسته ها
                </h2>
                <h5 class="pull-left">
                    <a href="{{ route('categories.index') }}">مشاهده</a>
                </h5>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @foreach (\App\Models\Category::where('user_id',auth()->user()->id)->orderBy('id','desc')->orderBy('id','desc')->take(5)->get() as $category)
                <article class="media event">
                    <div class="media-body">
                        <p>{{ $category->name }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>آخرین برچسب ها
                </h2>
                <h5 class="pull-left">
                    <a href="{{ route('tags.index') }}">مشاهده</a>
                </h5>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @foreach (\App\Models\Tag::where('user_id',auth()->user()->id)->orderBy('id','desc')->orderBy('id','desc')->take(5)->get() as $tag)
                <article class="media event">
                    <div class="media-body">
                        <p>{{ $tag->name }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endif
@endsection
