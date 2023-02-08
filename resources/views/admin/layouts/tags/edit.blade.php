@extends('admin.section.master')
@section('app')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>ویرایش برچسب
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li title="برگشت"><a href="{{ route('tags.index') }}"><i class="fa fa-arrow-left"></i></a>
                    </li>
                </ul>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <br/>
                <form action="{{ route('tags.update',$tag->slug) }}" method="POST"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                   @include('admin.layouts.messages.error')

                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام برچسب
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="name" id="name" value="{{ $tag->name }}"
                                   class="form-control col-md-7 col-xs-12" placeholder="نام برچسب را وارد کنید...">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ route('tags.index') }}" class="btn btn-primary">انصراف</a>
                            <button type="submit" class="btn btn-success">ارسال</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
