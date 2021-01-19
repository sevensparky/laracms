@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-start">
    <a href="{{ route('posts.index') }}" class="btn btn-dark mb-2">بازگشت</a>
</div>

@include('cms.alerts.error')
@include('cms.alerts.alert')

<div class="card card-default">
    <div class="card-header text-right">
       ویرایش پست {{ $post->title }}
    </div>

    <div class="card-body">
        <form action="{{ route('posts.update',$post->slug) }}" method="POST" enctype="multipart/form-data">
          @csrf  
          @method('PUT')
            <div class="form-group text-right">
                <label for="title">عنوان پست</label>
                <input type="text" class="form-control text-right @error('title') is-invalid @enderror" id="title" name="title" placeholder="...عنوان پست را وارد کنید" value="{{ $post->title }}" required autocomplete="title" autofocus>
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group text-right">
                <label for="category_id">نام دسته بندی پست</label>
                 <select name="category_id" class="form-control text-right @error('category_id') is-invalid @enderror" id="category_id">
                    <option value="" class="text-right" selected>...دسته مورد نظر را انتخاب کنید</option>
                    @foreach (\App\Models\Category::latest()->get() as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : ''}} class="text-right">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div class="form-group text-right">
                <label for="description">توضیحات پست</label>
                <input type="text" class="form-control text-right @error('description') is-invalid @enderror" id="description" name="description" placeholder="...توضیحات کوتاهی را وارد کنید" value="{{ $post->description }}" required autocomplete="description" autofocus>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div class="form-group text-right">
                <label for="content">متن پست</label>
               <textarea name="content" class="form-control text-right" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
            </div>


            <div class="form-group text-right">
                <label>تصویر فعلی</label><br>
               <img src="{{ asset('upload/posts/'.$post->image) }}" width="220" height="180">
            </div>

            <div class="form-group text-right">
                <label for="image">تصویر پست</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="form-group text-right">
                <label for="tags">برچسب ها (تگ)</label>
                <select name="tags[]" id="tags" class="form-control" multiple>
                    @foreach (\App\Models\Tag::latest()->get() as $tag)
                    <option value="{{ $tag->id }}" {{ $post->hasTag($tag->id) ? 'selected' : ''}}>{{ $tag->name }}</option>
                   @endforeach
                </select>
            </div>
            
           <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">ثبت</button>   
           </div>
        </form>
</div>

    
</div>
@endsection
