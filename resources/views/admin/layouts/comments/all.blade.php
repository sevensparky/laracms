@extends('admin.section.master')
@section('app')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>نظرات کاربران</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th>عنوان مقاله</th>
                    <th>نام کاربر</th>
                    <th>متن نظر</th>
                    <th>وضعیت نظر</th>
                    <th class="text-center">تنظیمات</th>
                </tr>
                </thead>

                <tbody>
                    
                    @foreach ($comments as $comment)
                    <tr>
                        <td>{{ Str::limit($comment->commentable->title,20) }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ Str::limit($comment->comment,20) }}</td>
                        <td>
                            @if ($comment->status == 'unseen')
                            <span class="text-warning">مشاهده نشده</span>
                            @elseif ($comment->status == 'accepted')
                                <span class="text-success">تایید شده</span>   
                            @else
                            <span class="text-danger">رد شده</span>
                            @endif
                        </td>
                        <td>
                                                        
                            <div class="form-group">
                                <div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-1"> 
                                    <a href="{{ route('comments.show',$comment->id) }}" title="مشاهده نظر" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-1"> 
                                    <form action="{{ route('comments.accept',$comment->id) }}" method="post" >
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"  class="btn btn-success" title="تایید نظر"><i class="fa fa-check"></i></button>
                                    </form>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-1">
                                    <form action="{{ route('comments.reject',$comment->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"  class="btn btn-danger" title="رد نظر"><i class="fa fa-times"></i></button>
                                    </form>
                                </div>
                            </div>




                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $comments->links() }}
        </div>
    </div>
</div>
@endsection
