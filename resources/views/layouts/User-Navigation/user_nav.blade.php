<nav class="navbar navbar-expand-lg navbar-dark  text-white my_navbar">
    @include('layouts.User-Navigation.logo')
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @include('layouts.User-Navigation.search_box')
        <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item m-3 ">
                @include('layouts.User-Navigation.track_form_add_track')
            </li>

            <li class="nav-item m-3 ">
                @include('layouts.User-Navigation.track_options_btn')
            </li>

            <li class="nav-item m-3 ">
                @include('layouts.User-Navigation.playlistBtn')
            </li>

            <li class="nav-item mx-3" id="avatar_pic" data-user-id="{{auth()->id()}}">
                @include('layouts.User-Navigation.avatar-pic')
            </li>

            <li class="nav-item mx-3" id="user-nav__friend_requests_box">
                @include('layouts.User-Navigation.friend-requests.friend_requests')
            </li>
            <li class="nav-item mx-3" id="user-nav__messages_box">
                @include('layouts.User-Navigation.chats.chats')
            </li>
            <li class="nav-item mx-3" id="user-nav__notifications_box">
                @include('layouts.User-Navigation.notifications.notifications')
            </li>

            <li class="nav-item dropdown mx-3">
                @include('layouts.User-Navigation.DropDown.dropDownMenu')
            </li>

        </ul>
    </div>

{{--    @include('layouts.User-Navigation.session_messages')--}}

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

<!-- PLAYLIST Modal -->
<div class="modal fade" id="playlist" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="playlist-Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="playlist-Label">PLAYLIST</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="playlist-modal-close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center" id="playlist-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="playlist-modal-ok">OK</button>
            </div>
        </div>
    </div>
</div>
