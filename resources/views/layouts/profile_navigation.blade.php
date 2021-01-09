<ul class="row d-flex justify-content-around p-3 profile-nav bg-dark">

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
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="follower-modal-Title">Followers</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="modal-body-followers-table">

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
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="following-modal-Title">Followings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="modal-body-following-table">

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
        @if(canIFollowThisUser($user) == -1)
            <li class="">
                @include('layouts.actions.follow')
            </li>
        @else
            <li class="">
                @include('layouts.actions.unfollow')
            </li>
        @endif
    @endif

</ul>
