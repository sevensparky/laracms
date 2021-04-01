@extends('admin.section.master')
@section('app')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>همه مقالات</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{ route('posts.create') }}"><i class="fa fa-plus"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th>تصویر مقاله</th>
                    <th>عنوان مقاله</th>
                    <th>دسته مقاله</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>

                <tbody>
                    
                    @foreach ($posts as $article)
                    <tr>
                        <td><img src="{{ asset("upload/posts/$article->image") }}" heigth="80" width="80"></td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->categoryName }}</td>
                        <td>
                            <form action="{{ route('posts.destroy',$article->slug) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <a href="{{ route('posts.show',$article->slug) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('posts.edit',$article->slug) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection