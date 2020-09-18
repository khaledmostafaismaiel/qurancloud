<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('messages');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate  = $request->validate([
            'chat_id'=> ['required'] ,
            'to_user_id'=> ['required'] ,
            'body'=> ['required'] ,
        ]);


//        if (! $request->chat_id){
//            $chat = new \App\Http\Controllers\ChatsController();
//            $chat_id = $chat->store(new Request());
//
//        }else{
//            $chat_id = $request->chat_id ;
//        }
        $message = new Message();
        if($message->create([
            'chat_id'=>$request->chat_id,
            'from_user_id'=>\auth()->id(),
            'to_user_id'=>$request->to_user_id,
            'body'=>$request->body,
        ])) {

            session()->flash('message', 'Done');
//            broadcast(new MessageSent($message->load('user')))->toOthers();
            return back();
        }else{
            session()->flash('message','Sorry');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Message $messages)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $messages)
    {
        dd("edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $messages)
    {
        dd("update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $messages)
    {
        dd("destroy");
    }


}
