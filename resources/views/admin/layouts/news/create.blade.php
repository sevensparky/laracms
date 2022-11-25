@extends('admin.section.master')
@section('app')
    <div class="row">
        <div class="x_title">
            <h2>افزودن خبر
            </h2>
            <ul class="nav navbar-right panel_toolbox">
                <button type="submit" class="btn btn-success"
                    onclick="document.getElementById('form-master').submit()">ذخیره</button>
                <li title="برگشت"><a class="btn btn-sm" href="{{ route('news.index') }}"><i class="fa fa-arrow-left"></i></a>
                </li>
            </ul>

            <div class="clearfix"></div>
        </div>
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" id="form-master">
            @csrf
            <div class="col-md-8 col-sm-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br />
                        <div id="demo-form1" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="headline" id="headline" value="{{ old('headline') }}"
                                            class="form-control" placeholder="روتیتر">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                                            class="form-control" placeholder="عنوان">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="service" id="service">
                                            <option value="" selected>انتخاب سرویس</option>
                                            <option value="دسته بندی نشده">دسته بندی نشده</option>
                                            <option value="استان‌ها">استان‌ها</option>
                                            <option value="اصفهان"> اصفهان</option>
                                            <option value="انتخابات">انتخابات</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="external_link" id="external_link"
                                            value="{{ old('external_link') }}" class="form-control"
                                            placeholder="لینک خارجی خبر">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="tags" id="tags" value="{{ old('tag') }}"
                                            class="form-control" placeholder="برچسب های خبر">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea cols="6" rows="6" name="description" id="description" value="{{ old('description') }}"
                                            class="form-control" placeholder="خلاصه مطلب" style="resize: none"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- <h6>متن کامل خبر</h6> --}}
                                <textarea name="content" id="content"></textarea>
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
                                <select class="form-control" name="news_type" id="news_type">
                                    <option value="" selected>انتخاب نوع خبر</option>
                                    <option value="خبر">خبر</option>
                                    <option value="مقاله">مقاله</option>
                                    <option value="یادداشت">یادداشت</option>
                                    <option value="گفتگو و گزارش">گفتگو و گزارش</option>
                                    <option value="طنز">طنز</option>
                                    <option value="کاریکاتور">کاریکاتور</option>
                                    <option value="گالری">گالری</option>
                                    <option value="فیلم">فیلم</option>
                                    <option value="صوت">صوت</option>
                                    <option value="آدرس اینترنتی">آدرس اینترنتی</option>
                                    <option value="نمودار">نمودار</option>
                                    <option value="داده نمایی">داده نمایی</option>
                                    <option value="سرخط خبرها">سرخط خبرها</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="news_production_type" id="news_production_type">
                                    <option value="" selected>انتخاب نوع تولید خبر</option>
                                    <option value="خبر (تولیدی)">خبر (تولیدی)</option>
                                    <option value="پوششی">پوششی</option>
                                    <option value="گفتگو">گفتگو</option>
                                    <option value="گزارش">گزارش</option>
                                    <option value="گفتگوی بلند">گفتگوی بلند</option>
                                    <option value="ترجمه">ترجمه</option>
                                    <option value="فکس">فکس</option>
                                </select>
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




                            <div class="form-group">
                                <select class="form-control" name="news_source" id="news_source">
                                    <option value="" selected>انتخاب منبع</option>
                                    <option value="ایرنا">ایرنا</option>
                                    <option value="تسنیم">تسنیم</option>
                                    <option value="فارس">فارس</option>
                                    <option value="باشگاه خبرنگاران جوان">باشگاه خبرنگاران جوان</option>
                                    <option value="مهر">مهر</option>
                                    <option value="ايسنا">ايسنا</option>
                                    <option value="خبرگزاری دانشجو">خبرگزاری دانشجو</option>
                                    <option value="جهان">جهان</option>
                                    <option value="واحد مرکزی خبر">واحد مرکزی خبر</option>
                                    <option value="العالم">العالم</option>
                                    <option value="برنا">برنا</option>
                                    <option value="ایلنا">ایلنا</option>
                                    <option value="سلامت">سلامت</option>
                                    <option value="تابناک">تابناک</option>
                                    <option value="عصر ایران">عصر ایران</option>
                                    <option value="دانا">دانا</option>
                                    <option value="فردا">فردا</option>
                                    <option value="خبر آنلاین">خبر آنلاین</option>
                                    <option value="جوان آنلاین">جوان آنلاین</option>
                                    <option value="جام نیوز">جام نیوز</option>
                                    <option value="خانه ملت">خانه ملت</option>
                                    <option value="اقتصادپرس">اقتصادپرس</option>
                                    <option value="اقتصاد نیوز">اقتصاد نیوز</option>
                                    <option value="اقتصاد آنلاین">اقتصاد آنلاین</option>
                                    <option value="مشرق">مشرق</option>
                                    <option value="رجانیوز">رجانیوز</option>
                                    <option value="صراط نيوز">صراط نيوز</option>
                                    <option value="نسيم آنلاين">نسيم آنلاين</option>
                                    <option value="پارسینه">پارسینه</option>
                                    <option value="ایران">ایران</option>
                                    <option value="همشهری">همشهری</option>
                                    <option value="جام جم">جام جم</option>
                                    <option value="کیهان">کیهان</option>
                                    <option value="خراسان">خراسان</option>
                                    <option value="دنیای اقتصاد">دنیای اقتصاد</option>
                                    <option value="وطن امروز">وطن امروز</option>
                                    <option value="اطلاعات">اطلاعات</option>
                                    <option value="رسالت">رسالت</option>
                                    <option value="ورزش3">ورزش3</option>
                                    <option value="روزنامه نود">روزنامه نود</option>
                                    <option value="وبسایت نود">وبسایت نود</option>
                                    <option value="ابرار ورزشی">ابرار ورزشی</option>
                                    <option value="همشهری ورزشی">همشهری ورزشی</option>
                                    <option value="رادنیوز">رادنیوز</option>
                                    <option value="نامه نیوز">نامه نیوز</option>
                                    <option value="ورزش 11">ورزش 11</option>
                                    <option value="فيفا">فيفا</option>
                                    <option value="باشگاه استقلال تهران">باشگاه استقلال تهران</option>
                                    <option value="باشگاه پرسپولیس تهران">باشگاه پرسپولیس تهران</option>
                                    <option value="سازمان تربيت بدني">سازمان تربيت بدني</option>
                                    <option value="خبرگزاری ورزش ایران">خبرگزاری ورزش ایران</option>
                                    <option value="ایران ورزشی">ایران ورزشی</option>
                                    <option value="خبر ورزشی">خبر ورزشی</option>
                                    <option value="شبکه ورزش ایران">شبکه ورزش ایران</option>
                                    <option value="گل">گل</option>
                                    <option value="هنر نيوز">هنر نيوز</option>
                                    <option value="هنر آنلاين">هنر آنلاين</option>
                                    <option value="پیشخوان">پیشخوان</option>
                                    <option value="سینما ژورنال">سینما ژورنال</option>
                                    <option value="سینماپرس">سینماپرس</option>
                                    <option value="خبرگزاری سينما">خبرگزاری سينما</option>
                                    <option value="برهان">برهان</option>
                                    <option value="شرق">شرق</option>
                                    <option value="شهروند">شهروند</option>
                                    <option value="اشراف">اشراف</option>
                                    <option value="اسلام کوئست">اسلام کوئست</option>
                                    <option value="پایگاه اطلاع رسانی دفتر مقام معظم رهبری">پایگاه اطلاع رسانی دفتر مقام
                                        معظم رهبری</option>
                                    <option value="پایگاه اطلاع رسانی ریاست جمهوری">پایگاه اطلاع رسانی ریاست جمهوری
                                    </option>
                                    <option value="پایگاه اطلاع رسانی دولت">پایگاه اطلاع رسانی دولت</option>
                                    <option value="فرهنگ نیوز">فرهنگ نیوز</option>
                                    <option value="خبرگزاری دفاع مقدس">خبرگزاری دفاع مقدس</option>
                                    <option value="خبرگزاری بسیج">خبرگزاری بسیج</option>
                                    <option value="دیده بان">دیده بان</option>
                                    <option value="مرکزاسناد انقلاب اسلامی">مرکزاسناد انقلاب اسلامی</option>
                                    <option value="مسیر آنلاین">مسیر آنلاین</option>
                                    <option value="رجویسم">رجویسم</option>
                                    <option value="امپراتوری دروغ">امپراتوری دروغ</option>
                                    <option value="دیدبان">دیدبان</option>
                                    <option value="کاپ">کاپ</option>
                                    <option value="ابنا">ابنا</option>
                                    <option value="میزان">میزان</option>
                                    <option value="بانک ورزش">بانک ورزش</option>
                                    <option value="گرداب">گرداب</option>
                                    <option value="عقیق">عقیق</option>
                                    <option value="خبرگزاری صدا و سیما">خبرگزاری صدا و سیما</option>
                                    <option value="طرفداری">طرفداری</option>
                                    <option value="دیپلماسی ایرانی">دیپلماسی ایرانی</option>
                                    <option value="ایران هسته ای">ایران هسته ای</option>
                                    <option value="صبحانه آنلاین">صبحانه آنلاین</option>
                                    <option value="تبیان">تبیان</option>
                                    <option value="نماینده">نماینده</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" name="news_source_address" id="news_source_address"
                                    value="{{ old('tag') }}" class="form-control" placeholder="آدرس منبع">
                            </div>

                            <select class="form-control" name="message_end_news" id="message_end_news">
                                <option value="" selected>پیام انتهای خبر</option>
                                <option value="انتهای پیام/">انتهای پیام/</option>
                                <option value="خبر در حال تکمیل می باشد...">خبر در حال تکمیل می باشد...</option>
                                <option value="پایان رپرتاژ آگهی">پایان رپرتاژ آگهی</option>
                            </select>
                            <hr>
                            <div style="display: flex">
                                <h6 style="font-weight: bold; font-size: 14px">تولیدکنندگان</h6>
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                    data-target="#company">
                                    <i class="fa fa-building"></i>
                                </button>
                                <div class="modal fade" id="company" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">شرکت</h5>

                                                <button type="button" class="btn btn-sm"
                                                    style="float: left;margin-bottom: -6px;"
                                                    onclick="addCompanies('company', 'modal-company', 'نام شرکت')">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="modal-company">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">ثبت</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                    data-target="#author">
                                    <i class="fa fa-user"></i>
                                </button>
                                <div class="modal fade" id="author" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">مولف</h5>
                                                <button type="button" class="btn btn-sm"
                                                    style="float: left;margin-bottom: -6px;"
                                                    onclick="addAuthors('author', 'modal-author', 'نام مولف')">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="modal-author">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">ثبت</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                    data-target="#journalist">
                                    <i class="fa fa-newspaper-o"></i>
                                </button>
                                <div class="modal fade" id="journalist" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">خبرنگار</h5>

                                                <button type="button" class="btn btn-sm"
                                                    style="float: left;margin-bottom: -6px;"
                                                    onclick="addJournalists('journalist','modal-journalist', 'نام خبرنگار')">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="modal-journalist">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">ثبت</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                    data-target="#photographer">
                                    <i class="fa fa-camera"></i>
                                </button>
                                <div class="modal fade" id="photographer" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">عکاس</h5>

                                                <button type="button" class="btn btn-sm"
                                                    style="float: left;margin-bottom: -6px;"
                                                    onclick="addPhotographers('photographer', 'modal-photographer', 'نام عکاس')">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="modal-photographer">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">ثبت</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                    data-target="#translator">
                                    <i class="fa fa-text-width"></i>
                                </button>
                                <div class="modal fade" id="translator" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">مترجم</h5>

                                                <button type="button" class="btn btn-sm"
                                                    style="float: left;margin-bottom: -6px;"
                                                    onclick="addTranslators('translator', 'modal-translator', 'نام مترجم')">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="modal-translator">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">ثبت</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                    data-target="#writer">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <div class="modal fade" id="writer" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">دبیر</h5>

                                                <button type="button" class="btn btn-sm"
                                                    style="float: left;margin-bottom: -6px;"
                                                    onclick="addWriters('writer', 'modal-writer', 'نام دبیر')">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="modal-writer">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">ثبت</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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
