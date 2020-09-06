<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuranCloud {{get_script_name()}}</title>
    <link rel="shortcut icon" type="image/png" href="/images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">--}}
    <link rel="stylesheet" href= "/css/style.css" >
    <script  src="/js/jquery-3.5.1.js" type="text/javascript"> </script>
    <script type="text/javascript">
        $("document").ready(function () {
            @if($_SERVER['PHP_SELF'] == '/index.php' )
                $('.track-comments-container').css("display" , "none") ;
            @endif
        });

    </script>
</head>
