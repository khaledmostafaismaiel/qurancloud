        <body>
        @if(($_SERVER["PHP_SELF"] != "/index.php/users/create") && ($_SERVER["PHP_SELF"] != "/index.php/login"))
            <nav class="navbar navbar-expand-lg navbar-dark  text-white my_navbar">
                <a class="navbar-brand" href="/">
                    <img id="logo" src="/images/favicon.png" alt="Quraa logo" class="navbar-brand-logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="form-inline my-2 my-lg-0 ml-auto">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav ml-auto text-center">
                        <li class="nav-item mx-3 ">
                            <a class="user-nav__user-name" href="/users/{{auth()->id()}}">
                                <img src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}" alt="User photo" class="user-nav__user-photo">
                            </a>
                        </li>

                        <li class="nav-item mx-3 " id="user-nav__friend_requests_box">
                            <span class="nav-link">
                                <svg class="user-nav__icon">
                                    <use xlink:href="/images/sprite.svg#icon-home"></use>
                                </svg>
                                <span class="badge badge-pill badge-info">
                                    7
                                </span>
                            </span>
                            <div class="notifi-box" id="friend_requests-box">
                                <h2 class="notifi-box-h2">Friend Requests<span class="notifi-box-span">7</span></h2>
                                @for($i=0;$i<7;++$i)
                                    <div class="notifi-item">
                                        <img class="notifi-item-img" src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}">
                                        <div class="notifi-item-text">
                                            <h4 class="notifi-item-text-h4">{{auth()->user()->full_name()}}</h4>
                                            <p class="notifi-item-text-p">Lorem ipsum lorem ipsum lorem ipsum</p>
                                        </div>
                                    </div>
                                @endfor
                                <a href="/friends"  class="notifi-box-show_all">
                                    <button type="button" class="notifi-box-show_all-button">
                                        Show All
                                    </button>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item mx-3" id="user-nav__messages_box">
                            <span class="nav-link">
                                <svg class="user-nav__icon">
                                    <use xlink:href="/images/sprite.svg#icon-chat"></use>
                                </svg>
                                <span class="badge badge-pill badge-info">
                                    13
                                </span>
                            </span>
                            <div class="notifi-box" id="messages-box">
                                <h2 class="notifi-box-h2">Messages<span class="notifi-box-span">13</span></h2>
                                @for($i=0;$i<5;++$i)
                                    <a href="/chats/1">
                                        <div class="notifi-item">
                                            <img class="notifi-item-img" src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}">
                                            <div class="notifi-item-text">
                                                <h4 class="notifi-item-text-h4">{{auth()->user()->full_name()}}</h4>
                                                <p class="notifi-item-text-p">Lorem ipsum lorem ipsum lorem ipsum</p>
                                            </div>
                                        </div>
                                    </a>
                                @endfor
                                <a href="/chats"  class="notifi-box-show_all">
                                    <button type="button" class="notifi-box-show_all-button">
                                        Show All
                                    </button>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item mx-3" id="user-nav__notifications_box">
                            <span class="nav-link">
                                <svg class="user-nav__icon">
                                    <use xlink:href="/images/sprite.svg#icon-star"></use>
                                </svg>
                                <span class="badge badge-pill badge-info">
                                    2
                                </span>
                            </span>
                            <div class="notifi-box" id="notifications-box">
                                <h2 class="notifi-box-h2">Notifications<span class="notifi-box-span">2</span></h2>
                                @for($i=0;$i<2;++$i)
                                    <div class="notifi-item">
                                        <img class="notifi-item-img" src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}">
                                        <div class="notifi-item-text">
                                            <h4 class="notifi-item-text-h4">{{auth()->user()->full_name()}}</h4>
                                            <p class="notifi-item-text-p">Lorem ipsum lorem ipsum lorem ipsum</p>
                                        </div>
                                    </div>
                                @endfor
                                <a href="/notifications"  class="notifi-box-show_all">
                                    <button type="button" class="notifi-box-show_all-button">
                                        Show All
                                    </button>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/users/{{auth()->id()}}/settings">
                                    <span>settings</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <form method="post" action="/users/process_sign_out">
                                        {{csrf_field()}}
                                        <input type="submit" value="sign out" class="btn btn-danger w-100">
                                    </form>
                                </a>
                            </div>
                        </li>

                    </ul>
                </div>
                @include('layouts/session_messages')

            </nav>
        @endif

        <div id="master_view" class="master_view">
            <header class="header" id="header">
{{--                @include('layouts/logo')--}}

{{--                @if(($_SERVER["PHP_SELF"] != "/index.php/users/create") && ($_SERVER["PHP_SELF"] != "/index.php/login"))--}}
{{--                    @include('layouts/search_box')--}}
{{--                    @include('layouts.user_nav')--}}
{{--                    @include('layouts.side_navigation')--}}
{{--                    @include('layouts.advertise_side_navigation')--}}
{{--                @endif--}}
            </header>
