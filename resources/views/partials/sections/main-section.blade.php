<div class="row" data-aos="fade-up">
    <div class="col-lg-9 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                @foreach ($latestNews as $news)
                <div class="row">
                    <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                            <div class="rotate-img">
                                <img src="{{ asset('storage/'. $news->picture) }}" alt="thumb"
                                    class="img-fluid" />
                            </div>
                            <div class="badge-positioned">
                                <span class="badge badge-danger font-weight-bold">{{ __('new') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8  grid-margin">
                        <a href="{{ route('news.page', [$news->category, $news->id]) }}" class="text-decoration-none text-reset" alt="{{ $news->title }}">
                            <h2 class="mb-2 font-weight-600">
                                {{ $news->title }}
                            </h2>
                        </a>
                        <div class="fs-13 mb-2">
                            <span class="mr-2">{{ $news->user->name }} </span> {{ definedDateFormat($news->created_at) }}
                        </div>
                        <p class="mb-0">
                            {{ \Str::limit($news->description, 100) }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <h2>{{ __('categories') }}</h2>
                <ul class="vertical-menu">
                    @foreach ($categories as $category)
                        <li><a href="{{ route('page.unique' ,$category->url) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>