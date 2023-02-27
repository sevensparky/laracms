@extends('admin.section.master')
@section('app')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>افزودن برچسب</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li title="برگشت"><a href="{{ route('news.check.items') }}"><i class="fa fa-arrow-left"></i></a>
                        </li>
                    </ul>

                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <br />
                    <form action="{{ route('tags.store') }}" method="POST" id="demo-form2" data-parsley-validate
                        class="form-horizontal form-label-left">

                        @include('admin.layouts.messages.error')

                        @csrf
                        <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام برچسب
                                <span class="required">*</span>
                            </label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="vodiapicker">
                                    <option value="en" class="test" data-thumbnail="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/LetterA.svg/2000px-LetterA.svg.png">English</option>
                                    <option value="au" data-thumbnail="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/NYCS-bull-trans-B.svg/480px-NYCS-bull-trans-B.svg.png">Engllish (AU)</option>
                                    <option value="uk" data-thumbnail="https://glot.io/static/img/c.svg?etag=ZaoLBh_p">Chinese (Simplified)</option>
                                    <option value="cn" data-thumbnail="https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/NYCS-bull-trans-D.svg/2000px-NYCS-bull-trans-D.svg.png">German</option>
                                    <option value="de" data-thumbnail="https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/MO-supp-E.svg/600px-MO-supp-E.svg.png">Danish</option>
                                    <option value="dk" data-thumbnail="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/F_icon.svg/267px-F_icon.svg.png">French</option>
                                    <option value="fr" data-thumbnail="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2000px-Google_%22G%22_Logo.svg.png">Greek</option>
                                    <option value="gr" data-thumbnail="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/4H_Emblem.svg/1000px-4H_Emblem.svg.png">Italian</option>
                              </select>
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

@push('scripts')
    <script>
        //test for getting url value from attr
        // var img1 = $('.test').attr("data-thumbnail");
        // console.log(img1);

        //test for iterating over child elements
        var langArray = [];
        $('.vodiapicker option').each(function() {
            var img = $(this).attr("data-thumbnail");
            var text = this.innerText;
            var value = $(this).val();
            var item = '<li><img src="' + img + '" alt="" value="' + value + '"/><span>' + text + '</span></li>';
            langArray.push(item);
        })

        $('#a').html(langArray);

        //Set the button value to the first el of the array
        $('.btn-select').html(langArray[0]);
        $('.btn-select').attr('value', 'en');

        //change button stuff on click
        $('#a li').click(function() {
            var img = $(this).find('img').attr("src");
            var value = $(this).find('img').attr('value');
            var text = this.innerText;
            var item = '<li><img src="' + img + '" alt="" /><span>' + text + '</span></li>';
            $('.btn-select').html(item);
            $('.btn-select').attr('value', value);
            $(".b").toggle();
            //console.log(value);
        });

        $(".btn-select").click(function() {
            $(".b").toggle();
        });

        //check local storage for the lang
        var sessionLang = localStorage.getItem('lang');
        if (sessionLang) {
            //find an item with value of sessionLang
            var langIndex = langArray.indexOf(sessionLang);
            $('.btn-select').html(langArray[langIndex]);
            $('.btn-select').attr('value', sessionLang);
        } else {
            var langIndex = langArray.indexOf('ch');
            console.log(langIndex);
            $('.btn-select').html(langArray[langIndex]);
            //$('.btn-select').attr('value', 'en');
        }
    </script>
@endpush

@push('styles')
<style>
    .vodiapicker {
        /* display: none; */
    }

    #a {
        padding-left: 0px;
    }

    #a img,
    .btn-select img {
        width: 12px;

    }

    #a li {
        list-style: none;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    #a li:hover {
        background-color: #F4F3F3;
    }

    #a li img {
        margin: 5px;
    }

    #a li span,
    .btn-select li span {
        margin-left: 30px;
    }

    /* item list */

    .b {
        display: none;
        width: 100%;
        max-width: 350px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 5px;

    }

    .open {
        display: show !important;
    }

    .btn-select {
        margin-top: 10px;
        width: 100%;
        max-width: 350px;
        height: 34px;
        border-radius: 5px;
        background-color: #fff;
        border: 1px solid #ccc;

    }

    .btn-select li {
        list-style: none;
        float: left;
        padding-bottom: 0px;
    }

    .btn-select:hover li {
        margin-left: 0px;
    }

    .btn-select:hover {
        background-color: #F4F3F3;
        border: 1px solid transparent;
        box-shadow: inset 0 0px 0px 1px #ccc;


    }

    .btn-select:focus {
        outline: none;
    }

    .lang-select {
        margin-left: 50px;
    }
</style>
@endpush


