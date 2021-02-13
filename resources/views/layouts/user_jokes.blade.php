@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{route('create')}}"
               class="btn btn-block mt-3 text-black-50 font-weight-bolder bg-light w-75 border border-dark ">اضافه نمودن
                جوک جدید</a>
        </div>
        <div class="row m-3 justify-content-center">
            @foreach($jokes as $Joke)
                <div class="col-md-6 col-lg-4">
                    <div class="card m-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    {{$Joke->title}}
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    {{$Joke->user->name}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-justify" style="height: 12vh; overflow: hidden">
                                {{$Joke->body}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <a href="{{route('show',['joke'=>$Joke])}}"
                                   class="m-2 btn btn-success btn-block btn-sm col">نمایش</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row mt-3 d-flex justify-content-center">
        <div class="text-center align-items-center">
            {{$jokes->links()}}
        </div>
    </div>
@endsection
