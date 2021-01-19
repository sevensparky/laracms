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
                
                <p style="text-align: justify">{{ $post->content }}</p>

              </div>
            </div>

          </div>
        </div>
  
  
  
        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Comments
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="section bg-gray">
          <div class="container">
  
            <div class="row">
              <div class="col-lg-8 mx-auto">
  
                <div class="media-list">
  
                  <div class="media">
                    <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/1.jpg" alt="...">
  
                    <div class="media-body">
                      <div class="small-1">
                        <strong>Maryam Amiri</strong>
                        <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">24 min ago</time>
                      </div>
                      <p class="small-2 mb-0">Thoughts his tend and both it fully to would the their reached drew project the be I hardly just tried constructing I his wonder, that his software and need out where didn't the counter productive.</p>
                    </div>
                  </div>
  
  
  
                  <div class="media">
                    <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/2.jpg" alt="...">
  
                    <div class="media-body">
                      <div class="small-1">
                        <strong>Hossein Shams</strong>
                        <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">6 hours ago</time>
                      </div>
                      <p class="small-2 mb-0">Was my suppliers, has concept how few everything task music.</p>
                    </div>
                  </div>
  
  
  
                  <div class="media">
                    <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/3.jpg" alt="...">
  
                    <div class="media-body">
                      <div class="small-1">
                        <strong>Sarah Hanks</strong>
                        <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">Yesterday</time>
                      </div>
                      <p class="small-2 mb-0">Been me have the no a themselves, agency, it that if conduct, posts, another who to assistant done rattling forth there the customary imitation.</p>
                    </div>
                  </div>
  
                </div>
  
  
                <hr>
  
  
                <form action="#" method="POST">
  
                  <div class="row">
                    <div class="form-group col-12 col-md-6">
                      <input class="form-control" type="text" placeholder="Name">
                    </div>
  
                    <div class="form-group col-12 col-md-6">
                      <input class="form-control" type="text" placeholder="Email">
                    </div>
                  </div>
  
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Comment" rows="4"></textarea>
                  </div>
  
                  <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
                </form>
  
              </div>
            </div>
  
          </div>
        </div>
  
  
  
      </main>

@endsection
