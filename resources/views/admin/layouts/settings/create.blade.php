@extends('admin.section.master')
@section('app')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>تنظیمات سایت</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li title="برگشت">
                            <a href="{{ route('settings.index') }}"><i class="fa fa-arrow-left"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <br />
                    <form action="{{ route('settings.store') }}" method="POST" id="demo-form2" data-parsley-validate
                        class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @include('admin.layouts.messages.error')
                        @csrf
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">عنوان سایت
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', optional($settings ?? null)->title) }}"
                                    class="form-control col-md-7 col-xs-12" placeholder="عنوان سایت را وارد کنید...">

                                @error('title')
                                    <small class="text-error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                توضیحات مختصر
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="short_description" id="short_description" class="form-control col-md-7 col-xs-12" cols="3" rows="3"
                                    style="resize: none" placeholder="توضیحات مختصر سایت را وارد کنید...">{{ old('short_description', optional($settings ?? null)->short_description) }}</textarea>
                                <small>
                                    قرار گیری در پایین صفحه (فوتر سایت)
                                </small>
                                @error('short_description')
                                    <small class="text-error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">
                                لوگو سایت
                            </label>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <span class="btn btn-primary btn-file">
                                    انتخاب تصویر
                                    <input type="file" name="logo" id="file" onchange="readURL(this);"
                                        class="form-control col-md-7 col-xs-12 custom-file-input">
                                </span>

                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <img src="" id="logo" alt="تصویر لوگو" width="180" height="180">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                تلفن
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" name="tel" id="tel"
                                    value="{{ old('tel', optional($settings ?? null)->tel) }}"
                                    placeholder="شماره تلفنی را وارد کنید...">

                                @error('tel')
                                    <small class="text-error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">متن کپی رایت
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="copyright" id="copyright" class="form-control col-md-7 col-xs-12" cols="2" rows="2"
                                    style="resize: none" placeholder="متن کپی رایت را وارد کنید...">{{ old('copyright', optional($settings ?? null)->copyright) }}</textarea>

                                @error('copyright')
                                    <small class="text-error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">درباره سایت
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="content" id="content" class="form-control col-md-7 col-xs-12" cols="2" rows="2"
                                    style="resize: none">{{ old('content', optional($settings ?? null)->content) }}</textarea>

                                @error('content')
                                    <small class="text-error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{ route('settings.index') }}" class="btn btn-primary">انصراف</a>
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor/lang/fa.js') }}"></script>

    <script>
        CKEDITOR.replace('content', {
            language: 'fa',
            removeButtons: 'PasteFromWord'
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#logo')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
