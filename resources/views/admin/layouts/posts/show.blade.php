@extends('admin.section.master')
@section('app')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li title="برگشت"><a href="{{ route('posts.index') }}"><i class="fa fa-arrow-left"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="product-image">
                    <img src="{{ asset("upload/posts/$post->image") }}"  />
                </div>
            </div>

            <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                <p>
                    <span>عنوان مقاله:</span>
                    <h5 class="prod_title">{{ $post->title }}</h5>                 
                </p>
                <p>
                    <span>توضیحات:</span>
                    <p>{{ $post->description }}</p>             
                </p>
                <br><br>


                <p>
                    <span>نویسنده مقاله:</span>
                    <h5>{{ $post->user->name }}</h5>                 
                </p><br><br>
                <p>
                    <span>تاریخ انتشار:</span>
                    <p>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>             
                </p>
                
                <br/>
            </div>

            <div class="col-md-12">

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tab_content1" id="home-tab"
                                role="tab" data-toggle="tab"
                                aria-expanded="true">متن کامل</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                             aria-labelledby="home-tab">
                           <p>{{ $post->content }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection