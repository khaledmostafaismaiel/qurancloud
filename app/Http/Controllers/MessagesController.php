<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;
use Pusher\Pusher;
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
    public function store(StoreMessageRequest $request)
    {
        if($request->ajax()){
            $message = new Message();
            $message->chat_id = $request->chat_id;
            $message->from_user_id = auth()->id() ;
            $message->to_user_id = $request->to_user_id;
            $message->body = $request->body;
            $message->is_read = 0;
            $message->created_at = now();
            $message->save();
            $chat = Chat::findOrfail($request->chat_id);
            $chat->updated_at = now();
            $chat->save();

            $options = array(
               'cluster'=>env('PUSHER_APP_CLUSTER'),
                'useTLS'=>true
            );
            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );
            $data = [
                'chat_id' => $request->chat_id,
                'from_user_id'=>auth()->id(),
                'to_user_id'=>$request->to_user_id,
                'message_from_me'=> view('layouts.Chat.message_from_me',compact('message'))->render(),
                'message_to_me'=>view('layouts.Chat.message_to_me',compact('message'))->render()
            ];

            $pusher->trigger('chat', 'new-message', $data);

            return response()->json([
                'status'=>"success"
            ]);

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
