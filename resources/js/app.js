/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

import Echo from "laravel-echo"

window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});

window.Echo.join(`online`)
    .here((users) => {
        let userId = $('meta[name=user-id]').attr('content');
        users.forEach(function (user) {
            if (user.id != userId){
                if (get_chat_id_by_user_id(user)){
                    $('#online-users').append(`
                        <li id="user-${user.id}" class="chat-side-nav__item chat-side-nav__item--active">
                            <a href="/chats/prepare_and_create/${user.id}"  class="chat-side-nav__link">
                                <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
                                <span>${full_name(user)}</span>
                            </a>
                        </li>
                    `);
                }else{
                    $('#online-users').append(`
                        <li id="user-${user.id}" class="chat-side-nav__item chat-side-nav__item--active">
                            <a href="/chats/prepare_and_create/${user.id}" class="chat-side-nav__link">
                                <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
                                <span>${full_name(user)}</span>
                            </a>
                        </li>
                    `);
                }

            }
        })
    })
    .joining((user) => {
        if (get_chat_id_by_user_id(user)){
            $('#online-users').append(`
                <li id="user-${user.id}" class="chat-side-nav__item chat-side-nav__item--active">
                    <a href="/chats/prepare_and_create/${user.id}"  class="chat-side-nav__link">
                        <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
                        <span>${full_name(user)}</span>
                    </a>
                </li>
            `);
        }else{
            $('#online-users').append(`
                <li id="user-${user.id}" class="chat-side-nav__item chat-side-nav__item--active">
                    <a href="/chats/prepare_and_create/${user.id}"  class="chat-side-nav__link">
                        <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
                        <span>${full_name(user)}</span>
                    </a>
                </li>
            `);
        }
    })
    .leaving((user) => {
        $('#user-' + user.id).remove();
    });

$('#chat-text').keypress(function(event){
    if(event.which == 13){
        event.preventDefault();
        let body = $(this).val();
        if(! body){
            return;
        }

        let userProfilePic = $('meta[name=user-profile_pic]').attr('content');

        $(this).val('');
        $('#chat').append(`
            <div class="message-section-square-from_me">
                <spam class="message-section-square-from_me-profile_pic">
                    <img src="/storage/uploads/profile_pictures/${userProfilePic}" alt="User photo" class="chat-side-nav__item__user-photo">
                </spam>
                ${body}
            </div>
        `);
        let data = {
            '_token': $('meta[name=csrf-token]').attr('content'),
            body,
            'to_user_id': $('meta[name=to_user_id]').attr('content'),
            'chat_id':$('meta[name=chat_id]').attr('content'),

        }

        $.ajax({
            url:'/messages',
            method:'POST',
            data:data,
        })

    }
});

$('#chat-text-for_first_time').keypress(function(event){
    if(event.which == 13){
        event.preventDefault();
        let body = $(this).val();
        if (! body){
            return;
        }
        // $('#chat-text-for_first_time').validate({
        //     rules:{
        //         body:{
        //             required:true,
        //         }
        //     }
        // });

        let userProfilePic = $('meta[name=user-profile_pic]').attr('content');

        $(this).val('');
        $('#chat').append(`
            <div class="message-section-square-from_me">
                <spam class="message-section-square-from_me-profile_pic">
                    <img src="/storage/uploads/profile_pictures/${userProfilePic}" alt="User photo" class="chat-side-nav__item__user-photo">
                </spam>
                ${body}
            </div>
        `);
        let data = {
            '_token': $('meta[name=csrf-token]').attr('content'),
            body,
            'to_user_id': $('meta[name=to_user_id]').attr('content'),
        }

        console.log(data);

        $.ajax({
            url:'/chats/store/for_first_time',
            method:'POST',
            data:data,
        })

    }
});
window.Echo.channel('chat')
    .listen('MessageSent',(event)=>{
        $('#chat').append(`
            <div class="message-section-square-to_me">
                <spam class="message-section-square-to_me-profile_pic">
                    <img src="/storage/uploads/profile_pictures/${event.message.user.profile_picture}" alt="User photo" class="chat-side-nav__item__user-photo">
                </spam>
                ${event.message.body}
            </div>
        `);
    });











