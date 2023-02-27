@extends('partials.master')
@section('content')
<div class="content-wrapper">
    <div class="container">
      <div class="col-sm-12">
        <div class="card" data-aos="fade-up">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <h1 class="font-weight-600 mb-4">
                  {{ $category->name }}
                </h1>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                @foreach ($news as $item)
                <div class="row">
                    <div class="col-sm-4 grid-margin">
                      <div class="rotate-img">
                        <img
                          src="{{ asset('storage/'. $item->picture) }}"
                          alt="{{ $item->title }}"
                          class="img-fluid"
                        />
                      </div>
                    </div>
                    <div class="col-sm-8 grid-margin">
                      <a href="{{ route('news.page', [$item->category, $item->id]) }}" class="text-decoration-none" alt="{{ $item->title }}">
                        <h2 class="font-weight-600 mb-2 text-reset">
                            {{ $item->title }}
                        </h2>
                      </a>
                      <p class="fs-13 text-muted mb-0">
                        <span class="mr-2">{{ $item->user->name }}</span>{{ definedDateFormat($item->created_at) }}
                      </p>
                      <p class="fs-15">
                        {{ \Str::limit($item->description, 100) }}
                      </p>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="col-lg-4">
                <h2 class="mb-4 text-primary font-weight-600">
                  {{ __('latest news') }}
                </h2>
                
                @include('partials.sections.latest-news')

                <div class="trending">
                  <h2 class="mb-4 text-primary font-weight-600">
                    {{ __('latest articles') }}
                  </h2>
                  @include('partials.sections.latest-posts')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection