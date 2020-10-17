<nav class="navbar navbar-expand-lg navbar-dark  text-white my_navbar">
    @include('layouts.logo')
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @include('layouts.search_box')
        <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item m-3 ">
                @include('layouts.track_options')
            </li>

            <li class="nav-item m-3 ">
                @include('layouts.track_form_add_track')
            </li>

            <li class="nav-item mx-3 ">
                <a class="user-nav__user-name" href="/users/{{auth()->id()}}">
                    <img src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}" alt="User photo" class="user-nav__user-photo">
                </a>
            </li>

            <li class="nav-item mx-3 " id="user-nav__friend_requests_box">
                <a href="/friends" class="nav-link">
                    <svg class="user-nav__icon">
                        <use xlink:href="/images/sprite.svg#icon-star"></use>
                    </svg>
                    <span class="badge badge-pill badge-info">
                        7
                    </span>
                </a>
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
                <a href="/messages" class="nav-link">
                    <svg class="user-nav__icon">
                        <use xlink:href="/images/sprite.svg#icon-chat"></use>
                    </svg>
                    <span class="badge badge-pill badge-info">
                        13
                    </span>
                </a>
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
                <a href="/notifications" class="nav-link">
                    <svg class="user-nav__icon">
                        <use xlink:href="/images/sprite.svg#icon-star"></use>
                    </svg>
                    <span class="badge badge-pill badge-info">
                        2
                    </span>
                </a>
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


<!-- ِAdd Track Modal -->
<div class="modal fade" id="add_track" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="add_track-Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_track-Label">UPLOAD TRACK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/tracks" enctype="multipart/form-data" method="POST" class="">
                    {{csrf_field()}}
                    <table>
                        <tr class="form-group">
                            <td class="">&nbsp;</td>
                            <td class=""><input type="hidden" name="MAX_FILE_SIZE" value="<?php /*echo $max_file_size; */?>" /></td>

                        </tr>
                        <tr class="form-group">
                            <td class=""><input class="form-control-file mr-2 w-100" type="file" name="file_upload" required/></td>
                            <td class=""><textarea name="caption" id="" cols="30"  class="form-control ml-2" placeholder="Track caption"></textarea></td>
                        </tr>
                        <td>&nbsp;</td>
                        <td class=""><button type="submit" name="submit"  class="btn btn-primary mt-3">UPLOAD</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Track Options Modal -->
<div class="modal fade" id="track_options" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="track_options-Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="track_options-Label">TRACK OPTIONS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="track_options-modal-close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center" id="track_options-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="track_options-modal-ok">OK</button>
            </div>
        </div>
    </div>
</div>
