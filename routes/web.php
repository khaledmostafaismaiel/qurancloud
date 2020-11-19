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

            $tracks = Track::
                where('id','<',request()->last_id)
                ->orderByDesc('id')
                ->limit(4)
                ->get();
        }else{

//            $tracks = Track::
//                where('id','>',request()->last_id)
//                ->limit(4)
//                ->get();
        }

        $output='';
        if(! $tracks->isEmpty()){

            foreach ($tracks as $track) {
                $output .= view('layouts.track',compact('track'))->render();
                $lastId = $track->id;
            }
            $output .= view('layouts.showmore-btns.show_more_index_tracks',compact('lastId'))->render();

        }else{
            $output .= view('layouts.showmore-btns.no_more_tracks')->render();

        }
        echo $output;
    }else{
        $tracks = Track::latest()->simplePaginate(4)/*->sortByDesc('created_at')*/;
        foreach ($tracks as $track){
            $lastId = $track->id ;
        }
        return view('index',compact('tracks' ,'lastId'));
    }
})->middleware('auth');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
