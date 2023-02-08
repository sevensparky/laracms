@extends('admin.section.master')
@section('app')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>همه خبر ها</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{ route('news.create') }}"><i class="fa fa-plus"></i></a>
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
                    <th>سرویس ها</th>
                    <th>نوع</th>
                    <th>نوع تولید</th>
                    <th>ایجاد توسط</th>
                    {{-- <th>آخرین ویرایش</th> --}}
                    <th>تاریخ ایجاد</th>
                    <th>تاریخ انتشار</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>

                <tbody>

                    @foreach ($news as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        {{-- <td>{{ $item->image }}</td> --}}
                        <td></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->service }}</td>
                        <td>{{ $item->news_type }}</td>
                        <td>{{ $item->news_production_type }}</td>
                        {{-- <td>{{ $item-> }}</td> --}}
                        <td></td>
                        {{-- <td>{{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</td> --}}
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                        <td>{{ $item->published_at }}</td>
                        <td>
                            <form action="{{ route('news.destroy',$item->id) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <a href="{{ route('news.edit',$item->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $news->links() }}
        </div>
    </div>
</div>

@endsection
