@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="col my-5 ">
            <div class="row">
                <div class="col bg-success text-light h5 p-2 rounded">
                    {{--    شماره جوک--}}
                    {{'جوک شماره '.$joke->id.' > '.$joke->title}}
                </div>
            </div>
            <div class="row ">
                <div class="col bg-light border border-success text-dark h3 p-5  mt-3 just text-center rounded">
                    {{--    متن جوک وسط چین--}}
                    {{$joke->body}}
                </div>
            </div>
            <div class="row m-2 justify-content-center">
{{--اگر یوزر داشتیم و ایدیش مساوی با سازنده جوک بود--}}
                @if($joke->user_id===auth()->id())
                    {{--                دکمه حذف جوک--}}
                    <form action="{{route('delete',['joke'=>$joke])}}" method="post" class="col-lg-4 col-sm-12">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="url" value="{{$urlForBack}}">
                        <button type="submit" class="btn btn-danger btn-block">حذف جوک</button>
                    </form>
                    {{--                دکمه ویرایش--}}
                    <form action="{{route('edit',['joke'=>$joke])}}" method="get" class="col-lg-4 col-sm-12">
                        <input type="hidden" name="url" value="{{$urlForBack}}">
                        <button type="submit" class="btn btn-primary btn-block">ویرایش جوک</button>
                    </form>
                @endif
                {{-- اگر کاربر لاگین بود  --}}
                @if(auth()->id())
                {{--               اگر دکمه بوسیله همین کاربر لایک شده بود --}}
                    @if($isLiked)
                        <form method="post" action="{{route('disLike',['joke'=>$joke,'user'=>auth()->id(),'isLiked'=> $isLiked])}}" class="col-lg-4 col-sm-12">
                            @csrf
                            {{-- <input type="hidden" name="user_id" value="{{auth()->id()}}"> --}}
                            <input type="hidden" name="url" value="{{$urlForBack}}">
                            <button type="submit" class="btn btn-success btn-block col ">likes : {{$count}}
                            </button>
                        </form>

                        {{--اگر دکمه به وسیله این کاربر لایک نشده بود به متد لایک می رود و انجا هم با ایف چک می شود.--}}
                    @else
                        <form method="post" action="{{route('like',['joke'=>$joke,'user'=>auth()->id() ,'isLiked'=>$isLiked])}}"
                              class="col-lg-4 col-sm-12">
                              @csrf
                            {{-- <input type="hidden" name="user_id" value="{{auth()->id()}}"> --}}
                            <input type="hidden" name="url" value="{{$urlForBack}}">
                            <button type="submit" class="btn btn-warning btn-block col">likes : {{$count}}
                            </button>
                        </form>
                    @endif
                @else
                    {{--                   اگر کاربر لاگین نکرده با میدلور اوث مواجه می شود--}}
                    {{-- <form method="post" action="{{route('login')}} class="col-lg-4 col-sm-12"> --}}
                    {{-- <form method="post" action="{{route('like',['joke'=>$joke,'user'=>0 ,'isLiked'=>0])}}" class="col-lg-4 col-sm-12"> --}}
                        {{-- @csrf --}}
                        {{-- <input type="hidden" name="user_id" value="0">
                        <input type="hidden" name="url" value="{{$urlForBack}}"> --}}
                        {{-- {{  Form::hidden('url',URL::previous())  }} --}}
                        <a href="{{route('login')}}" class="btn btn-warning btn-block col">likes : {{$count}}
                        </a>
                    {{-- </form> --}}
                @endif

                {{-- یو ار ال ذخیره شده را نشان می دهد  --}}
                {{-- {{$urlForBack}} --}}

                {{-- یو ار ال قبلی را نمایش می دهد --}}
                {{-- {{URL::previous()}} --}}
                
                {{-- یو ار ال فعلی را نمایش می دهد  --}}
                {{-- {{URL::full()}} --}}
                <div class="col">
                    <a href="{{$urlForBack}}" class="btn btn-info btn-block col">بازگشت</a>
                </div>


                {{--                    اگر بخواهیم به عقب برگردد که در لایک کردن مشکل ایجاد می شود و روت قبلی روت شو بدون لایک است.--}}
                {{--                <form action="{{ url()->previous() }}" method="get" class="col-lg-4 col-sm-12">--}}
                    
                {{-- فرم قبلترش --}}
                {{-- <form action="{{route('index')}}" method="get" class="col-lg-4 col-sm-12">
                <button type="submit" class="btn btn-primary btn-block">بازگشت</button>
                </form> --}}
            </div>
        </div>
@endsection
