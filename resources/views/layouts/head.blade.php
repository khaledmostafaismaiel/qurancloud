<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">--}}
    <link rel="stylesheet" href= "/bootstrap-4.5.2-dist/css/bootstrap.css" >
    <link rel="stylesheet" href= "/css/app.css" >
    <title>QuranCloud {{get_script_name()}}</title>
    <link rel="shortcut icon" type="image/png" href="/images/favicon.png">

    <meta name="csrf-token" content="{{csrf_token()}}">{{--for messages--}}
</head>
<body>
    @if(($_SERVER["PHP_SELF"] != "/index.php/users/create") && ($_SERVER["PHP_SELF"] != "/index.php/login"))
        @include('layouts.user_nav')
    @endif
    <div id="master_view" class="master_view">
