<ul class="row d-flex justify-content-around p-3 profile-nav">

    <li class="">
        <a href="/users/{{$user->id}}/about" class="">
            <button class="btn btn-outline-info">About</button>
        </a>
    </li>

    <li>
        <button class="btn btn-outline-info " data-toggle="modal" data-target="#follower-modal" id="follower-modal-button" data-user_id="{{$user->id}}">
            <span>
                Followers
                @if( App\User::findorfail($user->id)->Followers()->count() != 0 )
                    ( {{  App\User::findorfail($user->id)->Followers()->count() }} )
                @endif
            </span>
        </button>

        <!-- Followers Modal -->
        <div class="modal fade" id="follower-modal" tabindex="-1" role="dialog" aria-labelledby="follower-modal-Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="follower-modal-Title">Followers</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body-div-follower">
                        <table>
                            <thead>
                            <tr>

                            </tr>
                            </thead>
                            <tbody id="follower-modal-body">

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </li>

    <li>
        <button  class="btn btn-outline-info " data-toggle="modal" data-target="#following-modal" id="following-modal-button" data-user_id="{{$user->id}}">
            <span>
                Following
                @if(App\User::findorfail($user->id)->followings()->count() != 0)
                    ( {{  App\User::findorfail($user->id)->followings()->count() }} )
                @endif
            </span>
        </button>


        <!-- Followings Modal -->
        <div class="modal fade" id="following-modal" tabindex="-1" role="dialog" aria-labelledby="following-modal-Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="following-modal-Title">Followings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body-div-following">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="following-modal-body">

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </li>

    @if(auth()->id() == $user->id)
        <li>
            <a href="/chats" class="">
                <button class="btn btn-outline-info">Chats</button>
            </a>
        </li>
    @else
        <li class="">
            <a href="/chats/create/for_first_time/{{$user->id}}" class="profile-nav__link">
                <button class="btn btn-outline-info">Chat</button>
            </a>
        </li>
        <li class="">
            <form method="POST" action="/friends" class="">
                {{csrf_field()}}
                <input type="text" hidden name="following_user_id" value="{{$user->id}}">
                <input type="submit"  class="btn btn-outline-info " name="submit" value="FOLLOW">
            </form>
        </li>
    @endif

</ul>
