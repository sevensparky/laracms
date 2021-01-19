@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-start">
    <a href="{{ route('categories.index') }}" class="btn btn-dark mb-2">بازگشت</a>
</div>

@include('cms.alerts.error')
@include('cms.alerts.alert')

<div class="card card-default">
    <div class="card-header text-right">
       ایجاد پست
    </div>

    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
          @csrf  
            <div class="form-group text-right">
                <label for="title">عنوان پست</label>
                <input type="text" class="form-control text-right @error('title') is-invalid @enderror" id="title" name="title" placeholder="...عنوان پست را وارد کنید" value="{{ old('title') }}" required autocomplete="title" autofocus>
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
                    <option value="{{ $category->id }}" class="text-right">{{ $category->name }}</option>
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
                <input type="text" class="form-control text-right @error('description') is-invalid @enderror" id="description" name="description" placeholder="...توضیحات کوتاهی را وارد کنید" value="{{ old('description') }}" required autocomplete="description" autofocus>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div class="form-group text-right">
                <label for="content">متن پست</label>
               <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
            </div>


            <div class="form-group text-right">
                <label for="image">تصویر پست</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>


            <div class="form-group text-right">
                <label for="tags">برچسب ها (تگ)</label>
                <select name="tags[]" id="tags" class="form-control" multiple>
                    @foreach (\App\Models\Tag::latest()->get() as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
