<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $messages = DB::table('messages')
            ->where('from_user_id','=',auth()->id())
            ->orWhere('to_user_id','=',auth()->id())
            ->get();
        $chats_id = array() ;
        foreach ($messages as $message){
            if (! in_array($message->chat_id,$chats_id)){
                $chats_id[] = $message->chat_id;
            }
        }

        $chats = array();
        foreach ($chats_id as $id){
            $chats[] = Chat::findorfail($id);
        }
        $tracks_or_track_or_not = "not";

        return view('chats',compact('chats','tracks_or_track_or_not'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chat = new Chat();
        $id = $chat->insertGetId([]);
        if ($id){
            session()->flash('message','Done');
            return $id;
        }else{
            session()->flash('message','Sorry Try Again');
            return redirect('/users/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {

        $tracks_or_track_or_not = "not";
        $messages = $chat->messages;
        $to_user_id = null ;
        if ($chat->lastMessage()->to_user_id != auth()->id()){
            $to_user_id = $chat->lastMessage()->to_user_id ;
        }else{
            $to_user_id = $chat->lastMessage()->from_user_id ;
        }
        $chat_id = $chat->id;


        $messages__ = DB::table('messages')
            ->where('from_user_id','=',auth()->id())
            ->orWhere('to_user_id','=',auth()->id())
            ->get();
        $chats_id = array() ;
        foreach ($messages__ as $message){
            if (! in_array($message->chat_id,$chats_id)){
                $chats_id[] = $message->chat_id;
            }
        }

        $chats = array();
        foreach ($chats_id as $id){
            $chats[] = Chat::findorfail($id);
        }
        if (! empty($chats)){
            return view('chat',compact('messages','tracks_or_track_or_not','to_user_id','chat_id','chats'));

        }else{


        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }


    public function getChatByUser($user_id){
        if (Request()->ajax()){
            $message = DB::table('messages')
                ->where('from_user_id','=',auth()->id())
                ->Where('to_user_id','=',$user_id)
                ->orwhere('from_user_id','=',$user_id)
                ->Where('to_user_id','=',auth()->id())
                ->limit(1)
                ->get();

                $chat = null ;
                foreach ($message as $index){
                    $chat = Chat::findorfail($index->chat_id);
                }
            return $chat;
        }else{

        }

    }

    public function prepareAndCreate()
    {
        $tracks_or_track_or_not = "not";
        $chat_id = null ;
        $to_user_id = \request()->user_id;
        $messages = array() ;

        $messages__ = DB::table('messages')
            ->where('from_user_id','=',auth()->id())
            ->orWhere('to_user_id','=',auth()->id())
            ->get();
        $chats_id = array() ;
        foreach ($messages__ as $message){
            if (! in_array($message->chat_id,$chats_id)){
                $chats_id[] = $message->chat_id;
            }
        }

        $chats = array();
        foreach ($chats_id as $id){
            $chats[] = Chat::findorfail($id);
        }

        return view('chat',compact('messages','tracks_or_track_or_not','to_user_id','chat_id','chats'));
    }

    function createForFirstTime($user_id){
        $tracks_or_track_or_not = "not";
        $to_user_id = $user_id;

        $messages__ = DB::table('messages')
            ->where('from_user_id','=',auth()->id())
            ->orWhere('to_user_id','=',auth()->id())
            ->get();
        $chats_id = array() ;
        foreach ($messages__ as $message){
            if (! in_array($message->chat_id,$chats_id)){
                $chats_id[] = $message->chat_id;
            }
        }

        $chats = array();
        foreach ($chats_id as $id){
            $chats[] = Chat::findorfail($id);
        }
        return view('create_chat',compact('tracks_or_track_or_not','to_user_id','chats'));

    }
    function storeForFirstTime(){
        dd("hi");
        if (request()->ajax()){

            $chat_id = $this->store(new Request());
            $request__ = new Request();
            $request__['chat_id'] = $chat_id ;
            $request__['from_user_id'] = auth()->id() ;
            $request__['to_user_id'] = request()->to_user_id ;
            $request__['body'] = request()->body ;
            $message = new \App\Http\Controllers\MessagesController();
            $message->store($request__);
            return redirect('/chats/'.$chat_id);
        }else{

            $chat_id = $this->store(new Request());
            $request__ = new Request();
            $request__['chat_id'] = $chat_id ;
            $request__['from_user_id'] = auth()->id() ;
            $request__['to_user_id'] = \request()->to_user_id ;
            $request__['body'] = \request()->body ;
            $message = new \App\Http\Controllers\MessagesController();

            $message->store($request__);
            return redirect('/chats/'.$chat_id);
        }
    }
}
