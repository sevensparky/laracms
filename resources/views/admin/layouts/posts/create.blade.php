@extends('admin.section.master')
@section('app')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>افزودن مقاله
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li title="برگشت"><a href="{{ route('posts.index') }}"><i class="fa fa-arrow-left"></i></a>
                    </li>
                </ul>
                
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <br/>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    
                   @include('admin.layouts.messages.error')

                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">عنوان مقاله
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="title" id="title" required="required" value="{{ old('title') }}"
                                   class="form-control col-md-7 col-xs-12" placeholder="عنوان مقاله را وارد کنید...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">عنوان مقاله
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="category_id" id="category_id"  class="form-control col-md-7 col-xs-12">
                                <option value="">دسته مربوطه را انتخاب کنید...</option>
                                @foreach (\App\Models\Category::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">توضیحات مقاله
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea type="text" id="description" required="required"
                            class="form-control col-md-7 col-xs-12" name="description" 
                             rows="3" placeholder="توضیحات کوتاهی را وارد کنید...">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="content">متن مقاله
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea type="text" id="content" required="required"
                            class="form-control col-md-7 col-xs-12" name="content" 
                             rows="7" placeholder="متن مقاله را وارد کنید...">{{ old('content') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">تصویر مقاله
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="file" name="image" id="image" required="required"
                                   class="form-control col-md-7 col-xs-12">
                                   
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tags">تگ های مقاله
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="tags[]" id="tags"  class="form-control col-md-7 col-xs-12" multiple>
                                <option value="">تگ های مربوطه را انتخاب کنید...</option>
                                @foreach (\App\Models\Tag::latest()->get() as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ route('posts.index') }}" class="btn btn-primary">انصراف</a>
                            <button type="submit" class="btn btn-success">ارسال</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
