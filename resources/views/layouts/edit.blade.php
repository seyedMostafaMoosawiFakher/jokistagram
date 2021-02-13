@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <form action="{{route('update',['joke'=>$joke])}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <lable for="title">عنوان جوک</lable>
                <br>
                <input type="text" id="title" name="title"
                       class="form-control @error('title') form-control-invalid @enderror" value="{{$joke->title}}">
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
                          rows="5">{{$joke->body}}</textarea>
                @error('body')
                <p class="invalid-feedback d-block">
                    {{$message}}
                </p>
                @enderror
            </div>
            <input type="hidden" name="url" value="{{$urlForBack}}">
            <button type="submit" class="btn btn-success btn-block">ثبت تغییرات جوک</button>
        </form>
        <a href="{{$urlForBack}}" class="btn btn-info btn-block">انصراف</a>
    </div>
@endsection
