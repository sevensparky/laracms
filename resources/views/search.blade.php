@extends('section.master')
@section('content')


    <!-- Main Content -->
    <main class="main-content">

        <section class="section bg-gray">
          <div class="container">
  
            <div class="row gap-y">

                @foreach ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <div class="card d-block border hover-shadow-6 mb-6">
                      <a href="#"><img class="card-img-top" src="{{ asset('upload/posts/'.$post->image) }}" alt="Card image cap"></a>
                      <div class="p-6 text-center">
                        <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{ $post->categoryName }}</a></p>
                        <h5 class="mb-0"><a class="text-dark" href="{{ route('single.page',$post->slug) }}">{{ $post->title }}</a></h5>
                      </div>
                    </div>
                  </div>
                @endforeach

            </div>
  
  
            <nav class="flexbox mt-6">
              <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-2"></i> Newer</a>
              <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-2"></i></a>
            </nav>
  
          </div>
        </section>
  
      </main>
@endsection
