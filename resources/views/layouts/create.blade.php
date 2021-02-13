@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <form action="{{route('store')}}" method="post">
            <div class="form-group">
                @csrf
                <lable for="title">عنوان جوک</lable>
                <br>
                <input type="text" id="title" name="title"
                       class="form-control @error('title') form-control-invalid @enderror"
                       placeholder="عنوانی برای جوک انتخاب کنید." value="{{old('title')}}">
                @error('title')
                <p class="invalid-feedback d-block">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <lable for="body">متن جوک</lable>
                <br>
                <textarea id="body" name="body" class="form-control @error('body') form-control-invalid @enderror"
                          rows="5" placeholder="متن جوک را بنویسید">{{old('body')}}</textarea>
                @error('body')
                <p class="invalid-feedback d-block">
                    {{$message}}
                </p>
                @enderror
            </div>
            <input type="hidden" name="user_id" value="{{auth()->id()}}" >
            <button class="btn btn-success btn-block">ثبت جوک</button>
            <a href="{{route('index')}}" class="btn btn-info btn-block">بازگشت</a>
        </form>
    </div>
@endsection
