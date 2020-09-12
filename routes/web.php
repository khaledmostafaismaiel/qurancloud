<?php

use App\Track;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/test', function () {
    $comment_to_edit = null ;
    $track_id_to_edit = null ;
    $tracks_or_track_or_not = 'not' ;
    return view('test',compact('tracks_or_track_or_not'));
//    return action([UsersController::class,'index']);

});



/*
    GET /projects (index)
    GET /projects/create (create)
    GET /projects/1 (show)
    POST /projects (store)
    GET /projects/1/edit (edit)
    PATCH /projects/1 (update)
    DELETE /projects/1 (destroy)


    Route::get('/projects', 'UsersController@index');//GET/expenses
    Route::get('/projects/create', 'UsersController@create');//GET/add_expense
    Route::get('/projects/{project_id}', 'UsersController@show');//GET/specific expense
    Route::post('/projects', 'UsersController@store');//POST/add_expense form
    Route::get('/projects/{project_id}/edit', 'UsersController@edit');//GET/edit_expense
    Route::patch('/projects/{project_id}', 'UsersController@update');//PATCH/edit_expense form
    Route::delete('/projects/{project_id}', 'UsersController@destroy');//DELETE/specific expense form
                    ==
    Route::resource('projects','UsersController')
*/

Route::resource('users', 'UsersController')/*->middleware('auth')->except('create','store')*/;
Route::post('/users/process_sign_in', 'UsersController@process_sign_in');
Route::post('/users/process_sign_out', 'UsersController@process_sign_out')->middleware('auth');
Route::get('/users/{user_id}/about', 'UsersController@about')->middleware('auth');
Route::get('/users/{user_id}/settings', 'UsersController@settings')->middleware('auth');
Route::get('/users/{user_id}/about_to_edit', 'UsersController@about_to_edit')->name('khaled')->middleware('auth');
Route::get('/users/terms_of_conditions', 'UsersController@termsOfConditions');
Route::get('sign_in/{service}', 'UsersController@redirectToProvider');
Route::get('sign_in/{service}/callback', 'UsersController@providerCallback');



Route::resource('tracks', 'TracksController')->middleware('auth');
Route::POST('/tracks/search/{user_id}', 'TracksController@search' )->middleware('auth') ;
Route::POST('/tracks/report/{user_id}', 'TracksController@reportTrack' )->middleware('auth') ;


Route::resource('comments', 'CommentsController')->middleware('auth');

Route::resource('messages', 'MessagesController')->middleware('auth');

Route::resource('notifications', 'NotificationsController')->middleware('auth');
Route::resource('commentLoves', 'CommentLovesController')->middleware('auth');
Route::resource('trackLoves', 'TrackLovesController')->middleware('auth');

Route::resource('chats', 'ChatsController')->middleware('auth');
Route::get('/chats/get_chat_by_user/{user_id}', 'ChatsController@getChatByUser')->middleware('auth');
Route::get('/chats/prepare_and_create/{user_id}', 'ChatsController@prepareAndCreate')->middleware('auth');
Route::get('/chats/create/for_first_time/{user_id}', 'ChatsController@createForFirstTime')->middleware('auth');
Route::post('/chats/store/for_first_time', 'ChatsController@storeForFirstTime')->middleware('auth');


Route::resource('friends', 'FriendsController')->middleware('auth');
Route::get('/friends/followers/{user_id}', 'FriendsController@followers')->middleware('auth');
Route::get('/friends/following/{user_id}', 'FriendsController@followings')->middleware('auth');


