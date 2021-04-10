@extends('section.master')
@section('content')
    <!-- Main Content -->
    <main class="main-content">
        <div class="section bg-gray">
          <div class="container">
            <div class="row">
  
              <div class="col-md-8 col-xl-9">
                <div class="row gap-y">
  
                    @php
                        $posts = \App\Models\Post::with('category')->latest()->paginate(15);
                    @endphp
                  @foreach ($posts as $post)
                  <div class="col-md-6">
                    <div class="card border hover-shadow-6 mb-6 d-block">
                      <a href="#"><img class="card-img-top" src="{{ asset('upload/posts/'.$post->image) }}" alt="{{ $post->title }}" style="height: 250px"></a>
                      <div class="p-6 text-center">
                        <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{ $post->categoryName }}</a></p>
                        <h5 class="mb-0"><a class="text-dark" href="{{ route('single.page', $post->slug) }}">{{ $post->title }}</a></h5>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>

                {{ $posts->links() }}
               
              </div>
  
  
  
              <div class="col-md-4 col-xl-3">
                <div class="sidebar px-4 py-md-0">
  
                  <h6 class="sidebar-title">جستجو</h6>
                  <form action="{{ route('search.page') }}" class="input-group" method="GET">
                    
                    <input type="text" class="form-control" name="search" placeholder="...جستجو در پست ها">
                    <div class="input-group-addon">
                      <span class="input-group-text"><i class="ti-search"></i></span>
                    </div>
                  </form>
  
                  <hr>
  


                  <h6 class="sidebar-title">دسته بندی ها</h6>
                  <div class="row link-color-default fs-14 lh-24">
                  @foreach (\App\Models\Category::orderBy('id','desc')->take(6)->get() as $item)
                    <div class="col-6"><a href="#">{{ $item->name }}</a></div>
                  @endforeach
                  </div>
              
                  <hr>
  
                  <h6 class="sidebar-title">برچسب ها</h6>
                  <div class="gap-multiline-items-1">
                    @foreach (\App\Models\Tag::orderBy('id','desc')->take(6)->get() as $tag)
                    <a class="badge badge-secondary" href="#">{{ $tag->name }}</a>
                    @endforeach
                  </div>
  
                </div>
              </div>
  
            </div>
          </div>
        </div>
      </main>

@endsection