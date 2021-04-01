@extends('admin.section.master')
@section('app')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>همه کاربران</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li style="margin-right: 15px;" title="دسترسی کاربران"><a href="{{ route('permissions.index') }}"><i class="fa fa-shield"></i></a></li>
                {{-- <li title="نقش کاربران"><a href="{{ route('roles.index') }}"><i class="fa fa-star-half-o"></i></a></li> --}}
                <li><a href="{{ route('levelManagement.index') }}"><i class="fa fa-signal"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>نام کاربر</th>
                    <th>ایمیل</th>
                    <th>نوع حساب کاربری</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>

                <tbody>
                    
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->level }}</td>
                        <td>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection