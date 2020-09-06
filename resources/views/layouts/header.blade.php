        <body>
        <div class="master_view">
            <header class="header" id="header">
                @include('layouts/logo')
                @if(($_SERVER["PHP_SELF"] != "/index.php/users/create") && ($_SERVER["PHP_SELF"] != "/index.php/login"))
                    @include('layouts/search_box')
                    @include('layouts.user_nav')
{{--                    @include('layouts.side_navigation')--}}
{{--                    @include('layouts.advertise_side_navigation')--}}
                @endif
                @include('layouts/session_messages')
            </header>
