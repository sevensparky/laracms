@extends('admin.section.master')
@section('app')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>لینک ها</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{ route('shortlinks.create') }}"><i class="fa fa-plus"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th>لینک اصلی</th>
                    <th>لینک کوتاه شده</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>

                <tbody>

                    @foreach ($shortlinks as $shortlink)
                    <tr>
                        <td>{{ $shortlink->destination_url }}</td>
                        <td>{{ $shortlink->default_short_url }}</td>
                        <td>
                            <form action="{{ route('shortlinks.destroy',$shortlink->id) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            {{-- {{ $shortlinks->links() }} --}}
        </div>
    </div>
</div>


@endsection
