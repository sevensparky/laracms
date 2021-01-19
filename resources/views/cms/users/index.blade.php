@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-start"></div>

@include('cms.alerts.alert')


<div class="card card-default">
    <div class="card-header text-right">
       کاربران
    </div>

<div class="card card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>تنظیمات</th>
                <th class="text-center">تاریخ ثبت نام</th>
                <th class="text-center">نقش</th>
                <th class="text-center">ایمیل</th>
                <th class="text-center">نام</th>
                <th>#</th>
            </tr>
        </thead>
       
        @if ($users->count() > 0)
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>

                    <form action="{{ route('users.changeRole',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-primary btn-sm">تغییر به ادمین</button>
                    </form>
                </td>

                <td class="text-center" >{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                <td class="text-center" >{{ $user->role == 'admin' ? 'ادمین' : 'نویسنده' }}</td>
                <td class="text-center">{{ $user->email }}</td>
                <td class="text-center">{{ $user->name }}</td>
                <td>{{ $user->id }}</td>
            </tr>   
            @endforeach
        </tbody>
        @else
        <tbody>
            <tr>
                <td colspan="4">
                    <p class="text-center">!دسته ای ایجاد نشده</p>
                </td>
            </tr>
        </tbody>
        @endif


    </table>
</div>
  
    
</div>
@endsection
