@extends('admin.section.master')
@section('app')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>شبکه های اجتماعی</h2>

            @if(count($social) > 0)
            @else
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="{{ route('social.create') }}"><i class="fa fa-plus"></i></a>
                    </li>
                </ul>
            @endif
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th>وضعیت</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($social as $item)
                    <tr>
                        <td>آیتمی اضافه شده.</td>
                        <td>
                            <a href="{{ route('social.edit') }}" class="btn btn-warning"
                            ><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
