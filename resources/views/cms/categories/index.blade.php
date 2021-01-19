@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-start">
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">افزودن دسته بندی</a>
</div>

@include('cms.alerts.alert')


<div class="card card-default">
    <div class="card-header text-right">
       دسته بندی ها
    </div>

<div class="card card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>تنظیمات</th>
                <th class="text-center">تاریخ ایجاد</th>
                <th class="text-center">نام دسته</th>
                <th>#</th>
            </tr>
        </thead>
       
        @if ($categories->count() > 0)
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>
                    <form action="{{ route('categories.destroy',$category->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('categories.edit',$category->slug) }}" class="btn btn-warning btn-sm">ویرایش</a>

                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>

                    </form>
                </td>
                <td class="text-center" >{{ \Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                <td class="text-center">{{ $category->name }}</td>
                <td>{{ $category->id }}</td>
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
