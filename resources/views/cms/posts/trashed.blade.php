@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-start">
    {{-- <a href="{{ route('trashed.create') }}" class="btn btn-primary mb-2">افزودن پست</a> --}}
</div>

@include('cms.alerts.alert')


<div class="card card-default">
    <div class="card-header text-right">
       پست های حذف شده
    </div>

<div class="card card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>تنظیمات</th>
                <th class="text-center">تاریخ ایجاد</th>
                <th class="text-center">نام دسته</th>
                <th class="text-center">نام پست</th>
                <th class="text-center">تصویر پست</th>
                <th>#</th>
            </tr>
        </thead>

        @if ($trashed->count() > 0)
        
        <tbody>

            @foreach ($trashed as $post)
        
            <tr>
                <td>
                    <form action="{{ route('posts.restore-post',$post->slug) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">بازگرداندن</button>
                    </form>

                    <form action="{{ route('force-delete.post',$post->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
                <td class="text-center" >{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                <td class="text-center">{{ $post->categoryName }}</td>
                <td class="text-center">{{ Str::limit($post->title,30) }}</td>
                <td class="text-center"><img src="{{ asset('upload/posts/'.$post->image) }}" width="60" height="60"></td>
                <td>{{ $post->id }}</td>
            </tr>
   
            @endforeach
        </tbody>

        @else
            
        <tbody>
            
            <tr>
                <td colspan="6">
                    <p class="text-center">!پستی ایجاد نشده</p>
                </td>
            </tr>

        </tbody>

        @endif

    </table>
</div>
  
    
</div>
@endsection
