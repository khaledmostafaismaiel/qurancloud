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
                <h5 class="modal-title" id="following-modal-Title">Followings {{  App\User::findorfail($user->id)->followings()->count() }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-followings">
                <table class="modal-body-following-table">

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
