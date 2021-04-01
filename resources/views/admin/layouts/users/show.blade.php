@extends('admin.section.master')
@section('app')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li title="برگشت"><a href="{{ route('articles.index') }}"><i class="fa fa-arrow-left"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="product-image">
                    <img src="{{ asset("upload/articles/$article->images") }}" />
                </div>
            </div>

            <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                <h3 class="prod_title">{{ $article->title }}</h3>
                <p>{{ $article->description }}</p>
                <br/>
            </div>

            <div class="col-md-12">

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab"
                                                                  role="tab" data-toggle="tab"
                                                                  aria-expanded="true">متن کامل</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                             aria-labelledby="home-tab">
                           <p>{{ $article->body }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection