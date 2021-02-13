@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{route('create')}}"
               class="btn btn-block mt-3 text-black-50 font-weight-bolder bg-light w-75 border border-dark ">اضافه نمودن
                جوک جدید</a>
        </div>

            <!-- BORDERED TABLE -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>شماره جوک</th>
                        <th>عنوان جوک</th>
                        <th>متن جوک</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jokes as $joke)
                    <tr>
                        <td>{{$joke->id}}</td>
                        <td>{{$joke->title}}</td>
                        <td>{{$joke->body}}</td>
                        <td>
                            <form class="col" method="POST" action="{{route('showWithUser',['user'=>auth()->user() , 'joke'=>$joke])}}">
                                @csrf
                                {{-- قبلا با متد گت می فرستادم حالا با متد پست برای درست کردن بازگشت --}}
                                {{-- <a href="{{route('showWithUser',['user'=>auth()->user() , 'joke'=>$Joke])}}"
                                    class="m-2 btn btn-success btn-block btn-sm col">نمایش</a> --}}
                                    

                                {{-- یو ار ال قبلی را نمایش می دهد --}}
                                {{-- {{URL::previous()}} --}}
                                
                                {{-- یو ار ال فعلی را نمایش می دهد  --}}
                                {{-- {{URL::full()}} --}}
                                    
                                <input type="hidden" name="url" value="{{URL::full()}}">
                                <button type="submit" class=" btn btn-success btn-block btn-sm col">نمایش</button>
                            </form>

                            {{-- قبلی که با متد گت کار می کرد --}}
                            {{-- <a href="{{route('showWithUser',['user'=>auth()->user() , 'joke'=>$joke])}}"
                                class="m-2 btn btn-success btn-block btn-sm col">نمایش</a> --}}
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <hr>

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
                                @if(auth()->user())
                                    <a href="{{route('showWithUser',['user'=>auth()->user() , 'joke'=>$Joke])}}"
                                       class="m-2 btn btn-success btn-block btn-sm col">نمایش</a>
                                @else
                                    <a href="{{route('show',['joke'=>$Joke])}}"
                                       class="m-2 btn btn-success btn-block btn-sm col">نمایش</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


{{-- پیجینیت --}}

       {{-- <div class="row mt-3 d-flex justify-content-center">
       <div class="text-center align-items-center">
           {{$jokes->links()}}
       </div>
   </div> --}}
@endsection
