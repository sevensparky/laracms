@extends('admin.section.master')
@section('app')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                    <li title="برگشت"><a href="{{ route('profile') }}"><i class="fa fa-arrow-left"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                        {{-- <img src="{{ $user->image != null ? asset('images/'. $user->image) : $user->image != null ? asset('images/'. $user->image) : asset('images/user.png') }}" height="128" width="128" /> --}}
                    </div>
                </div>

                <form action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data">
                    @include('admin.layouts.messages.error')
                    @csrf
                    @method('PUT')

                    <div class="col-md-8 col-sm-8 col-xs-12" style="border:0px solid #e5e5e5;">
                        <label for="name" class="prod_title">نام کاربری</label>
                        <section class="form-group">
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', optional($user ?? null)->name) }}">
                        </section>
    
                        <label for="name" class="prod_title">تصویر پروفایل</label>
                        <div class="form-group">
    
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <span class="btn btn-primary btn-file">
                                    انتخاب تصویر
                                    <input type="file" name="image" id="file" onchange="readURL(this);"
                                        class="form-control col-md-7 col-xs-12 custom-file-input">
                                </span>
                            </div>
    
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <img src="" id="image" alt="تصویر پروفایل" width="180" height="180">
                            </div>
                        </div>
    
                    </div>
                    <button type="submit" class="btn btn-info d-flex jus mt-5" style="float: left;">{{ __('submit') }}</button>
                </form>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
