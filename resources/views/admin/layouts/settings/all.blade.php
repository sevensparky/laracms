@extends('admin.section.master')
@section('app')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>تنظیمات سایت</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    {{-- @dd($rowCount > ) --}}
                    @if ($rowCount > 0)
                    @else 
                    <a href="{{ route('settings.create') }}">
                        <i class="fa fa-plus"></i>
                    </a>
                    @endif
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th>عنوان</th>
                    <th>لوگو</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>

                <tbody>
                    @if ($rowCount > 0)
                    <tr>
                        <td>یک مورد اضافه شده</td>
                        <td><img src="{{ asset('storage/'. $settings->logo) }}" width="120" height="80"></td>
                        <td>
                            <a href="{{ route('settings.edit') }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="3">موردی یافت نشد</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
