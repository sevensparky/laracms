@extends('admin.section.master')
@section('app')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>همه سوالات</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{ route('faqs.create') }}"><i class="fa fa-plus"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th>عنوان سوال</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>

                <tbody>

                    @foreach ($faqs as $faq)
                    <tr>
                        <td>{{ $faq->question }}</td>
                        <td>
                            <form action="{{ route('faqs.destroy',$faq->slug) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <a href="{{ route('faqs.edit',$faq->slug) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $faqs->links() }}
        </div>
    </div>
</div>


@endsection
