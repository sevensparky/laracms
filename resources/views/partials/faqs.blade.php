@extends('partials.master')
{{-- @section('title', $news->title) --}}
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="col-sm-12">

                <div class="card" data-aos="fade-up">
                    <div class="card-body">

                        <div class="accordion" id="faqAccordion">
                            @foreach ($faqs as $faq)
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0 text-right" dir="rtl">
                                        <button class="btn btn-link collapsed text-decoration-none text-reset" type="button" data-toggle="collapse"
                                            data-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                            aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->question }}

                                            <i class="mdi mdi-arrow-down"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#faqAccordion">
                                    <div class="card-body text-right" dir="rtl">
                                        {{ $faq->answer }}
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
@endsection
