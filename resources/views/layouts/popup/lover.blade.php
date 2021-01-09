<div class="col mb-5">
    <div class="">
        <a href="/users/{{$love->user_id}}">
            <img src="/storage/uploads/profile_pictures/{{$profile_pic = App\User::findorfail($love->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo">
        </a>
    </div>
    <div class="">
        <a href="/users/{{App\User::findorfail($love->user_id)->id}}" class="">
            {{App\User::findorfail($love->user_id)->full_name()}}
        </a>
    </div>
    <div class="">
        <span class="text-dark">{{date("Y-m-d h:i:sa",strtotime($love->created_at))}}</span>
    </div>
</div>
