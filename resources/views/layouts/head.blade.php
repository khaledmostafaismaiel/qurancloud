<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}" id="{{auth()->id()}}">{{--for messages--}}
    @include('layouts.style')
</head>
<body>
    @auth
        @include('layouts.User-Navigation.user_nav')
    @endauth
