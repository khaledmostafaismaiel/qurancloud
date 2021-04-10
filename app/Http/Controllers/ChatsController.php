<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\StoreChatRequest;

class ChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = auth()->user()->chats();
        if(\request()->ajax()){
            echo view('AjaxRequests.chats',compact('chats'));
        }else{
            return view('GetRequests.chats',compact('chats'));
        }
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
    public function store(StoreChatRequest $request)
    {
        $chat = new Chat();
        $id = $chat->insertGetId([]);
        if ($id){
            $chat->from_user_id = auth()->id;
            $chat->to_user_id = $request->to_user_id;
            return $id;
        }else{
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
        $messages = $chat->messages;

        $chat_id = $chat->id;
        $to_user_id = $chat->from_user_id == auth()->id() ? $chat->to_user_id : $chat->from_user_id  ;
        Message::where('chat_id',$chat_id)->where('to_user_id',auth()->id())->where('is_read',0)->update(['is_read'=>1]);

        if(\request()->ajax()){
            $with_side_nav = \request('with_side_nav');
            if($with_side_nav){
                $chats = auth()->user()->chats();
                echo view('AjaxRequests.chat',compact('messages','chats','with_side_nav','chat_id','to_user_id'))->render();
                return;
            }
            echo view('layouts.Chat.message_section',compact('messages','chats','with_side_nav','chat_id','to_user_id'))->render();

        }else{
            $with_side_nav = 1;
            if($with_side_nav){
                $chats = auth()->user()->chats();
            }
            return view('GetRequests.chat',compact('messages','chats','with_side_nav','chat_id','to_user_id'));
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