Route::get('/', function () {
    $lastId='';

    if(request()->ajax()){
        if(request()->last_id > 0){

            $tracks = DB::table('tracks')
                ->where('id','>',request()->last_id)
                ->limit(10)
                ->get();
        }else{

//            $tracks = DB::table('tracks')
//                ->orderBy('id','DESC')
//                ->limit(10)
//                ->get();
        }

        $output='';
        if(! $tracks->isEmpty()){
            foreach ($tracks as $track) {
                $output .= '
                    <div id="track_container-' . $track->id . '" class="track_container flex-container-column-wrap">
                        <div class="track" id="track-' . $track->id . '">
                            <div class="track-menu">
                                <img class="track-menu-more" src="/images/more.png" alt="">
                                <div class="track-menu-wrapper">';
                if (auth()->id() == $track->user_id) {
                    $output .= '
                                        <span class="track-menu-wrapper-item">
                                            <a href="/tracks/' . $track->id . '/edit">Edit</a>
                                        </span>
                                        <span class="track-menu-wrapper-item">
                                            <form action="/tracks/' . $track->id . '" method="post">';
                    csrf_field();
                    method_field('delete');
                    $output .= '
                                                <input type="submit" value="Delete">
                                            </form>
                                        </span>
                                        ';
                }
                if (auth()->id() != $track->user_id) {
                    $output .= '
                                        <span class="track-menu-wrapper-item" id="track-menu-wrapper-item-report-' . $track->id . '">
                                            <a href="#track-report-container-' . $track->id . '">Report</a>
                                        </span>
                                        ';
                }
                $output .=
                    '</div>
                            </div>
                                    <h3 class="track-name flex-item-row-wrap">
                                        <a class="track-name-link" href="/tracks/' . $track->id . '">
                                            ' . $track->file_name . '
                                        </a>
                                    </h3>
                                    <a href="/tracks/' . $track->id . '" class="track-created_at">
                                        ' . date("Y-m-d h:i:sa", strtotime($track->created_at)) . '
                                    </a>

                            <div class="flex-container-row-no_wrap">
                                <div class=" track-first_section flex-container-column-wrap" >
                                    <a href="/users/' . $track->id . '">
                                        <img src="/storage/uploads/profile_pictures/' . App\User::findorfail($track->user_id)->profile_picture . '" alt="User photo" class="track-first_section-photo">
                                    </a>
                                    <span class="track-owner-user_name"><a class="track-first_section-user_name-link" href="/users/' . App\User::findorfail($track->user_id)->id . '">' . App\User::findorfail($track->user_id)->full_name() . '</a></span>
                                </div>
                                <div class="track-second_section flex-container-column-wrap">

                                    <div class="track-upper_buttons flex-container-row-wrap">
                                        <img src="/images/media_addtoplaylist_btn.png" alt="addtoplaylist" class="flex-item-row-wrap track-upper_buttons-icon add_to_play_list" id="add_to_play_list">
                                        <img src="/images/media_mute_btn.png" alt="mute" class="flex-item-row-wrap track-upper_buttons-icon mute" id="mute">
                                    </div>
                                    <div class="track-volume flex-container-row-no_wrap">
                                        <span class="volume_start" id="volume_start"></span>
                                        <input class="track-volume-volume volume"  type="range" value="" name="volume" id="volume">
                                        <span class="volume_end" id="volume_end"></span>
                                    </div>
                                    <div class="track-down_buttons flex-container-row-wrap">
                                        <img src="/images/media_back_btn.png" alt="last track" class="flex-item-row-wrap track-down_buttons-icon last_track" id="last_track">
                                        <img src="/images/media_backward_btn.png" alt="back 5 sec" class="flex-item-row-wrap track-down_buttons-icon back_5_sec" id="back_5_sec">
                                        <img src="/images/media_play_btn.png" alt="play" data-src="/storage/uploads/tracks/' . $track->temp_name . '" class="flex-item-row-wrap track-down_buttons-icon play" id="play">
                                        <img src="/images/media_forward_btn.png" alt="next 5 sec"  class="flex-item-row-wrap track-down_buttons-icon next_5_sec" id="next_5_sec">
                                        <img src="/images/media_next_btn.png" alt="next track" class="flex-item-row-wrap track-down_buttons-icon next_track" id="next_track">
                                    </div>
                                    <div class="track-duration flex-container-row-no_wrap">
                                        <span class="duration_start" id="duration_start"></span>
                                        <input class="track-duration-duration duration" value="" type="range" name="volume" id="duration">
                                        <span class="duration_end" id="duration_end"></span>
                                    </div>
                                </div>
                                <div class="track-third_section flex-container-column-wrap">';
//                                    if(canILoveThisTrack($track) == -1){
//                                        $output.='
//                                        <img src="/images/unlove.png" alt="User photo" class="track-third_section-love_photo" id="love-track-'.$track->id.'">
//                                        <form method="POST" action="/trackLoves" class="">
//                                            '.csrf_field().'
//                                            <input hidden type="text" name="track_id" value="'. $track->id.'" required>
//                                            <input type="submit"  class="track-third_section-love_btn"  name="submit" value="Love">
//                                        </form>
//                                        ';
//                                    }else{
//                                        $output.='
//                                        <img src="/images/love.png" alt="User photo" class="track-third_section-unlove_photo" id="unlove-track-'.$track->id.'">
//                                        <form method="POST" action="/trackLoves/'.canILoveThisTrack($track).'" class="">
//                                            '.csrf_field().'
//                                            '.method_field('delete').'
//                                            <input type="submit"  class="track-third_section-love_btn"  name="submit" value="unLove">
//                                        </form>
//                                        ';
//                                    }
//                                    if($track->trackLoves()->count() > 0){
//                                        $output.='
//                                            <a class="track-loves" href="#track-loves-container-'.$track->id.'">'.$track->trackLoves()->count().' Love</a>
//
//                                        ';
//                                    }else{
//                                        $output.='
//                                            <a class="track-loves">'.$track->trackLoves()->count().' Love</a>
//
//                                        ';
//                                    }
                $output .=
                    '</div>
                            </div>
                            <div class="track-caption">
                                <textarea name="comment" id="caption" rows="3" readonly class="track-caption-input">' . $track->caption . '</textarea>
                            </div>
                        </div>

                    </div>

                <div id="track-comments-container-{{$track->id}}" class="track-comments-container flex-container-column-wrap" > ';
                $output .= '
                        <form method="POST" action="/comments" class="track-form-comment" id="add_comment-' . $track->id . '">
                            ' . csrf_field() . '
                            <div class="track-form-comment">
                                <table>
                                    <tr>
                                        <td>
                                            <a href="/users/' . auth()->id() . '">
                                                <img src="/storage/uploads/profile_pictures/' . auth()->user()->profile_picture . '" alt="User photo" class="track-comment-photo">
                                            </a>
                                        </td>
                                        <td  class="track-comment-user_name"><a class="track-comment-user_name-link" href="/users/' . auth()->user()->id . '">' . auth()->user()->full_name() . '</a></td>

                                        <td>&nbsp;</td>
                                        <td><input hidden type="text" name="track_id" value="' . $track->id . '" required></td>

                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><textarea name="comment"  cols="100" rows="3" required class="track-comment-text_area" placeholder="Write something constractive"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><input type="submit"  class="btn btn-comment-form" name="submit" value="ok"></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    ';
//                    if(($track->comments != null) && ($comment = $track->Last_comment)){
//                        $output.='
//                        <div class="track-comment" id="track_comment-'.$comment->id.'">
//                            <table>
//                                <tr>
//                                    <td><a href="/users/'.App\User::findorfail($comment->user_id)->id.'"><img src="/storage/uploads/profile_pictures/'.App\User::findorfail($comment->user_id)->profile_picture.'" alt="User photo" class="track-comment-photo"></a></td>
//                                    <td  class="track-comment-user_name"><a class="track-comment-user_name-link" href="/users/{{$comment->user_id}}">'.App\User::findorfail($comment->user_id)->full_name().'</a></td>';
//                                    if(auth()->id() == $comment->user_id){
//                                        $output.='
//                                            <td>&nbsp;</td>
//                                        ';
//                                    }
//                                    $output.='<td><input hidden type="text" name="user_id" value="'.$comment->user_id.'" required></td>
//                                </tr>
//                                <tr>
//                                    <td>';
//                                        if(canILoveThisComment($comment) == -1){
//                                            $output.='
//                                            <img src="/images/unlove.png"  class="track-comment-love_pic">
//                                            <a href="" class="track-comment-love">
//                                                <form method="POST" action="/commentLoves" class="">
//                                                    '.csrf_field().'
//                                                    <input hidden type="text" name="comment_id" value="'.$comment->id.'" required>
//                                                    <input type="submit"  class="btn-comment-form-love" name="submit" value="Love">
//                                                </form>
//                                            </a>
//                                            ';
//                                        }else{
//                                            $output.='
//                                            <img src="/images/love.png" class="track-comment-love_pic">
//                                            <form method="POST" action="/commentLoves/'.canILoveThisComment($comment).'" class="">
//                                                '.csrf_field().'
//                                                '.method_field('delete').'
//                                                <input type="submit"  class="btn-comment-form-love" name="submit" value="unLove">
//                                            </form>
//                                            ';
//                                        }
//                                    $output.=
//                                    '</td>
//
//                                    <td><textarea name="comment"  cols="100" rows="3" readonly class="track-comment-text_area">{{$comment->comment}}</textarea></td>';
//                                    if(auth()->id() == $comment->user_id){
//                                        $output.='
//                                        <td>
//                                            <a href="/comments/'.$comment->id.'/edit" class="btn-comment-form" >Edit</a>
//                                        </td>
//                                        ';
//                                    }
//                                $output.=
//                                '</tr>
//                                <tr>';
//                                    if($comment->commentLoves()->count() > 0){
//                                        $output.='<td><a class="track-comment-love"  href="#comment-loves-container-'.$comment->id.'">'.$comment->commentLoves()->count().' Love</a></td>';
//                                    }else{
//                                        $output.='<td><a class="track-comment-love">'.$comment->commentLoves()->count().' Love</a></td>';
//                                    }
//
//                                    $output.='<td class="track-comment-date">'.date("Y-m-d h:i:sa",strtotime($comment->created_at)).'</td>';
//                                    if(auth()->id() == $comment->user_id){
//                                        $output.='
//                                        <td>
//                                            <form method="post" action="/comments/'.$comment->id.'">
//                                                '.csrf_field().'
//                                                '.method_field('delete').'
//                                                <input type="submit" value="Delete" class="btn-comment-form" onclick="return confirm(\'Are you sure ?\');">
//                                            </form>
//                                        </td>
//                                        ';
//                                    }
//                                $output.='
//                                </tr>
//                            </table>
//                        </div>
//                        ';
//                    }
                $output.='
                    </div>
                ';

                $lastId = $track->id;
            }
            $output.='
                        <div class="master_view-show_more" id="master_view-show_more">
                            <button type="button" id="master_view-show_more-button" class="master_view-show_more-input"  data-last_id="'.$lastId.'">
                                Show More
                            </button>
                        </div>
                    ';
        }else{
            $output.= '
                    <div class="master_view-show_more" id="master_view-show_more">
                            <button type="button" class="master_view-show_more-input-no_more">
                                No More
                            </button>
                    </div>
                ';
        }
        echo $output;
    }else{
        $tracks = Track::latest()->simplePaginate(10)/*->sortByDesc('created_at')*/;
        $comment_to_edit = null ;
        $track_id_to_edit = null ;
        $tracks_or_track_or_not = 'tracks' ;
        foreach ($tracks as $track){
            $lastId = $track->id ;

        }
        return view('index',compact('tracks','comment_to_edit' ,'track_id_to_edit','tracks_or_track_or_not','lastId'));
    }
})->middleware('auth');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
