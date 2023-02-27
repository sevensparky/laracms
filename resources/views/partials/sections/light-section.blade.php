<div class="row" data-aos="fade-up">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card-title">
                                    پخش زنده
                                </div>
                                <div class="rotate-img">
                                    <img src="assets/images/dashboard/home_16.jpg" alt="thumb" class="img-fluid" />
                                </div>
                                <h2 class="mt-3 text-primary mb-2">
                                    Newsrooms exercise..
                                </h2>
                                <p class="fs-13 mb-1 text-muted">
                                    <span class="mr-2">Photo </span>10 Minutes ago
                                </p>
                                <p class="my-3 fs-15">
                                    Lorem Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown printer
                                    took
                                </p>
                                <a href="#" class="font-weight-600 fs-16 text-dark">Read
                                    more</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-title">
                                    {{ __('news magazine') }}
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="border-bottom pb-3">
                                            @foreach ($magazine as $item)
                                                <div class="row">
                                                    <div class="col-sm-5 pr-2">
                                                        <div class="rotate-img">
                                                            <img src="{{ asset('storage/' . $item->picture) }}"
                                                                alt="{{ $item->title }}" class="img-fluid w-100" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 pl-2">
                                                        <p class="fs-16 font-weight-600 mb-0">
                                                            {{ $item->title }}
                                                        </p>
                                                        <p class="fs-13 text-muted mb-0">
                                                            <span class="mr-2">{{ $item->user->name }} </span>
                                                            {{ definedDateFormat($item->created_at) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card-title">
                                    {{ __('gallery') }}
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="border-bottom pb-3">
                                            @foreach ($gallery as $item)
                                                <div class="row">
                                                    <div class="col-sm-5 pr-2">
                                                        <div class="rotate-img">
                                                            <img src="{{ asset('storage/' . $item->picture) }}"
                                                                alt="{{ $item->title }}" class="img-fluid w-100" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 pl-2">
                                                        <p class="fs-16 font-weight-600 mb-0">
                                                            {{ $item->title }}
                                                        </p>
                                                        <p class="fs-13 text-muted mb-0">
                                                            <span class="mr-2">{{ $item->user->name }} </span>
                                                            {{ definedDateFormat($item->created_at) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-title">
                                    آخرین مقالات
                                </div>
                                @foreach ($latestPosts as $post)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="border-bottom pb-3">
                                                <div class="row">
                                                    <div class="col-sm-5 pr-2">
                                                        <div class="rotate-img">
                                                            <img src="{{ asset('storage/' . $post->image) }}"
                                                                alt="{{ $post->title }}" class="img-fluid w-100" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 pl-2">
                                                        <p class="fs-16 font-weight-600 mb-0">
                                                            {{ $post->title }}
                                                        </p>
                                                        <p class="fs-13 text-muted mb-0">
                                                            <span class="mr-2">{{ $post->user->name }}
                                                            </span>{{ definedDateFormat($post->created_at) }}
                                                        </p>
                                                        {{-- <p class="mb-0 fs-13">
                                                        Lorem Ipsum has been
                                                    </p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
