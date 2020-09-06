<div class="track-comment" id="track_comment-{{$comment->id}}">
    <table>
        <tr>
            <td><a href="/users/{{App\User::findorfail($comment->user_id)->id}}"><img src="/storage/uploads/profile_pictures/{{App\User::findorfail($comment->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo"></a></td>
            <td  class="track-comment-user_name"><a class="track-comment-user_name-link" href="/users/{{$comment->user_id}}">{{App\User::findorfail($comment->user_id)->full_name()}}</a></td>
            @if(auth()->id() == $comment->user_id)
                <td>&nbsp;</td>
            @endif
            <td><input hidden type="text" name="user_id" value="{{$comment->user_id}}" required></td>
        </tr>
        <tr>
            <td>
                @if(canILoveThisComment($comment) == -1)
                    <img src="/images/unlove.png"  class="track-comment-love_pic">
                    <a href="" class="track-comment-love">
                        <form method="POST" action="/commentLoves" class="">
                            {{csrf_field()}}
                            <input hidden type="text" name="comment_id" value="{{$comment->id}}" required>
                            {{--                <img src="/images/set.png" alt="User photo" class="user-nav__user-photo">--}}
                            <input type="submit"  class="btn-comment-form-love" name="submit" value="Love">
                        </form>
                    </a>
                @else
                    <img src="/images/love.png" class="track-comment-love_pic">
                    <form method="POST" action="/commentLoves/{{canILoveThisComment($comment)}}" class="">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        {{--                <img src="/images/set.png" alt="User photo" class="user-nav__user-photo">--}}
                        <input type="submit"  class="btn-comment-form-love" name="submit" value="unLove">
                    </form>
                @endif


            </td>
            @if($comment == $comment_to_edit)
                <td>
                    <form method="post" action="/comments/{{$comment->id}}">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <textarea name="comment"  cols="100" rows="3"  class="track-comment-text_area">{{$comment->comment}}</textarea>
                        <input type="submit" value="Edit" class="btn-comment-form">
                    </form>
                </td>
                @if(auth()->id() == $comment->user_id)
                    <td>&nbsp;</td>
                @endif
            @else
                <td><textarea name="comment"  cols="100" rows="3" readonly class="track-comment-text_area">{{$comment->comment}}</textarea></td>
                @if(auth()->id() == $comment->user_id)
                    <td>
                        <a href="/comments/{{$comment->id}}/edit" class="btn-comment-form" >Edit</a>
                    </td>
                @endif
            @endif
        </tr>
        <tr>
            <td><a class="track-comment-love" @if($comment->commentLoves()->count() > 0) href="#comment-loves-container-{{$comment->id}}" @endif>{{$comment->commentLoves()->count()}} Love</a></td>
                {{--            <td><a class="track-comment-love" href="/commentLoves?comment_id={{$comment->id}}">{{$comment->commentLoves()->count()}} Love</a></td>--}}
            <td class="track-comment-date">{{date("Y-m-d h:i:sa",strtotime($comment->created_at))}}</td>
            @if(auth()->id() == $comment->user_id)
                <td>
                    <form method="post" action="/comments/{{$comment->id}}">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <input type="submit" value="Delete" class="btn-comment-form" onclick="return confirm('Are you sure?');">
                    </form>
                </td>
            @endif
        </tr>
    </table>
</div>
