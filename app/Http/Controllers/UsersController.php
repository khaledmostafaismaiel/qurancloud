<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Mail\UserSignedup;
use App\Track;
use Illuminate\Http\Request;
use App\User ;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tracks_or_track_or_not = 'not';

        return view('/auth/login',compact('tracks_or_track_or_not'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = request()->validate(
            [
                'first_name'=> ['required' , 'min:2'] ,
                'second_name'=> ['required' , 'min:2' ] ,
                'user_name'=> ['required' , 'min:3' ] ,
                'password'=> ['required' , 'confirmed' , 'min:8'] ,
//                'gender'=> ['required'] ,
                'not_robot'=> ['required' ] ,
                'terms_of_conditions'=> ['required' ] ,

            ]
        );

//        if($request->gender == 'male'){
//            $default_profile_pic = "default_man_profile_picture.png" ;
//        }elseif ($request->gender == 'female'){
//            $default_profile_pic = "default_woman_profile_picture.png" ;
//        }else{
//            return back() ;
//        }

        $user = new User() ;
        if($user->create([
            'first_name'=>  trim(request('first_name')) ,
            'second_name'=>  trim(request('second_name')),
            'user_name'=>  strtolower(trim(request('user_name'))),
            'hashed_password'=>  bcrypt(request('password')),
//            'gender'=>  strtolower(trim(request('gender'))),
//            'profile_picture'=>  $default_profile_pic,

        ])){

            session()->flash('message','Welcome');

            if(\Auth::attempt(['user_name' => request('user_name'), 'password' => request('password')])){
                session()->flash('message','Welcome');
//                session(['authUser'=>\auth()->user()]);
                Mail::to(env('OWNER_EMAIL'))->queue(
                    new UserSignedup(\auth()->user())
                );
                return redirect('/');
            }else{
                session()->flash('message','Sorry Try Again');
                return redirect('/users/create');
            }
        }else{
            session()->flash('message','Sorry Try Again');
            return redirect('/users/create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        dd(auth()->user());
        $user = User::findorfail($id) ;

        $tracks = new Track() ;
        $tracks = $user->tracks()->simplePaginate(1) ;

        $comment_to_edit = null;//because profile includes track_comment and there are more than one .blade include track_comment

        $lastId = null;
        foreach ($tracks as $track){
            $lastId = $track->id;
        }

        return view('profile' , compact('user','tracks','comment_to_edit','lastId'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = new User() ;
        $user = User::findorfail($id);

        $can_edit = \request('can_edit') ;
        $tracks_or_track_or_not = 'not';
        return view("about_to_edit" , compact('user' ,'can_edit','tracks_or_track_or_not'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);

        if($request->first_name){
            $user->first_name = strtolower($request->first_name) ;
            if($user->update()){
                session()->flash('message','Welcome');
            }

        }
        elseif ($request->second_name){
            $user->second_name = strtolower($request->second_name) ;
            if($user->update()){
                session()->flash('message','Welcome');
            }
        }
        elseif ($request->from) {
            $user->from = strtolower($request->from);
            if ($user->update()) {
                session()->flash('message', 'Welcome');
            }
        }
        elseif ($request->lives) {
            $user->lives = strtolower($request->lives) ;
            if($user->update()){
                session()->flash('message','Welcome');
            }
        }
        elseif ($request->study) {
            $user->study = strtolower($request->study) ;
            if($user->update()){
                session()->flash('message','Welcome');
            }
        }
        elseif ($request->work) {
            $user->work = strtolower($request->work) ;
            if($user->update()){
                session()->flash('message','Welcome');
            }
        }
        elseif ($request->gender) {
            $user->gender = strtolower($request->gender) ;
            if($user->update()){
                session()->flash('message','Welcome');
            }

        }
        elseif ($request->cover_picture) {
            \request()->validate([
                    'cover_picture' => 'required',
                ]
            );
            if ($request->hasFile('cover_picture')) {

                $file_name_with_extention = $request->file('cover_picture')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_extention, PATHINFO_FILENAME);
                $extention = $request->file('cover_picture')->getClientOriginalExtension();
//                if ($extention != "jpg") {
//                    session()->flash('message','Sorry Try another extention');
//                    return back() ;
//                }
                $temp_name = generateRandomString().".".$extention;
                $path = $request->file('cover_picture')->storeAs('public/uploads/cover_pictures', $temp_name);

                $user->cover_picture = $temp_name ;
                if($user->update()){
                    session()->flash('message','Done');
                }
            }
        }
        elseif ($request->profile_picture) {
            \request()->validate([
                    'profile_picture' => 'required',
                ]
            );
            if ($request->hasFile('profile_picture')) {
                if(\auth()->user()->profile_picture != "default_profile_picture.png"){
//                    unlink(storage_path('uploads/profile_pictures/'.\auth()->user()->profile_picture));
                }

                $file_name_with_extention = $request->file('profile_picture')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_extention, PATHINFO_FILENAME);
                $extention = $request->file('profile_picture')->getClientOriginalExtension();
//                if ($extention != "jpg") {
//                    session()->flash('message','Sorry Try another extention');
//                    return back() ;
//                }
                $temp_name = generateRandomString().".".$extention;
                $path = $request->file('profile_picture')->storeAs('public/uploads/profile_pictures', $temp_name);

                $user->profile_picture = $temp_name ;
                if($user->update()){
                    session()->flash('message','Welcome');
                }
            }

        }else{
            session()->flash('message','Sorry Try Again');

        }

        $can_edit = null ;
        return redirect('/users/'.$id.'/about_to_edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd("destroy");

    }

    public function process_sign_in()
    {
        // \Auth::attempt(['user_name' => '', 'password' => '']) not working yet
        // \Hash::check('plain', 'hashed')
        // \Auth::login($user)
        // \Auth::setUser($user)
        // \Auth::logout()
        if(\Auth::attempt(['user_name' => \request('user_name'), 'password' => \request('password')])){
            session()->flash('message','Welcome');
            return redirect('/');
        }else{
            session()->flash('message','Sorry Try Again');
            return redirect('/users/create');
        }
    }

    public function process_sign_out()
    {
        auth()->logout();

        return redirect('/users/create');
    }

    public function about($user_id)
    {
        $user = new User() ;
        $user = User::findorfail($user_id);
        $tracks_or_track_or_not = 'not';
        return view("about" , compact('user' , 'tracks_or_track_or_not'));
    }

    public function about_to_edit($user_id)
    {
        if(auth()->id() == $user_id){
            $user = new User() ;
            $user = User::findorfail($user_id);
            $can_edit = null ;
            $tracks_or_track_or_not = 'not' ;
            return view("about_to_edit" , compact('user' ,'can_edit','tracks_or_track_or_not'));
        }else{
            return back() ;
        }
    }

    public function settings($user_id)
    {
        $user = new User() ;
        $user = User::findorfail($user_id);
        $tracks_or_track_or_not = 'not';
        return view("settings",compact('user','tracks_or_track_or_not'));
    }

    public function termsOfConditions()
    {
        dd("termsOfConditions");
        return view("terms_of_conditions");
    }



    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function providerCallback($service)
    {
        $socialUser = Socialite::driver($service)->stateless()->user();

        // $socialUser->token;
//        $findUser = User::where('user_name',$socialUser->email);
        $findUser = \Auth::attempt(['user_name' => $socialUser->email , 'password' => "12345678"]) ;
        if($findUser){
            return redirect('/');

        }else{
            $newUser = new User() ;

            $fullName = explode(" ",$socialUser->name);

            $newUser->first_name = $fullName[0] ;
            $newUser->second_name = $fullName[1] ;
            $newUser->user_name = $socialUser->email ;
            $newUser->hashed_password = bcrypt("12345678");
            $newUser->save();
            Auth::login($newUser);
//            session(['authUser'=>\auth()->user()]);
            Mail::to(env('OWNER_EMAIL'))->queue(
                new UserSignedup(\auth()->user())
            );
            return redirect('/');
        }
    }

}

