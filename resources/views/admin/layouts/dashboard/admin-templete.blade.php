<div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-newspaper-o"></i></div>
            <div class="count">{{ $allPostsTotal }}</div>
            <h3>مقالات</h3>
            <p>همه مقالات سایت</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-comments-o"></i></div>
            <div class="count">{{ $allCommentsTotal }}</div>
            <h3>نظرات</h3>
            <p>همه نظرات برای مقالات</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-tags"></i></div>
            <div class="count">{{ $allTagsTotal }}</div>
            <h3>برچسب ها</h3>
            <p>همه برچسب های ایجاد شده</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-users"></i></div>
            <div class="count">{{ $allUsersTotal }}</div>
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
                @foreach ($latestUsers as $user)
                <article class="media event">
                    {{-- <p class="pull-left">
                        <img src="{{ auth()->user()->image != null ? asset('images/'. auth()->user()->image) : asset('images/user.png') }}">
                    </p> --}}
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
                @foreach ($latestPosts as $post)
                <article class="media event">
                    <p class="pull-left">
                        <img src="{{ asset('storage/'.$post->image) }}" width="64" height="64">
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
                @foreach ($latestComments as $comment)
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
                @foreach ($latestTags as $tag)
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
