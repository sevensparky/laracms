@extends('admin.section.master')
@section('app')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>ویرایش مقاله
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li title="برگشت"><a href="{{ route('posts.index') }}"><i class="fa fa-arrow-left"></i></a>
                    </li>
                </ul>
                
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <br/>
                <form action="{{ route('posts.update',$post->slug) }}" method="POST" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    
                   @include('admin.layouts.messages.error')

                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">عنوان مقاله
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="title" id="title"  value="{{ $post->title }}"
                                   class="form-control col-md-7 col-xs-12" placeholder="عنوان مقاله را وارد کنید...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">دسته بندی مقاله
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="category_id" id="category_id"  class="form-control col-md-7 col-xs-12">
                                <option value="">دسته مربوطه را انتخاب کنید...</option>
                                @foreach (\App\Models\Category::all() as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $post->category_id ? 'selected' : '' }} >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">توضیحات مقاله
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea type="text" id="description" 
                            class="form-control col-md-7 col-xs-12" name="description" 
                             rows="3" placeholder="توضیحات کوتاهی را وارد کنید..." style="resize: none;">{{ $post->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="content">متن مقاله (محتوا)
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        
                             <div class="x_content">
                                <div id="alerts"></div>
                                <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" id="textarea-font"
                                           title="فونت"><i class="fa fa-font"></i><b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                        </ul>
                                    </div>
            
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" title="اندازه فونت"><i
                                                class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a data-edit="fontSize 5">
                                                    <p style="font-size:17px">بزرگ</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-edit="fontSize 3">
                                                    <p style="font-size:14px">معمولی</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-edit="fontSize 1">
                                                    <p style="font-size:11px">کوچک</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
            
                                    <div class="btn-group">
                                        <a class="btn" data-edit="bold" title="درشت (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                        <a class="btn" data-edit="italic" title="ایتالیک (Ctrl/Cmd+I)"><i
                                                class="fa fa-italic"></i></a>
                                        <a class="btn" data-edit="strikethrough" title="خط خورده"><i
                                                class="fa fa-strikethrough"></i></a>
                                        <a class="btn" data-edit="underline" title="زیرخط (Ctrl/Cmd+U)"><i
                                                class="fa fa-underline"></i></a>
                                    </div>
            
                                    <div class="btn-group">
                                        <a class="btn" data-edit="insertunorderedlist" title="لیست دایره ای"><i
                                                class="fa fa-list-ul"></i></a>
                                        <a class="btn" data-edit="insertorderedlist" title="لیست عددی"><i
                                                class="fa fa-list-ol"></i></a>
                                        <a class="btn" data-edit="outdent" title="کاهش دندانه (Shift+Tab)"><i
                                                class="fa fa-dedent"></i></a>
                                        <a class="btn" data-edit="indent" title="دنداره (Tab)"><i class="fa fa-indent"></i></a>
                                    </div>
            
                                    <div class="btn-group">
            
                                        <a class="btn" data-edit="justifyright" title="تراز راست (Ctrl/Cmd+R)"><i
                                                class="fa fa-align-right"></i></a>
                                        <a class="btn" data-edit="justifycenter" title="وسط (Ctrl/Cmd+E)"><i
                                                class="fa fa-align-center"></i></a>
                                        <a class="btn" data-edit="justifyleft" title="تراز چپ (Ctrl/Cmd+L)"><i
                                                class="fa fa-align-left"></i></a>
                                        <a class="btn" data-edit="justifyfull" title="جاستیفای (Ctrl/Cmd+J)"><i
                                                class="fa fa-align-justify"></i></a>
                                    </div>
            
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" title="ابرلینک"><i
                                                class="fa fa-link"></i></a>
                                        <div class="dropdown-menu input-append">
                                            <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                                            <button class="btn" type="button">افزودن</button>
                                        </div>
                                        <a class="btn" data-edit="unlink" title="حذف ابر لینک"><i class="fa fa-cut"></i></a>
                                    </div>
            
                                    <div class="btn-group">
                                        <a class="btn" data-edit="undo" title="باطل کردن (Ctrl/Cmd+Z)"><i
                                                class="fa fa-undo"></i></a>
                                        <a class="btn" data-edit="redo" title="بازگردانی (Ctrl/Cmd+Y)"><i
                                                class="fa fa-repeat"></i></a>
                                    </div>
                                </div>
                                <textarea id="descr" name="content" class="editor-wrapper" style="width: 719px; height: 272px;resize:none">{{$post->content}}</textarea>
            
                                <br/>   
            
                            </div>
                        
                            </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">تصویر مقاله
                            <span class="required">*</span>
                        </label>

                    <div class="col-md-4 col-sm-12 col-xs-12 form-group">

                       

                        <span class="btn btn-primary btn-file">
                           انتخاب تصویر
                            <input type="file" name="image" id="file"
                            onchange="readURL(this);"
                            class="form-control col-md-7 col-xs-12 custom-file-input">
                        </span>

                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                        <img src="" id="image" alt="تصویر مقاله" width="180" height="180">
                    </div>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <img src="{{ asset("upload/posts/$post->image") }}" heigth="350" width="280">  
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
                                <option value="{{ $tag->id }}" {{ $post->hasTag($tag->id) ? 'selected' : ''}}>{{ $tag->name }}</option>
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

@push('styles')
<style>
.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}

</style>    
@endpush

@push('scripts')

<script src="{{ asset('bin/plugins/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ asset('bin/plugins/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
<script src="{{ asset('bin/plugins/google-code-prettify/src/prettify.js') }}"></script>

<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
