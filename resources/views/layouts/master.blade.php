<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>jokstagram</title>
</head>
<body>
{{-- نو بار پارشیال شده --}}
@include('layouts.partsOfLayouts.navbar')

{{--محل قرار گرفتن سکشن ها--}}
@yield('content')

{{--اتصال فایل جی اس--}}
<script src="{{asset ('/js/app.js')}}"></script>

{{--استفاده از کتابخانه سویت الرت--}}
@include('sweet::alert')


</body>
</html>
