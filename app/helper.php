<?php
//
//    function sql_sanitize($value){
//
//        if(function_exists("mysqli_real_escape_string")){
//            // PHP >= V 4.3.0
//            if(get_magic_quotes_gpc()){
//                $value = stripslashes($value);
//                $value = mysqli_real_escape_string($value);//to prevent sql injection
//            }
//        }else{
//            if(!get_magic_quotes_gpc()){
//                $value = addslashes($value);
//            }
//        }
//
//        return $value ;
//    }
//
//    function html_sanitize($string){
//
//        return $string = htmlentities($string) ;
//    }
//
//    function encode_url($string){
//
//        return $string = urlencode($string) ;
//    }
//
//    function decode_url($string){
//
//        return $string = urldecode($string) ;
//    }

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

    function chatOwner($firstUser,$secondUser){
        if($firstUser < $secondUser){
            return $firstUser;
        }else{
            return $secondUser;
        }
    }
