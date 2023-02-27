<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <img src="{{ asset('storage/'. $footerRow->logo) }}" class="footer-logo" alt="{{ $footerRow->short_description }}" />
                    <h5 class="font-weight-normal mt-4 mb-5">
                        {{ $footerRow->short_description }}
                    </h5>
                    <ul class="social-media mb-3">
                        @if ($social->facebook)
                        <li>
                            <a href="{{ $social->facebook }}">
                                <i class="mdi mdi-facebook"></i>
                            </a>
                        </li>
                        @endif

                        @if ($social->youtube)
                        <li>
                            <a href="{{ $social->youtube }}">
                                <i class="mdi mdi-youtube"></i>
                            </a>
                        </li>
                        @endif

                        @if ($social->twitter)
                        <li>
                            <a href="{{ $social->twitter }}">
                                <i class="mdi mdi-twitter"></i>
                            </a>
                        </li>
                        @endif

                        @if ($social->telegram)
                        <li>
                            <a href="{{ $social->telegram }}">
                                <i class="mdi mdi-telegram"></i>
                            </a>
                        </li>
                        @endif

                        @if ($social->whatsapp)
                        <li>
                            <a href="{{ $social->whatsapp }}">
                                <i class="mdi mdi-whatsapp"></i>
                            </a>
                        </li>
                        @endif

                        @if ($social->instagram)
                        <li>
                            <a href="{{ $social->instagram }}">
                                <i class="mdi mdi-instagram"></i>
                            </a>
                        </li>
                        @endif

                        @if ($social->linkedin)
                        <li>
                            <a href="{{ $social->linkedin }}">
                                <i class="mdi mdi-linkedin"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h3 class="font-weight-bold mb-3">{{ __('last recent news') }}</h3>
                        @foreach ($latestNews as $news)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="footer-border-bottom pb-2">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="{{ asset('storage/'. $news->picture) }}" alt="{{ $news->title }}"
                                                class="img-fluid" />
                                        </div>
                                        <div class="col-9">
                                            <h5 class="font-weight-600">
                                                {{ $news->title }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
                <div class="col-sm-3">
                    <h3 class="font-weight-bold mb-3">{{ __('categories') }}</h3>
                    @foreach ($categories as $category)
                    <div class="footer-border-bottom pb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 font-weight-600">
                                <a href="{{ route('page.unique' ,$category->url) }}" class="text-decoration-none text-reset">
                                    {{ $category->name }}
                                </a>
                            </h5>
                            <div class="count">{{ newsCount($category->id) }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div class="fs-14 font-weight-600 m-auto d-block">
                            {{ $footerRow->copyright }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
