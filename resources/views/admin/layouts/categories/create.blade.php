@extends('admin.section.master')
@section('app')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>افزودن دسته
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li title="برگشت"><a href="{{ route('categories.index') }}"><i class="fa fa-arrow-left"></i></a>
                    </li>
                </ul>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <br/>
                <form action="{{ route('categories.store') }}" method="POST"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                  @include('admin.layouts.messages.error')

                    @csrf
                    {{-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام دسته
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="name[]" id="name" value="{{ old('name') }}"
                                   class="form-control col-md-7 col-xs-12" placeholder="نام دسته را وارد کنید...">
                        </div>
                    </div> --}}


                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>

                                <button type="button" onclick="addElements('title')">
                                    Click me
                                    </button>
                            </div>
                            <div class="modal-body" id="modal-body">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>





                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ route('categories.index') }}" class="btn btn-primary">انصراف</a>
                            <button type="submit" class="btn btn-success">ارسال</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
    Launch demo modal
  </button>

  <!-- Modal -->

@endsection


@push('scripts')
<script>
    var counter = 1; //limits amount of transactions
function addElements(param) {
    if (counter < 5){
        let div = `<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="${param}">نام دسته
        <span class="required">*</span>
    </label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="${param}[]" id="${param}" value="{{ old('${param}') }}"
                class="form-control col-md-7 col-xs-12" placeholder="نام دسته را وارد کنید...">
    </div>
</div> <br><br>`;
        $('#modal-body').append(div)

    }

    counter++
    if (counter >= 6) {
        alert("امکان ایجاد فیلد بیشتر امکان پذیر نمی باشد")
    }
}

</script>
@endpush
