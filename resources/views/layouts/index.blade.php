@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{route('create')}}"
               class="btn btn-block mt-3 text-black-50 font-weight-bolder bg-light w-75 border border-dark ">اضافه نمودن
                جوک جدید</a>
        </div>
        <div class="row m-3 justify-content-center">
            @foreach($jokes as $joke)
                <div class="col-md-6 col-lg-4">
                    <div class="card m-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    {{$joke->title}}
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    {{$joke->user->name}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-justify" style="height: 12vh; overflow: hidden">
                                {{$joke->body}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                @if(auth()->user())
                                {{-- نشان دادن یو ار ال قبلی --}}
                                {{-- {{URL::previous()}} --}}
                                {{-- {{$url}} --}}
                                <form class="col" method="POST" action="{{route('showWithUser',['user'=>auth()->user() , 'joke'=>$joke])}}">
                                    @csrf
                                    {{-- قبلا با متد گت می فرستادم حالا با متد پست برای درست کردن بازگشت --}}
                                    {{-- <a href="{{route('showWithUser',['user'=>auth()->user() , 'joke'=>$joke])}}"
                                        class="m-2 btn btn-success btn-block btn-sm col">نمایش</a> --}}
                                        

                                        {{-- یو ار ال قبلی را نمایش می دهد --}}
                                        {{-- {{URL::previous()}} --}}

                                        {{-- یو ار ال فعلی را نمایش می دهد --}}
                                        {{-- {{URL::full()}} --}}

                                        {{-- یو ار ال را می گیریم و به صفحه شو می فرستیم تا بتوانیم دکمه بازگشت را به اینجا تنظیم کنیم.  --}}
                                        <input type="hidden" name="url" value="{{URL::full()}}">
                                        <button type="submit" class=" btn btn-success btn-block btn-sm col">نمایش</button>
                                        </form>
                                @else
                                <form class="col" action="{{route('show',['joke'=>$joke])}}" method="post">
                                @csrf
                                {{-- فرستادن یو ار ال صفحه فعلی برای برگشتن به اینجا هر چند لازم نیست. چون باید به ایندکس برگردد.  --}}
                                <input type="hidden" name="url" value="{{URL::full()}}">
                                <button type="submit" class=" btn btn-success btn-block btn-sm col">نمایش</button>
                                </form>
                                    {{-- <a href="{{route('show',['joke'=>$joke])}}"
                                       class="m-2 btn btn-success btn-block btn-sm col">نمایش</a> --}}
                                @endif
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