$("document").ready(function () {
    // $.ajaxSetup({
    //     headers:{
    //         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // $('.track-comments-container').css("display" , "none") ;

    $('#user-nav__friend_requests_box').on('click',toggleFriendRequests);
    $('#user-nav__messages_box').on('click',toggleMessages);
    $('#user-nav__notifications_box').on('click',toggleNotifications);

    $(document).on('click','#master_view-show_more-button-tracks-index',function(){
        console.log("hi");

        var last_id = $(this).data('last_id');
        $('#master_view-show_more-button-tracks-index').html('<b>Loadding...</b>');
        loadMoreIndexTracks(last_id);
    });
    $(document).on('click','#master_view-show_more-button-followers',function(){
        console.log("hi");

        var user_id = $(this).data('user_id');
        $('#master_view-show_more-button-followers').html('<b>Loadding...</b>');
        var last_id = $(this).data('last_id');
        loadMoreFollowers(user_id,last_id);
    });
    $(document).on('click','#master_view-show_more-button-followings',function(){
        console.log("hi");

        var user_id = $(this).data('user_id');
        $('#master_view-show_more-button-followings').html('<b>Loadding...</b>');
        var last_id = $(this).data('last_id');
        loadMoreFollowings(user_id,last_id);
    });

    $('.track-third_section-love_photo').click(loveTrack);

    $('.track-third_section-unlove_photo').click(unLoveTrack);




    // $('.track').click(function (event) {
    //     console.log(event.target);
    //     if (event.target != 'img'){
    //         $('#track-comments-container-'+ event.target.getAttribute('data-track_id')).slideToggle('normal');
    //     }
    // });



    // $('#icon-sign_out').on('click',signoutFun);

    // $('.track-third_section-unlove_photo').on('click',unLoveTrack);
    //
    // $('.track-third_section-unlove_photo').on('click',unLoveTrack);
    //
    // $('.track-third_section-unlove_photo').on('click',unLoveTrack);
    //
    // $('.track-third_section-unlove_photo').on('click',unLoveTrack);
    //
    // $('.track-third_section-unlove_photo').on('click',unLoveTrack);
    //
    // $('.track-third_section-unlove_photo').on('click',unLoveTrack);

});


function toggleFriendRequests() {
    if ( screen.width > 992 ){
        $('#friend_requests-box').toggle();
        $('#messages-box').css('display','none');
        $('#notifications-box').css('display','none');
    }else{

    }
}
function toggleMessages() {
    if ( screen.width > 992 ){
        $('#messages-box').toggle();
        $('#notifications-box').css('display','none');
        $('#friend_requests-box').css('display','none');
    }else{

    }
}
function toggleNotifications() {
    if ( screen.width > 992 ){
        $('#notifications-box').toggle();
        $('#friend_requests-box').css('display','none');
        $('#messages-box').css('display','none');
    }else{

    }
}

function loveTrack(event){
    console.log(event.target.id);
    $(this).attr('src','/images/love.png');
    $(this).removeClass('track-third_section-love_photo').addClass('track-third_section-unlove_photo');
    console.log(event);

}
function unLoveTrack(event){
    console.log(event.target.id);
    $(this).attr('src','/images/unlove.png');
    $(this).removeClass('track-third_section-unlove_photo').addClass('track-third_section-love_photo');
    console.log(event);

}

function successfun(result) {
    $('#endoftext').append(result);

}

function errorfun() {
    console.log("There are an error");
}

function getData() {
    $.get('',{
        url:"/",
        success:successfun,
        error:errorfun,
        complete:function (xhr,status) {
            console.log("the request is complete!");
        }
    });
}

function signoutFun() {
    var _token = $('input[name="_token"]').val();

    $.ajax({
        url:"/users/process_sign_out",
        method:'POST',
        data:{
            _token:_token
        },
    });
}

function loadMoreIndexTracks(last_id=""){
    $.ajax({
        url:"/",
        method:'GET',
        data:{
            last_id:last_id
        },
        success:function (tracks) {
            $('#master_view-show_more-button-tracks').remove();
            $('#master_view').append(tracks);
        }
    });
}
function loadMoreFollowers(user_id,last_id="") {
    $.ajax({
        url:"/friends/followers/"+ user_id,
        method:'GET',
        data:{
            last_id:last_id
        },
        success:function (followers) {
            $('#master_view-show_more-button-followers').remove();
            $('#table-loves-container').append(followers);
        }
    });
}

function loadMoreFollowings(user_id,last_id="") {
    $.ajax({
        url:"/friends/following/"+ user_id,
        method:'GET',
        data:{
            last_id:last_id
        },
        success:function (followings) {
            $('#master_view-show_more-button-followings').remove();
            $('#table-loves-container').append(followings);
        }
    });
}

function get_chat_id_by_user_id(user) {
    // $.ajax({
    //     url:"/chats/get_chat_by_user/"+ user.id,
    //     method:'GET',
    //     success:function (chat) {
    //         console.log(chat.id);
    //         return chat.id;
    //     }
    // });
}


function full_name(user) {
    return user.first_name +" "+ user.second_name ;
}


var songName ;
var audioPlayer ;

var trackMore = document.getElementsByClassName('track-more');
var trackMenuWrapper = document.getElementsByClassName('rack-menu-wrapper');

var toDisplay = 0 ;
for(var i=0 ; i < trackMore.length ; ++i){
    trackMore[i].addEventListener('click',function () {
        if(toDisplay == 1){
            console.log(toDisplay);
//
            trackMenuWrapper[i].style.display = 'block';
            toDisplay =  0 ;
        }else{
            console.log(toDisplay);
//
            trackMenuWrapper[i].style.display = 'none';
            toDisplay = 1 ;
//
        }
    });
}
//
//
//
var doMute = 1 ;
var doAddToPlaylist = 1 ;
//

