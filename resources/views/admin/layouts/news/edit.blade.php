@extends('admin.section.master')
@section('app')
    <div class="row">
        <div class="x_title">
            <h2>ویرایش خبر
            </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li title="برگشت">
                    <a class="btn btn-sm" href="{{ route('news.index') }}">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </li>
            </ul>

            <div class="clearfix"></div>
        </div>
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data" id="form-master">
            @csrf
            @method('PUT')
            <div>
                @if ($errors->any())
                    <ul>
                    @foreach ($errors->all() as $item)
                        <li>
                            {{ $item }}
                        </li>    
                    @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br />
                        <div id="demo-form1" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">عنوان</label>
                                        <input type="text" name="title" id="title"
                                            value="{{ old('title', optional($news ?? null)->title) }}" class="form-control"
                                            placeholder="عنوان">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">خلاصه مطلب</label>
                                        <textarea cols="6" rows="6" name="description" id="description"class="form-control"
                                         placeholder="خلاصه مطلب" style="resize: none">{{ old('description', optional($news ?? null)->description) }} </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label for="content">متن کامل خبر</label>
                                <textarea name="content" id="content">{!! $news->content !!}</textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label for="category_id">دسته بندی</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $news->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tags">برچسب ها</label>
                                <input type="text" name="tags" id="tags"
                                    value="{{ old('tags', optional($news ?? null)->tags) }}" class="form-control"
                                    placeholder="برچسب های خبر">
                            </div>

                            <div class="form-group">
                                <label for="status">وضعیت انتشار</label>
                                <select class="form-control" name="status" id="status">
                                    <option value=""></option>
                                    <option {{ $news->status == 'active' ? 'selected' : '' }} value="active">منتشر شود</option>
                                    <option {{ $news->status == 'inactive' ? 'selected' : '' }} value="inactive">منتشر نشود</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="source_address">آدرس منبع</label>
                                <input type="text" name="source_address" id="source_address"
                                    value="{{ old('source_address', optional($news ?? null)->source_address) }}"
                                    class="form-control" placeholder="آدرس منبع">
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="picture">تصویر اصلی</label>
                                <input type="file" name="picture" id="picture"
                                    value="{{ old('picture', optional($news ?? null)->picture) }}" class="form-control">

                                    <img class="mt-2" src="{{ asset('storage/'. $news->picture) }}" width="80" height="80">
                            </div>

                            <hr>

                            <div style="display: flex;margin: 1rem 0">
                                <h6 style="font-weight: bold; font-size: 14px">چند رسانه ای</h6>
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                    data-target="#fileModal">
                                    <i class="fa fa-file"></i>
                                </button>
                                <div class="modal fade" id="fileModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">افزودن فایل</h5>
                                            </div>
                                            <div class="modal-body">
                                                <input type="file" name="file[]" id="" multiple>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">ثبت</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                    data-target="#voiceModal">
                                    <i class="fa fa-music"></i>
                                </button>
                                <div class="modal fade" id="voiceModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">افزودن صدا</h5>
                                            </div>
                                            <div class="modal-body">
                                                <input type="file" name="voice[]" id="" multiple>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">ثبت</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                    data-target="#videoModal">
                                    <i class="fa fa-film"></i>
                                </button>
                                <div class="modal fade" id="videoModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">افزودن ویدیو</h5>
                                            </div>
                                            <div class="modal-body" id="modal-video">
                                                <input type="file" name="video[]" id="" multiple>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">ثبت</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                    data-target="#imageModal">
                                    <i class="fa fa-camera"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="imageModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">افزودن تصویر</h5>
                                            </div>
                                            <div class="modal-body">
                                                <input type="file" name="image[]" id="" multiple>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">ثبت</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <hr>
                            <section>
                                <div class="form-check">
                                    <input class="form-check-input" name="main_news" type="checkbox"
                                        id="mainItem" {{ $news->main_news == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="mainItem">
                                        انتخاب به عنوان آیتم اصلی خبر
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" name="headline_news" type="checkbox"
                                        id="firstItem" {{ $news->headline_news == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="firstItem">
                                        انتخاب به عنوان تیتر روز خبر                                
                                    </label>
                                </div>

                            </section>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="x_panel" style="display: flex; justify-content: space-around">
                    <a href="{{ route('news.index') }}" class="btn btn-info">انصراف</a>

                    <button class="btn btn-success"
                        onclick="document.getElementById('form-master').submit()">ذخیره</button>
                </div>
            </div>

        </form>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor/lang/fa.js') }}"></script>
    <script src="{{ asset('bin/js/helpers/addelements.js') }}"></script>

    <script>
        CKEDITOR.replace('content', {
            language: 'fa',
            removeButtons: 'PasteFromWord'
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#file-upload-demo").fileinput({
                'theme': 'explorer',
                'uploadUrl': '#',
                overwriteInitial: false,
                initialPreviewAsData: true,
                initialPreview: [],
                initialPreviewConfig: []
            });
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box' style='width: 160px;padding: 0 10px;margin-bottom: 12px'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload__img-close'><i class='fa fa-close'></i></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>

<script>
    $("#mainItem").on('change', function() {
        if ($(this).is(':checked')) {
            $("#mainItem").attr('value', 'true');
            $("#mainItem").prop("checked", true);

            $("#firstItem").attr('disabled', 'disabled');
        } else {
            $("#mainItem").removeAttr('value');
            $("#mainItem").prop("checked", false);

            $("#firstItem").removeAttr('disabled');
        }
    });

    $("#firstItem").on('change', function() {
        if ($(this).is(':checked')) {
            $("#firstItem").attr('value', 'true');
            $("#firstItem").prop("checked", 1);

            $("#mainItem").attr('disabled', 'disabled');
        } else {
            $("#firstItem").removeAttr('value');
            $("#firstItem").prop("checked", 0);

            $("#mainItem").removeAttr('disabled');
        }
    });    
</script>
@endpush

@push('styles')
    <style>
        .upload {
            &__box {
                padding: 40px;
            }

            &__inputfile {
                width: .1px;
                height: .1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }

            &__btn {
                display: inline-block;
                font-weight: 600;
                color: #fff;
                text-align: center;
                min-width: 116px;
                padding: 5px;
                transition: all .3s ease;
                cursor: pointer;
                border: 2px solid;
                background-color: #4045ba;
                border-color: #4045ba;
                border-radius: 10px;
                line-height: 26px;
                font-size: 14px;

                &:hover {
                    background-color: unset;
                    color: #4045ba;
                    transition: all .3s ease;
                }

                &-box {
                    margin-bottom: 10px;
                }
            }

            &__img {
                &-wrap {
                    display: flex;
                    flex-wrap: wrap;
                    margin: 0 -10px;
                }

                &-box {
                    width: 200px;
                    padding: 0 10px;
                    margin-bottom: 12px;
                }

                &-close {
                    width: 24px;
                    height: 24px;
                    border-radius: 50%;
                    background-color: rgba(0, 0, 0, 0.5);
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    text-align: center;
                    line-height: 24px;
                    z-index: 1;
                    cursor: pointer;

                    &:after {
                        content: '\2716';
                        font-size: 14px;
                        color: white;
                    }
                }
            }
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }

        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
            color: white;
        }
    </style>
@endpush
