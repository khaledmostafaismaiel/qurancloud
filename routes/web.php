<?php

use App\Track;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\User;
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
    return view('test');
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
Route::post('/tracks/report/{user_id}', 'TracksController@reportTrack' )->middleware('auth') ;
Route::get('/tracks/get_track_info/{track_id}', 'TracksController@getTrackInfo' )->middleware('auth') ;


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

Route::resource('live_search', 'LiveSearchController')->middleware('auth');
Route::get('/live_search/search/tracksAndUsers', 'LiveSearchController@search')->middleware('auth');


Route::get('/', function () {
    $lastId='';

    if(request()->ajax()){
        if(request()->last_id > 0){

            $tracks = DB::table('tracks')
                ->where('id','<',request()->last_id)
                ->limit(1)
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

<div class="col mb-4">
    <div class="card h-100 text-center border-info track">
        <table class="mt-3">
            <tr>
                <td class="">
                    <a href="/users/'.$track->id.'">
                        <img src="/storage/uploads/profile_pictures/'.User::findorfail($track->user_id)->profile_picture.'" class="card-img-top mb-1 track-track_owner-pic" alt="...">
                    </a>
                    <a class="track-track_owner-name" href="/users/'.User::findorfail($track->user_id)->id.'">
                        '.User::findorfail($track->user_id)->full_name().'
                    </a>
                </td>
                <td class="">
                    <div class="dropdown">
                        <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropDownMenuButton-'.$track->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropDownMenuButton-'.$track->id.'">
                            ';
                            if(auth()->id() == $track->user_id){

                                $output .='<span class="dropdown-item">';

                                $output.= '<a href="/tracks/'.$track->id.'/edit" class="btn btn-info w-100">Edit</a>
                                </span>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-item">
                                    //<!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger  w-100" data-toggle="modal" data-target="#delete_track-'.$track->id.'">
                                        Delete
                                    </button>

                                    //<!--I Used Delete Track Modal at the bottom of track.blade.php because there are issues if i put it here
                                    //    because in the documentation of modal the say " Nested modals aren’t supported as we believe them to be poor user experiences."
                                    //    -->
                                </span>
                                ';
                            }else{

                                //<!-- Button trigger modal -->
                                $output.='
                                <button type="button" class="btn btn-warning w-100" data-toggle="modal" data-target="#track-report-'.$track->id.'">
                                    Report
                                </button>
                                ';
                                //<!--I Used Track Report Modal at the bottom of track.blade.php because there are issues if i put it here
                                //    because in the documentation of modal the say " Nested modals aren’t supported as we believe them to be poor user experiences."
                                //    -->

                            }
                            $output.='
                        </div>
                    </div>

                </td>
            </tr>
            <tr class="">
                <td class="track-created_at">
                    '.date("Y-m-d h:i:sa",strtotime($track->created_at)).'
                </td>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>

        <div class="card-body">
            <a href="/tracks/'.$track->id.'" class="track-track_name">
                <h4 class="card-title text-white">'.$track->file_name.'</h4>
            </a>
            <div class="">
                <div class="track-down_buttons flex-container-row-no_wrap">
                    <img src="/images/media_play_btn.png" alt="play" data-src="/storage/uploads/tracks/'.$track->temp_name.'" data-track_id="'.$track->id.'" class="flex-item-row-wrap track-down_buttons-icon play" id="play">
                </div>
            </div>
            <p class="card-text text-white">'.$track->caption.'</p>

        </div>
        <div class="card-footer bg-transparent border-info d-flex justify-content-around align-items-center">
            ';

                if(canILoveThisTrack($track) == -1){

                $output.='
                <img src="/images/unlove.png" alt="User photo" class="track-love_photo" id="track-love_photo-'.$track->id.'" data-id="'.$track->id.'">
                <form method="POST" action="/trackLoves" class="">
                    '.csrf_field().'
                    <input hidden type="text" name="track_id" value="'.$track->id.'" required>
                    <input type="submit"  class="btn btn-danger"  name="submit" value="Love">
                </form>
                  ';
            }else{

                $output.='
                <img src="/images/love.png" alt="User photo" class="track-unlove_photo" id="track-unlove_photo-'.$track->id.'" data-id="'.$track->id.'">
                <form method="POST" action="/trackLoves/'.canILoveThisTrack($track).'" class="">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <input type="submit"  class="btn-warning"  name="submit" value="unLove">
                </form>
                ';

            }
//                <!-- Button trigger modal -->
            $output.='
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#track-loves-'.$track->id.'">
                <span class="" id="track_loves-'.$track->id.'">'.$track->trackLoves()->count().'</span><span> Love</span>
            </button>

            <div class="modal fade" id="track-loves-'.$track->id.'" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="track-loves-Label-'.$track->id.'" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="track-loves-Label-'.$track->id.'">'.$track->trackLoves()->count().' Loves</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            ';
                            foreach($track->trackLoves as $love){
                                $output.='
                                <div class="col mb-5">
                                    <div class="">
                                        <a href="/users/'.$love->user_id.'">
                                            <img src="/storage/uploads/profile_pictures/'.User::findorfail($love->user_id)->profile_picture.'" alt="User photo" class="track-comment-photo">
                                        </a>
                                    </div>
                                    <div class="">
                                        <a href="/users/'.User::findorfail($love->user_id)->id.'" class="">
                                            '.User::findorfail($love->user_id)->full_name().'
                                        </a>
                                    </div>
                                    <div class="">
                                        <span class="text-dark">'.date("Y-m-d h:i:sa",strtotime($love->created_at)).'</span>
                                    </div>
                                </div>

                                ';
                            }
                            $output.='
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="track-loves-popup" class="btn btn-success btn-block" data-last_id="" data-user_id="">Show More</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>





//<!--Track Report Modal -->
<div class="modal fade" id="track-report-'.$track->id.'" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="track-report-label-'.$track->id.'" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="track-report-label-'.$track->id.'">Report '.$track->file_name.'</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="/tracks/report/'.$track->id.'" method="post">
                    '.csrf_field().'
                    <div class="form-check">
                        <input type="radio" name="reason" value="1" class="form-check-input mt-3" id="not_quran-'.$track->id.'">
                        <label  class="form-check-label mt-3" for="not_quran-'.$track->id.'">Not Quran</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="reason" value="2" class="form-check-input mt-3" id="not_islamic_content-'.$track->id.'">
                        <label  class="form-check-label mt-3" for="not_islamic_content-'.$track->id.'">Not islamic content</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="reason" value="3" class="form-check-input mt-3" id="other-'.$track->id.'">
                        <label class="form-check-label mt-3" for="other-'.$track->id.'">other</label>
                    </div>
                    <input type="submit" value="report" class="btn btn-warning w-100 mt-3">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



//<!-- Delete Track Modal -->
<div class="modal fade" id="delete_track-'.$track->id.'" tabindex="-1" aria-labelledby="delete_track-Label-'.$track->id.'" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_track-Label-'.$track->id.'">Delete Track ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You can edit the caption if you just need to change something.
            </div>
            <div class="modal-footer">
                <form action="/tracks/'.$track->id.'" method="post">
                    '.csrf_field().'
                    '.method_field('delete').'
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" value="delete" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


                ';

                $lastId = $track->id;
            }
            $output.='
                    <div class="master_view-show_more" id="master_view-show_more">
                        <button type="button" id="master_view-show_more-button-tracks-index" class="btn btn-success "  data-last_id="'.$lastId.'">
                            Show More
                        </button>
                    </div>
                    ';
        }else{
            $output.= '
                    <div class="master_view-show_more">
                        <button type="button"  class="btn btn-danger">
                            No More
                        </button>
                    </div>
                ';
        }
        echo $output;
    }else{
        $tracks = Track::latest()->simplePaginate(8)/*->sortByDesc('created_at')*/;
        foreach ($tracks as $track){
            $lastId = $track->id ;

        }
        return view('index',compact('tracks' ,'lastId'));
    }
})->middleware('auth');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
