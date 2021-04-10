<?php

namespace App\Http\Controllers;

use App\country;
use App\Gender;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User ;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\StoreUserRequest;
use App\Jobs\SendUserSignedupEmailJob;
use Intervention\Image\ImageManagerStatic as Image;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/auth/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if($request->gender == USER_GENDER_MALE){
            $default_profile_pic = "default_male_profile_picture.png" ;
        }else{
            $default_profile_pic = "default_female_profile_picture.png" ;
        }

        $user = new User() ;
        if($user->create([
            'first_name'=>  $request->first_name ,
            'second_name'=>  $request->second_name,
            'user_name'=> $request->user_name,
            'hashed_password'=>  bcrypt($request->password),
            'gender'=> $request->gender,
            'profile_picture'=>  $default_profile_pic,

        ])){
            if(\Auth::attempt(['user_name' => request('user_name'), 'password' => request('password')])) {
                dispatch((new SendUserSignedupEmailJob(auth()->user()))->delay(Carbon::now()->addSeconds(10)));
                return redirect('/');
            }

        }
        return redirect('/users/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorfail($id) ;
        $tracks = $user->tracks;

        if (\request()->ajax()){
            echo view('AjaxRequests.profile' , compact('user','tracks'))->render();
        }else{
            return view('GetRequests.profile' , compact('user','tracks'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


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
        if($request->ajax()){
            if($request->can_edit == "first_name" ){
                auth()->user()->first_name = $request->newEdit ;
            }
            elseif ($request->can_edit == "second_name"){
                auth()->user()->second_name = $request->newEdit ;
            }
            elseif ($request->can_edit == "from") {
                auth()->user()->from = $request->newEdit;
            }
            elseif ($request->can_edit == "lives") {
                auth()->user()->lives = $request->newEdit ;
            }
            elseif ($request->can_edit == "study") {
                auth()->user()->study = $request->newEdit ;
            }
            elseif ($request->can_edit == "work") {
                auth()->user()->work = $request->newEdit ;
            }
            elseif ($request->can_edit == "gender") {
                auth()->user()->gender = $request->newEdit ;
            }
            auth()->user()->update();
        }else{
            if ($request->cover_picture) {
                \request()->validate([
                        'cover_picture' =>  'required|image|mimes:jpeg,png,jpg,|max:20048',
                    ]
                );
                if ($request->hasFile('cover_picture')) {
                    if(\auth()->user()->cover_picture != "default_cover_picture.jpg"){
                        unlink(storage_path('app/public/uploads/cover_pictures/'.\auth()->user()->cover_picture));
                    }
                    $file_name_with_extention = $request->file('cover_picture')->getClientOriginalName();
                    $file_name = pathinfo($file_name_with_extention, PATHINFO_FILENAME);
                    $extention = $request->file('cover_picture')->getClientOriginalExtension();

                    $temp_name = generateRandomString().".".$extention;
                    $path = $request->file('cover_picture')->storeAs('public/uploads/cover_pictures', $temp_name);

                    auth()->user()->cover_picture = $temp_name ;
                    auth()->user()->update();
                }
                return redirect('/');
            }
            elseif ($request->profile_picture) {
                \request()->validate([
                        'profile_picture' => 'required|image|mimes:jpeg,png,jpg,|max:20048',
                    ]
                );
                if ($request->hasFile('profile_picture')) {
                    if(\auth()->user()->profile_picture != "default_profile_picture.png"){
                        unlink(storage_path('app/public/uploads/profile_pictures/'.\auth()->user()->profile_picture));
                    }

                    $file_name_with_extention = $request->file('profile_picture')->getClientOriginalName();
                    $file_name = pathinfo($file_name_with_extention, PATHINFO_FILENAME);
                    $extention = $request->file('profile_picture')->getClientOriginalExtension();

                    $temp_name = generateRandomString().".".$extention;
                    $path = $request->file('profile_picture')->storeAs('public/uploads/profile_pictures', $temp_name);

                    auth()->user()->profile_picture = $temp_name ;
                    auth()->user()->update();
                }
                return redirect('/');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function process_sign_in()
    {
        // \Auth::attempt(['user_name' => '', 'password' => '']) not working yet
        // \Hash::check('plain', 'hashed')
        // \Auth::login($user)
        // \Auth::setUser($user)
        // \Auth::logout()
        if(\Auth::attempt(['user_name' => \request('user_name'), 'password' => \request('password')])){
            return redirect('/');
        }else{
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
        $user = User::findorfail($user_id);
        $countries = country::all();
        $genders = gender::all();
        if(\request()->ajax()){
            echo view("AjaxRequests.about" , compact('user','countries','genders'));
        }else{
            return view("GetRequests.about" , compact('user','countries','genders'));
        }
    }

    public function about_to_edit()
    {
        $user = \auth()->user();
        $countries = country::all();
        $genders = gender::all();
        $about_to_edit = 1;
        if(\request()->ajax()){
            echo view("AjaxRequests.about" , compact('user','countries','genders','about_to_edit' ));
        }else{
            return view("GetRequests.about" , compact('user','countries','genders' ,'about_to_edit'));
        }
    }

    public function settings()
    {
        if(\request()->ajax()){
            echo view("AjaxRequests.settings");
        }else{
            return view("GetRequests.settings");
        }
    }

    public function privacy()
    {
        if(\request()->ajax()){
            echo view("AjaxRequests.privacy");
        }else{
            return view("GetRequests.privacy");
        }
    }
    public function security()
    {
        if(\request()->ajax()){
            echo view("AjaxRequests.security");
        }else{
            return view("GetRequests.security");
        }
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

            $first_name = $newUser->first_name = $fullName[0] ;
            $second_name = $newUser->second_name = $fullName[1] ;
            $user_name = $newUser->user_name = $socialUser->email ;

            $complete_sign_up = true;

//            $url = $socialUser->avatar;
//            $cover = file_get_contents($url);
//            $filename = generateRandomString();
//            Image::make($cover)->save(public_path('/upload/profile_pictures/' . $filename . '.jpg'));
            return view('auth.login',compact('first_name','second_name','user_name','complete_sign_up'));
//            $newUser->hashed_password = bcrypt("12345678");
//            $newUser->save();
//            Auth::login($newUser);
//            dispatch((new SendUserSignedupEmailJob(auth()->user()))->delay(Carbon::now()->addSeconds(10)));
//            return redirect('/');
        }
    }


}

