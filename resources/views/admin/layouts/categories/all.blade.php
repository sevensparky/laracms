@extends('admin.section.master')
@section('app')

@if (auth()->user()->role == 'writer')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>همه دسته ها ایجاد شده توسط شما</h2>
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
                    <th>تنظیمات</th>
                </tr>
                </thead>

                <tbody>
                    
                    @foreach ($categories->where('user_id' , auth()->user()->id) as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <form action="{{ route('categories.destroy',$category->slug) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <a href="{{ route('categories.show',$category->slug) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('categories.edit',$category->slug) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $categories->links() }}
        </div>
    </div>
</div>

@else

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
                    <th>تنظیمات</th>
                </tr>
                </thead>

                <tbody>
                    
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <form action="{{ route('categories.destroy',$category->slug) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <a href="{{ route('categories.edit',$category->slug) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $categories->links() }}
        </div>
    </div>
</div>
    
@endif

@endsection
