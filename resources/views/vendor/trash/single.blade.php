@extends('section.master')
@section('content')

 
    <!-- Main Content -->
    <main class="main-content">

        <div class="section">
          <div class="container">
  
            <div class="text-center mt-8">
              <h2>{{ $post->title }}</h2>
              <p>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }} در <a href="#">{{ $post->categoryName }}</a></p>
            </div>
  
  
            <div class="text-center my-8">
              <img class="rounded-md" src="{{ asset('upload/posts/'.$post->image) }}" alt="{{ $post->title }}">
            </div>
  
  
            <div class="row">
              <div class="col-lg-8 mx-auto">
  
                <p class="lead text-right">{{ $post->description }}</p>
  
                <hr class="w-100px">
                
                <p class="text-right" style="text-align: justify">{{ $post->content }}</p>

              </div>
            </div>

          </div>
        </div>

      @guest
   
      <div class="container">
        <div class="row">
          <div class="col-8 offset-2">
            <div class="alert alert-danger">
              <p class="text-right">برای مشاهده بخش نظرات وارد شوید</p>
            </div>

          </div>
        </div>
      </div>
      @else 
        
      <div class="section bg-gray">
        <div class="container">

          <div class="row">
            <div class="col-lg-8 mx-auto">

              <div class="media-list">

                @foreach ($comments as $item)
                <div class="media d-flex justify-content-end">
                  <img class="avatar avatar-sm mr-4 d-flex justify-content-end" src="{{ auth()->user()->image != null ? asset('images/'. auth()->user()->image) : asset('images/user.png') }}" alt="{{ $item->user->name }}">

                  <div class="media-body">
                    <div class="small-1 text-right">
                      <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">{{ \Carbon\Carbon::parse($item->user->created_at)->diffForHumans() }}</time> 
                      <strong>{{ $item->user->name }}</strong>
                    </div>
                    <p class="small-2 mb-0 text-right">{{ $item->comment }}</p>
                  </div>
                </div>
                @endforeach

              </div>

              <hr>

              @include('section.alerts.alert')

              <form action="{{ route('comment.send') }}" method="POST">
                @csrf
                
                <input type="hidden" name="commentable_id" value="{{ $post->id }}">
                <input type="hidden" name="commentable_type" value="{{ get_class($post) }}">
                
                <div class="form-group">
                  <textarea class="form-control text-right" name="comment" placeholder="...متن نظر خود را وارد کنید" rows="4"></textarea>
                </div>

                <button class="btn btn-primary btn-block" type="submit">ثبت</button>
              </form>

            </div>
          </div>

        </div>
      </div>   
      @endguest
  
  
  
      </main>

@endsection
