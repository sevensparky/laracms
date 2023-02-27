<div class="row" data-aos="fade-up">
    <div class="col-sm-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title">
                                {{ __('videos') }}
                            </div>
                            <p class="mb-3">{{ __('see all') }}</p>
                        </div>
                        <div class="row">
                            @foreach ($latestVideos as $video)
                                <div class="col-sm-6 grid-margin">
                                    <div class="position-relative">
                                        <div class="rotate-img">
                                            <img src="{{ asset('storage/' . $video->picture) }}" alt="thumb"
                                                class="img-fluid" />
                                        </div>
                                        <div class="badge-positioned w-90">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span
                                                    class="badge badge-danger font-weight-bold">{{ $video->category->name }}</span>
                                                <div class="video-icon">
                                                    <i class="mdi mdi-play"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-6 grid-margin">
                                <div class="position-relative">
                                    <div class="rotate-img">
                                        <img src="assets/images/dashboard/home_9.jpg" alt="thumb"
                                            class="img-fluid" />
                                    </div>
                                    <div class="badge-positioned w-90">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge badge-danger font-weight-bold">Lifestyle</span>
                                            <div class="video-icon">
                                                <i class="mdi mdi-play"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title">
                                {{ __('gallery') }}
                            </div>
                            <p class="mb-3">{{ __('see all') }}</p>
                        </div>
                        @foreach ($latestImages as $image)
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                <div class="div-w-80 mr-3">
                                    <div class="rotate-img">
                                        <img src="{{ asset('storage/' . $image->picture) }}" alt="{{ $image->title }}"
                                            class="img-fluid" width="120" height="94" />
                                    </div>
                                </div>
                                <h3 class="font-weight-600 mb-0">
                                    {{ $image->title }}
                                </h3>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
