@extends('admin.section.master')
@section('app')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>ویرایش سوال
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li title="برگشت"><a href="{{ route('faqs.index') }}"><i class="fa fa-arrow-left"></i></a>
                    </li>
                </ul>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <br/>
                <form action="{{ route('faqs.update',$faq->slug) }}" method="POST"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                   @include('admin.layouts.messages.error')

                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">سوال
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="question" cols="3" rows="3"
                                      placeholder="عنوان سوال را وارد کنید." style="resize: none"
                            >{{ $faq->question }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="content">پاسخ
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

                                <textarea id="descr" name="answer" class="editor-wrapper" style="width: 719px; height: 272px;resize:none"
                                >{{ $faq->answer }}</textarea>

                                <br/>

                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ route('faqs.index') }}" class="btn btn-primary">انصراف</a>
                            <button type="submit" class="btn btn-success">ارسال</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
