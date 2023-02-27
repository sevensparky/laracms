@extends('partials.master')
@section('title', $news->title)
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="col-sm-12">
                <div class="card" data-aos="fade-up">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div>
                                    <h1 class="font-weight-600 mb-1">
                                        {{ $news->title }}
                                    </h1>
                                    <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2">{{ $news->user->name }}
                                        </span>{{ definedDateFormat($news->created_at) }}
                                    </p>
                                    <div class="rotate-img">
                                        <img src="{{ asset('storage/' . $news->picture) }}" alt="{{ $news->title }}"
                                            class="img-fluid mt-4 mb-4" />
                                    </div>
                                    <p class="mb-4 fs-15">
                                        {{ $news->description }}
                                    </p>
                                </div>
                                <div>
                                    <p class="mb-4 fs-15">
                                        {!! $news->content !!}
                                    </p>
                                </div>
                                <div class="d-lg-flex">
                                    <span class="fs-16 font-weight-600 mr-2 mb-1">{{ __('tags') }}</span>
                                    @foreach ($tags as $tag)
                                        <span class="badge badge-outline-dark mr-2 mb-1">{{ $tag }}</span>
                                    @endforeach
                                </div>
                                <div class="post-comment-section">
                                    <h3 class="font-weight-600">{{ __('related news') }}</h3>
                                    <div class="row">
                                        @foreach ($relatedNews as $related)
                                            <div class="col-sm-6">
                                                <div class="post-author">
                                                    <div class="rotate-img">
                                                        <img src="{{ asset('storage/' . $related->picture) }}"
                                                            alt="{{ $related->title }}" class="img-fluid" />
                                                    </div>
                                                    <div class="post-author-content">

                                                        <h5 class="mb-1">
                                                            <a class="text-decoration-none text-reset"
                                                                href="{{ route('news.page', [$related->category->name, $related->id]) }}"
                                                                alt="{{ $related->title }}">
                                                                {{ $related->title }}
                                                            </a>
                                                        </h5>

                                                        <p class="fs-13 text-muted mb-0">
                                                            <span class="mr-2">{{ $related->user->name }}
                                                            </span>{{ definedDateFormat($related->created_at) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    @guest

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-8 offset-2">
                                                    <div class="alert alert-danger">
                                                        <p class="text-right">{{ __('log in to see the comment section') }}</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="comment-section">
                                            <h5 class="font-weight-600">{{ __('comments') }}</h5>

                                            <div class="comment-box mb-0">

                                                <form action="{{ route('comment.send') }}" method="post">
                                                    @csrf

                                                    <input type="hidden" name="commentable_id" value="{{ $news->id }}">
                                                    <input type="hidden" name="commentable_type"
                                                        value="{{ get_class($news) }}">

                                                    <textarea class="form-control" name="comment" id="comment" cols="10" rows="10"
                                                        placeholder="{{ __('enter your comment') }}"></textarea>

                                                    <button type="submit" class="btn btn-dark mt-3 d-flex jus">
                                                        {{ __('submit') }}
                                                    </button>
                                                </form>
                                            </div>

                                            @foreach ($comments as $comment)
                                                <div class="comment-box mb-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="rotate-img">
                                                            <img src="../assets/images/faces/face3.jpg" alt="banner"
                                                                class="img-fluid img-rounded mr-3" />
                                                        </div>
                                                        <div>
                                                            <p class="fs-12 mb-1 line-height-xs">
                                                                {{ definedDateFormat($comment->created_at) }}
                                                            </p>
                                                            <p class="fs-16 font-weight-600 mb-0 line-height-xs">
                                                                {{ $comment->user->name }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <p class="fs-12 mt-3">
                                                        {{ $comment->comment }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>

                                    @endguest
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h2 class="mb-4 text-primary font-weight-600">
                                    {{ __('latest news') }}
                                </h2>
                                @include('partials.sections.latest-news')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
