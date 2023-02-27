@extends('admin.section.master')
@section('app')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>همه برچسب ها</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{ route('tags.create') }}"><i class="fa fa-plus"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th>نام برچسب</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>

                <tbody>

                    @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <form action="{{ route('tags.destroy',$tag->slug) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <a href="{{ route('tags.edit',$tag->slug) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $tags->links() }}
        </div>
    </div>
</div>
@endsection
