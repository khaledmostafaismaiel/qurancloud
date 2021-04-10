<?php
    function get_script_name(){
        $script_name = str_replace("/index.php","",$_SERVER['PHP_SELF']) ;
        $script_name = str_replace(".php","",$script_name) ;
        $script_name = str_replace("_"," ",$script_name) ;

        return $script_name ;
    }

    function generateRandomString($length = 10) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $length; $i++) {
            $randstring .= $characters[rand(0, strlen($characters)-1)];
        }

        $randdate = time("Y-m-d-H-i-s");

        $temp_token = $randstring.$randdate ;

        return$temp_token ;
    }

    function canILoveThisTrack($track)
    {
        foreach ($track->trackLoves as $love) {
            if ($love->user_id === auth()->id()) {
                return $love->id;
            }
        }
        return -1 ; //true
    }

    function canILoveThisComment($comment)
    {
        foreach ($comment->commentLoves as $love) {
            if ($love->user_id === auth()->id()) {
                return $love->id;
            }
        }
        return -1 ; //true
    }

    function canIFollowThisUser($user)
    {
        foreach ($user->Followers as $follower) {
            if ($follower->follower_user_id === auth()->id()) {
                return $follower->id;
            }
        }
        return -1 ; //true
    }

    function chatOwner($firstUser,$secondUser){
        if($firstUser < $secondUser){
            return $firstUser;
        }else{
            return $secondUser;
        }
    }
