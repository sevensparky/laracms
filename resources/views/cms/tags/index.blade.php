@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-start">
    <a href="{{ route('tags.create') }}" class="btn btn-primary mb-2">افزودن برچسب</a>
</div>

@include('cms.alerts.alert')


<div class="card card-default">
    <div class="card-header text-right">
       برچسب ها (تگ ها)
    </div>

<div class="card card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>تنظیمات</th>
                <th class="text-center">تاریخ ایجاد</th>
                <th class="text-center">نام برچسب</th>
                <th>#</th>
            </tr>
        </thead>
        
        @if ($tags->count() > 0)
        <tbody>
            @foreach ($tags as $tag)
            <tr>
                <td>
                    <form action="{{ route('tags.destroy',$tag->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('tags.edit',$tag->slug) }}" class="btn btn-warning btn-sm">ویرایش</a>

                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>

                    </form>
                </td>
                <td class="text-center" >{{ \Carbon\Carbon::parse($tag->created_at)->diffForHumans() }}</td>
                <td class="text-center">{{ $tag->name }}</td>
                <td>{{ $tag->id }}</td>
            </tr>
            @endforeach
        </tbody>
        @else
        <tbody>
            <tr>
                <td colspan="4">
                    <p class="text-center">!تگی ایجاد نشده</p>
                </td>
            </tr>
        </tbody>
        @endif

    </table>
</div>
  
    
</div>
@endsection
