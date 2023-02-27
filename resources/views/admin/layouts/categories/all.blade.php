@extends('admin.section.master')
@section('app')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>همه دسته ها</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="{{ route('categories.create') }}"><i class="fa fa-plus"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                    <thead>
                        <tr>
                            <th>نام مقاله</th>
                            <th>آدرس URL</th>
                            <th>وضعیت</th>
                            <th>تنظیمات</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->url }}</td>
                                <td>
                                    @if ($category->status == 'active')
                                        <span class="badge badge-success badge-pill">{{ __($category->status) }}</span>
                                    @else
                                        <span class="badge badge-danger badge-pill">{{ __($category->status) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <section style="display: inline-flex">
                                        <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-warning"><i
                                                class="fa fa-pencil"></i></a>

                                        <form action="{{ route('category.change.status', $category->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf

                                            <button class="btn btn-info"><i class="fa fa-check"></i></button>
                                        </form>

                                        <button type="button" class="btn btn-danger"
                                            onclick="document.getElementById('destroy').submit()"><i
                                                class="fa fa-trash"></i></button>

                                        <form action="{{ route('categories.destroy', $category->slug) }}" id="destroy"
                                            method="POST" style="display: none">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </section>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
