@extends('admin.section.master')
@section('app')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>افزودن مقاله
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li title="برگشت"><a href="{{ route('articles.index') }}"><i class="fa fa-arrow-left"></i></a>
                    </li>
                </ul>
                
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <br/>
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    @if ($errors->any())
                        
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                
                              <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                              </ul>

                            </div>
                        </div>
                    </div>
                    @endif
                    
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="body">متن مقاله
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea type="text" id="body" required="required"
                            class="form-control col-md-7 col-xs-12" name="body" 
                             rows="7" placeholder="متن مقاله را وارد کنید...">{{ old('body') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="images">تصویر مقاله
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="file" name="images" id="images" required="required"
                                   class="form-control col-md-7 col-xs-12">
                                   
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">برچسب
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="tags_1" type="text" name="tags" class="tags form-control" value="{{ old('tags') }}" data-role="tagsinput"/>
                            <div id="suggestions-container"
                                 style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                    </div>                 

                    {{-- <div class="ln_solid"></div> --}}
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ route('articles.index') }}" class="btn btn-primary">انصراف</a>
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
<link rel="stylesheet" href="{{ asset('assets/admin/build/tagsinput/css/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/build/tagsinput/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/build/bootstrap-fileinput/css/fileinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/build/bootstrap-fileinput/css/fileinput-rtl.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/admin/build/tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/admin/build/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script>

    // CKEDITOR
    $(function () {
        CKEDITOR.replace('body')
        $('.textarea').wysihtml5()
    })

    // File input
    $("#file-3").fileinput({
        theme: 'fas',
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        initialPreview: [],
        initialPreviewConfig: []
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
    $(document).ready(function () {
        $("#test-upload").fileinput({
            'theme': 'fas',
            'showPreview': false,
            'allowedFileExtensions': ['png', 'jpeg', 'jpg', 'bmp', 'gif', 'svg', 'webp'],
            'elErrorContainer': '#errorBlock'
        });
        $("#kv-explorer").fileinput({
            'theme': 'explorer-fas',
            'uploadUrl': '#',
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [],
            initialPreviewConfig: []
        });
    });
</script>
@endpush