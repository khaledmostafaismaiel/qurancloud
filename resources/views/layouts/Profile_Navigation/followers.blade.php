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
                <h5 class="modal-title" id="follower-modal-Title">Followers {{  App\User::findorfail($user->id)->Followers()->count() }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-followers">
                <table class="modal-body-followers-table">

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
