@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-start">
    <a href="{{ route('tags.index') }}" class="btn btn-dark mb-2">بازگشت</a>
</div>

@include('cms.alerts.error')

<div class="card card-default">
    <div class="card-header text-right">
       افزودن برچسب (تگ) جدید
    </div>

    <div class="card-body">
        <form action="{{ route('tags.store') }}" method="POST">
          @csrf  
            <div class="form-group text-right">
                <label for="name">نام برچسب</label>
                <input type="text" class="form-control text-right @error('name') is-invalid @enderror" id="name" name="name" placeholder="...نام دسته بندی را وارد کنید" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
           <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">ثبت</button>   
           </div>
        </form>
</div>

    
</div>
@endsection
