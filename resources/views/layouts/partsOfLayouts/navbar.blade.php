<!-- NAVBAR WITH RESPONSIVE TOGGLE -->
<nav class="navbar navbar-expand-sm navbar-light bg-light mb-3">
    <div class="container">
        <a class="navbar-brand" href="#">جوکیستاگرام</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">خانه</a>
                </li>
                @if(auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('userJokes',['user'=>auth()->user()])}}">جوک های من</a>
                    </li>
                    <li class="nav-item">
                        {{-- اصلی: --}}
                        {{-- <a class="nav-link" href="{{route('likedJokes',['user'=>auth()->user()])}}">جوک های مورد علاقه</a> --}}
                        
                        
                        {{-- امتحانی --}}
                        <a class="nav-link" href="{{route('likedJokes',['user'=>auth()->user()])}}">جوک های مورد علاقه</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#">ارتباط با ما</a>
                </li>

                {{--                وقتی کاربر لاگین نیست--}}
                @unless(auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">ورود</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">ثبت نام</a>
                    </li>
                @else
                    {{--                وقتی کاربر لاگین است--}}
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                           data-toggle="dropdown">{{auth()->user()->user_name()}}</a>
                        <div class="dropdown-menu">
                            {{--                    <a href="#" class="dropdown-item"> لینک دوم </a>--}}
                            {{--                    <a href="#" class="dropdown-item"> لینک سوم </a>--}}
                            <a href="{{route('logout')}}" class="dropdown-item"> خروج </a>
                        </div>
                    </li>
                @endunless
            </ul>
        </div>
    </div>
</nav>

{{--نو بار طراحی خودم قبلی که نو بار نبود.--}}
{{--<hr>--}}
{{--<hr>--}}
{{--<div class="row bg-success justify-content-around align-items-center text-center">--}}
{{--    <div class="col-3 align-items-center justify-content-around m-5">--}}
{{--        <h1>جوکیستاگرام</h1>--}}
{{--    </div>--}}
{{--    <div class="col-3 align-items-center justify-content-around m-5">--}}
{{--        @unless(auth()->user())--}}
{{--            <a href="{{route('login')}}" class="ml-3 h2 text-light">لاگین</a>--}}
{{--            <a href="{{route('register')}}" class="h2 text-light">رجیستر</a>--}}
{{--        @else--}}
{{--            <a href="{{route('logout')}}" class="h2 text-light">خروج</a>--}}
{{--        @endunless--}}
{{--    </div>--}}
{{--</div>--}}
{{--<hr>--}}
{{--<hr>--}}
