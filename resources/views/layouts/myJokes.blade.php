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
                            <div class="row">

                                {{-- دکمه حذف  --}}
                                <form action="{{route('delete',['joke'=>$joke])}}" method="post" class="col-lg-4 col-sm-12">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-block">حذف جوک</button>
                                </form>
                                
                                {{--دکمه ویرایش--}}
                                <form action="{{route('edit',['joke'=>$joke])}}" method="get" class="col-lg-4 col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block">ویرایش جوک</button>
                                </form>
                            </div>
                    </td>
                        @endforeach
                    </tr>
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
