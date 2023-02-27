@extends('admin.section.master')
@section('app')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>تصاویر</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a href="{{ route('images.create') }}"><i class="fa fa-plus"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>تصویر</th>
                    <th>عنوان</th>
                    <th>دسته بندی</th>
                    <th>ایجاد توسط</th>
                    <th>وضعیت</th>
                    <th>تاریخ ایجاد</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>

                <tbody>

                    @foreach ($images as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <img src="{{ asset('storage/'. $item->picture) }}" width="80" height="80">
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>
                            {{ $item->category->name }}
                        </td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            @if ($item->status == 'inactive')
                                <span class="badge bage-pill badge-danger">
                                    غیر فعال
                                </span>
                            @else
                                <span class="badge bage-pill badge-success">
                                    فعال
                                </span>
                            @endif
                        </td>
                        <td>
                            {{ definedDateFormat($item->created_at) }}
                        <td>
                            <a href="{{ route('news.edit',$item->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-danger" onclick="document.getElementById('deleteNews').submit()"><i class="fa fa-trash"></i></button>
                           
                            <form action="{{ route('news.destroy',$item->id) }}" method="POST" id="deleteNews" style="display: none">
                                @method("DELETE")
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            {{-- {{ $news->links() }} --}}
        </div>
    </div>
</div>

@endsection