//
//for volume
var volumeStart = document.getElementsByClassName('volume_start');
var volume = document.getElementsByClassName('volume');
var volumeEnd = document.getElementsByClassName('volume_end');
for(var i=0 ; i < volume.length ; ++i){
    volume[i].addEventListener('change',function () {
        // volumeEnd[i].innerHTML = this.getAttribute("value") ;
    });
    volumeStart[i].innerHTML = "0" ;
    volumeEnd[i].innerHTML = "100" ;
//
}
//
//for repeat
var repeat = document.getElementsByClassName('repeat');
for(var i=0 ; i < repeat.length ; ++i){
    repeat[i].addEventListener('click',function (event){
        console.log("repeatMethod");
    });
}
//for shuffle
var shuffle = document.getElementsByClassName('shuffle');
for(var i=0 ; i < shuffle.length ; ++i){
    shuffle[i].addEventListener('click',function (event){
        console.log("shuffleMethod");
    });
}
//for play list
var add_to_playList = document.getElementsByClassName('add_to_play_list');
for(var i=0 ; i < add_to_playList.length ; ++i){
    add_to_playList[i].addEventListener('click',function (event){
        if(doAddToPlaylist == 0){
            event.target.src = '/images/media_addtoplaylist_btn.png';
            doAddToPlaylist=1 ;
        }else{
            event.target.src = '/images/media_removefromplaylist_btn.png';
            doAddToPlaylist = 0;
        }
    });
}
//for mute
var mute = document.getElementsByClassName('mute');
for(var i=0 ; i < mute.length ; ++i){
    mute[i].addEventListener('click',function (event){
        if(! doMute){
            event.target.src = '/images/media_mute_btn.png';
            doMute=1 ;
        }else{
            event.target.src = '/images/media_unmute_btn.png';
            doMute = 0;
        }
    });
}
//
//for last track
var lastTrack = document.getElementsByClassName('last_track');
for(var i=0 ; i < lastTrack.length ; ++i){
    lastTrack[i].addEventListener('click',function (event){
        console.log("lastTrackMethod");
    });
}
//for back 5 sec
var back5Sec = document.getElementsByClassName('back_5_sec');
for(var i=0 ; i < back5Sec.length ; ++i){
    back5Sec[i].addEventListener('click',function (event){
        console.log("back5secMethod");
    });
}
//for play
var play = document.getElementsByClassName('play');
for(var i=0 ; i < play.length ; ++i){
    play[i].addEventListener('click',function (event){
        songName = event.target.getAttribute('data-src');
        audioPlayer = document.querySelector('#player'); //there are audio or not
//
        if(! audioPlayer){
            audioPlayer = document.createElement('audio');
            audioPlayer.id = 'player';
            audioPlayer.src = songName;
            document.body.appendChild(audioPlayer);
            audioPlayer.play();
            event.target.src = '/images/media_pause_btn.png';
            // event.target.id = 'playing' ;
            console.log(isNaN(audioPlayer.duration));
//
            audioPlayer.addEventListener("ended",function () {
                audioPlayer.parentNode.removeChild(audioPlayer);
                // event.target.id = '';
                event.target.src = '/images/media_play_btn.png';
            });
            // var songPlaying = document.querySelector('#player');
            // console.log(songPlaying.duration());
        }else{
//
            if(songName === audioPlayer.getAttribute('src')){
                if(audioPlayer.paused){
                    audioPlayer.play();
                    event.target.src = '/images/media_pause_btn.png';
//
                }else{
                    audioPlayer.pause();
                    event.target.src = '/images/media_play_btn.png';
//
                }
            }else{
                audioPlayer.src = songName ;
                audioPlayer.play();
                for(var j=0 ; j < play.length ; ++j) {
                    play[j].setAttribute('src','/images/media_play_btn.png');
                }
                // if(document.querySelector('#playing')){
                //     document.querySelector('#playing').id = '' ;
                // }else{
                //     document.querySelector('#paused').id = '' ;
                // }
                // event.target.id='playing';
//
                event.target.src = '/images/media_pause_btn.png';
//
            }
//
        }
//
    });
}
//for next 5 sec
var next5Sec = document.getElementsByClassName('next_5_sec');
for(var i=0 ; i < next5Sec.length ; ++i){
    next5Sec[i].addEventListener('click',function (event){
        console.log("next5secMethod");
    });
}
//for next track
var nextTrack = document.getElementsByClassName('next_track');
for(var i=0 ; i < nextTrack.length ; ++i){
    nextTrack[i].addEventListener('click',function (event){
        console.log("nextTrackMethod");
    });
}
//
//for duration
var durationStart = document.getElementsByClassName('duration_start');
var duration = document.getElementsByClassName('duration');
var durationEnd = document.getElementsByClassName('duration_end');
for(var i=0 ; i < duration.length ; ++i){
    // duration[i].addEventListener('click',function (event){
    durationStart[i].innerHTML = "0" ;
    durationEnd[i].innerHTML = "3:06" ;
//
    // });
}

document.getElementById('form-sign_up-submit-gmail').addEventListener('click',function () {
    document.querySelector('.popup-sign-up-with-gmail').style.display = 'flex' ;
});
document.querySelector('.popup-sign-up-with-gmail-close').addEventListener('click',function () {
    document.querySelector('.popup-sign-up-with-gmail').style.display = 'none ' ;
});
