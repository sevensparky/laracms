@extends('partials.master')
@section('title', 'new')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-xl-4 stretch-card grid-margin">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h2>{{ __('hot news') }}</h2>

                            @foreach ($headlineNews as $news)
                                <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                                    <div class="pr-3">
                                        <h5>
                                            <a class="text-decoration-none text-reset" href="{{ route('news.page', [$news->category->slug, $news->slug]) }}">{{ $news->title }}</a>
                                        </h5>
                                        <div class="fs-12">
                                            <span class="mr-2">{{ $news->user->name }} </span>{{ definedDateFormat($news->created_at) }}
                                        </div>
                                    </div>
                                    <div class="rotate-img">
                                        <img src="{{ asset('storage/'. $news->picture) }}" alt="{{ $news->title }}" class="img-fluid img-lg" />
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-xl-8 stretch-card grid-margin">
                    <div class="position-relative">
                        <img src="{{ asset('storage/'. $mainNews->picture) }}" alt="{{ $mainNews->title }}" class="img-fluid" />
                        <div class="banner-content">
                            <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                {{ $mainNews->category->name }}
                            </div>
                            <h1 class="mb-2">
                                <a class="text-decoration-none text-reset" href="{{ route('news.page', [$mainNews->category->name, $mainNews->id]) }}">{{ $mainNews->title }}</a>
                            </h1>
                            <div class="fs-12">
                                <span class="mr-2">{{ __('author') }}: {{ $mainNews->user->name }}</span>{{ definedDateFormat($mainNews->created_at) }}
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            
            @include('partials.sections.main-section')
            @include('partials.sections.video-section')
            @include('partials.sections.light-section')           
            
        </div>
    </div>
@endsection
