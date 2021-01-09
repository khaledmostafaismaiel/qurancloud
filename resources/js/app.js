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
            // if (user.id != userId){
            //     if (get_chat_id_by_user_id(user)){
                    $('#online-users').append(`
                        <li id="user-${user.id}" class="chat-side-nav__item chat-side-nav__item--active">
                            <a href="/chats/prepare_and_create/${user.id}"  class="chat-side-nav__link">
                                <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
                                <span>${full_name(user)}</span>
                            </a>
                        </li>
                    `);
                // }else{
                //     $('#online-users').append(`
                //         <li id="user-${user.id}" class="chat-side-nav__item chat-side-nav__item--active">
                //             <a href="/chats/prepare_and_create/${user.id}" class="chat-side-nav__link">
                //                 <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
                //                 <span>${full_name(user)}</span>
                //             </a>
                //         </li>
                //     `);
                // }

            // }
        })
    })
    .joining((user) => {
        // if (get_chat_id_by_user_id(user)){
            $('#online-users').append(`
                <li id="user-${user.id}" class="chat-side-nav__item chat-side-nav__item--active">
                    <a href="/chats/prepare_and_create/${user.id}"  class="chat-side-nav__link">
                        <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
                        <span>${full_name(user)}</span>
                    </a>
                </li>
            `);
        // }else{
        //     $('#online-users').append(`
        //         <li id="user-${user.id}" class="chat-side-nav__item chat-side-nav__item--active">
        //             <a href="/chats/prepare_and_create/${user.id}"  class="chat-side-nav__link">
        //                 <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
        //                 <span>${full_name(user)}</span>
        //             </a>
        //         </li>
        //     `);
        // }
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

    $('.delete-track-submit').on('click',delete_track_submit);
    $('.delete-track_comment-submit').on('click',delete_track_comment_submit);

    $('#user-nav__friend_requests_box').on('click',toggleFriendRequests);
    $('#user-nav__messages_box').on('click',toggleMessages);
    $('#user-nav__notifications_box').on('click',toggleNotifications);
    $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_users_and_tracks_data(query);
    });
    $(document).on('focus', '#search', function(){
        $('#search-records').show();
    });
    $(document).on('blur', '#search', function(){
        $('#search-records').toggle();
    });

    if ($('div.index_script').length){
        var pageNumber = 1 ;

        $(window).ready(function () {
            loadMoreIndexTracks(pageNumber);
        });
        $(window).scroll(function(){
           if($(window).scrollTop() + $(window).height()  >=  $(document).height()){
               pageNumber++;
               loadMoreIndexTracks(pageNumber);
           }
        });

    }

    if ($('div.profile_script').length){
        var pageNumber = 1 ;
        $(window).ready(function () {
            var userId = $('.profile_script').data('user_id');
            loadMoreProfileTracks(pageNumber,userId);
        });
        $(window).scroll(function(){
            if($(window).scrollTop() + $(window).height()  >=  $(document).height()){
                pageNumber++;
                var userId = $('.profile_script').data('user_id');
                loadMoreProfileTracks(pageNumber,userId);
            }
        });
    }
    if ($('div.profile_script').length){
        $(document).on('click','#follower-modal-button',function () {
            var user_id = $(this).data('user_id');
            var pageNumber = 1 ;
            $('.modal-body-followers-table').remove();
            $('.modal-body').append(`
                    <table class="modal-body-followers-table">

                    </table>
                `);
            loadMoreFollowers(pageNumber,user_id);
        });
        $('.modal-body').scroll(function(){
            if($('.modal-body').scrollTop() + $('.modal-body').height()  >=  $('.modal-body').height()){
                pageNumber++;
                var userId = $('#follower-modal-button').data('user_id');
                loadMoreFollowers(pageNumber,userId);
            }
        });

        $(document).on('click','#following-modal-button',function () {
            var user_id = $(this).data('user_id');
            var pageNumber = 1 ;
            $('.modal-body-following-table').remove();
            $('.modal-body').append(`
                    <table class="modal-body-following-table">

                    </table>
                `);
            loadMoreFollowings(pageNumber,user_id);
        });
        $('.modal-body').scroll(function(){
            if($('.modal-body').scrollTop() + $('.modal-body').height()  >=  $('.modal-body').height()){
                pageNumber++;
                var userId = $('#following-modal-button').data('user_id');
                loadMoreFollowings(pageNumber,userId);
            }
        });

    }

    if ($('div.show_track_script').length){


        var pageNumber = 1 ;

        $(window).ready(function () {
            var trackId = $('.show_track_script').data('track_id');
            loadMoreComments(pageNumber,trackId);
        });
        $(window).scroll(function(){
            if($(window).scrollTop() + $(window).height()  >=  $(document).height()){
                pageNumber++;
                var trackId = $('.show_track_script').data('track_id');
                loadMoreComments(pageNumber,trackId);
            }
        });

        if ($('div.track_loves_script').length){
            var tackLovespageNumber = 1 ;

            $(window).ready(function () {
                var trackId = $('.track_loves_script').data('track_id');
                loadMoreTrackLoves(tackLovespageNumber,trackId);
            });
            $('.modal-body').scroll(function(){
                if($('.modal-body').scrollTop() + $('.modal-body').height()  >=  $('.modal-body').height()){
                    tackLovespageNumber++;
                    var trackId = $('.track_loves_script').data('track_id');
                    loadMoreTrackLoves(tackLovespageNumber,trackId);
                }
            });

        }
    }





    $('.track-love_photo').click(loveTrack);

    $('.track-unlove_photo').click(unLoveTrack);

    $('.track-comment-love_photo').click(loveComment);

    $('.track-comment-unlove_photo').click(unLoveComment);



    // $('.track').click(function (event) {
    //     console.log(event.target);
    //     if (event.target != 'img'){
    //         $('#track-comments-container-'+ event.target.getAttribute('data-track_id')).slideToggle('normal');
    //     }
    // });


    $('.add_comment').on('submit',addCommentFromSubmit);//from comment by ajax without reloading
    $('.add_comment').keypress(addCommentFromEnter);


    $('#track_options-user_nav-btn').on('click',function (event) {
        if (audioPlayer){
            $('#track_options-body').empty();
            var track_id = audioPlayerId ;
            getTrackInfo(track_id);


        }else{
            $('#track_options-body').empty();
            $('#track_options-body').append(`choose track to play from HOME and try this again.`);
        }

    });
    $('#playlist-user_nav-btn').on('click',function (event) {
        $.ajax({
            url:"/playlistTracks",
            method:'GET',
            success:function(playlist)
            {
                $('#playlist-body').empty();
                $('#playlist-body').append(playlist);

            },
            error:function(playlist){
                console.log(playlist);
            },
        });

    });

});



function getTrackInfo(track_id="") {
    $.ajax({
        url:"/tracks/"+ track_id,
        method:"GET",
        data:{
            track_id:track_id,
        },

        success:function (trackOptions) {
            $('#track_options-body').append(trackOptions);

            //for repeat
            $('#repeat').on('click',repeatMethod);
            //for shuffle
            $('#shuffle').on('click',shuffleMethod);
            //for add to play list
            $('#add_to_play_list').on('click',addToPlayListMethod);
            //for mute
            $('#mute').on('click',muteMethod);
            //for volume
            audioPlayer.volume = ($('#volume').val() / 100) ;
            document.getElementById('volume_start').innerHTML = parseInt(audioPlayer.volume * 100) ;
            document.getElementById('volume_end').innerHTML = "100" ;
            $('#volume').on('change',voluemMethod);
            //for last track
            $('#last_track').on('click',lastTrackMethod);
            // //for back 5 sec
            $('#back_5_sec').on('click',back5SecMethod);
            //for next 5 sec
            $('#next_5_sec').on('click',next5SecMethod);
            //for next track
            $('#next_track').on('click',nextTrackMethod);
            //for duration
            $('#duration').on('change',durationMethod);
            //for play
            playMethod();
            audioPlayer.addEventListener('timeupdate',function () {
                var position = (audioPlayer.currentTime / audioPlayer.duration) * 100 ;
                document.getElementById('duration_start').innerHTML = parseInt(audioPlayer.currentTime) ;
                document.getElementById('duration_end').innerHTML = parseInt(audioPlayer.duration);
                document.getElementById('duration').setAttribute('value',parseInt(position)) ;
            });


        }

    });
}

function delete_track_submit(event) {
    event.preventDefault();
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#delete_track-'+ $(this).data('id')).remove();
    $('#track-'+ $(this).data('id')).remove();
    $('#track-comments-container-'+ $(this).data('id')).remove();
    $('#master_view-show_more-button-comments').remove();

    $.ajax({
        url:"/tracks/"+ $(this).data('id') ,
        method:"DELETE",
        success:function (response) {

        }
    });
}
function delete_track_comment_submit(event) {
    event.preventDefault();
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#delete_track_comment-'+ $(this).data('id')).remove();
    $('#track_comment-'+ $(this).data('id')).remove();
    $.ajax({
        url:"/comments/"+ $(this).data('id') ,
        method:"DELETE",
        dataType:'json',
        success:function (response) {

        }
    });
}

function toggleFriendRequests(event) {
    if ( screen.width > 992 ){
        event.preventDefault();
        $('#friend_requests-box').toggle();
        $('#messages-box').css('display','none');
        $('#notifications-box').css('display','none');
    }else{

    }
}
function toggleMessages(event) {
    if ( screen.width > 992 ){
        event.preventDefault();
        $('#messages-box').toggle();
        $('#notifications-box').css('display','none');
        $('#friend_requests-box').css('display','none');
    }else{

    }
}
function toggleNotifications(event) {
    if ( screen.width > 992 ){
        event.preventDefault();
        $('#notifications-box').toggle();
        $('#friend_requests-box').css('display','none');
        $('#messages-box').css('display','none');
    }else{

    }
}
function fetch_users_and_tracks_data(query = '')
{
    $('#notifications-box').css('display','none');
    $('#friend_requests-box').css('display','none');
    $('#messages-box').css('display','none');

    $.ajax({
        url:"/live_search/search/tracksAndUsers",
        method:'GET',
        data:{
            query:query,
        },
        dataType:'json',
        error:function(data){
            console.log(data.table_users_data);

        },
        success:function(data)
        {
            console.log(data.table_users_data);

            $('#users-table-body').html(data.table_users_data);
            $('#total_users_records').text(data.total_users_num);
            $('#tracks-table-body').html(data.table_tracks_data);
            $('#total_tracks_records').text(data.total_tracks_num);

            // $('#users-table-body').append(data);

        }
    })
}
function loveTrack(event){
    var track_id = $(this).data('id');
    // $('#index_track-love_photo-'+ track_id).attr('src','/images/unlove.png');
    // $('#index_track-love_photo-'+ track_id).removeClass('index_track-unlove_photo').addClass('index_track-love_photo');


    $(this).attr('src','/images/love.png');
    $(this).removeClass('track-love_photo').addClass('track-unlove_photo');

    $('#track_loves-'+ track_id).text($('#track_loves-'+ track_id).text() + 1);

}
function unLoveTrack(event){
    var track_id = $(this).data('id');
    // $('#index_track-love_photo-'+ track_id).attr('src','/images/unlove.png');
    // $('#index_track-love_photo-'+ track_id).removeClass('index_track-unlove_photo').addClass('index_track-love_photo');

    $(this).attr('src','/images/unlove.png');
    $(this).removeClass('track-unlove_photo').addClass('track-love_photo');
    $('#track_loves-'+ track_id).text($('#track_loves-'+ track_id).text() - 1);

    var data ;
    // $.ajax({
    //     url:'/trackLoves/'+ track_id ,
    //     method:'delete',
    //     data:{
    //         '_token': $('meta[name=csrf-token]').attr('content'),
    //         'method': 'delete'
    //     }
    // });


}
function loveComment(event){
    var track_comment_id = $(this).data('track_comment_id');
    // $('#index_track-love_photo-'+ track_id).attr('src','/images/unlove.png');
    // $('#index_track-love_photo-'+ track_id).removeClass('index_track-unlove_photo').addClass('index_track-love_photo');


    $(this).attr('src','/images/love.png');
    $(this).removeClass('track-comment-love_photo').addClass('track-comment-unlove_photo');

    $('#track_comment_loves-'+ track_comment_id).text($('#track_comment_loves-'+ track_comment_id).text() + 1);

}
function unLoveComment(event){
    var track_comment_id = $(this).data('track_comment_id');
    // $('#index_track-love_photo-'+ track_id).attr('src','/images/unlove.png');
    // $('#index_track-love_photo-'+ track_id).removeClass('index_track-unlove_photo').addClass('index_track-love_photo');


    $(this).attr('src','/images/love.png');
    $(this).removeClass('track-comment-love_photo').addClass('track-comment-unlove_photo');

    $('#track_comment_loves-'+ track_comment_id).text($('#track_comment_loves-'+ track_comment_id).text() + 1);

}

function loadMoreIndexTracks(pageNumber=""){
    $.ajax({
        url:"/?page=" + pageNumber,
        method:'GET',
        data:{
            pageNumber:pageNumber
        },
        success:function (tracks) {
            // $('#master_view-show_more').remove();
            $('#tracks_container').append(tracks);
            $('.delete-track-submit').on('click',delete_track_submit);

        }
    });
}
function loadMoreProfileTracks(pageNumber="",user_id=""){
    $.ajax({
        url:"/tracks?page=" + pageNumber,
        method:'GET',
        // dataType:'json',
        data:{
            pageNumber:pageNumber,
            user_id:user_id
        },
        success:function (tracks) {
            // $('#master_view-show_more').remove();
            $('#tracks_container').append(tracks);
            $('.delete-track-submit').on('click',delete_track_submit);

        }
    });
}
function loadMoreComments(pageNumber="",track_id=""){
    $.ajax({
        url:"/comments?page=" + pageNumber,
        method:'GET',
        data:{
            pageNumber:pageNumber,
            track_id:track_id,
        },
        success:function (comments) {
            // $('#master_view-show_more-button-comments').remove();
            $('.track-comments-container').append(comments);
            $('.delete-track_comment-submit').on('click',delete_track_comment_submit);

        }
    });
}

function loadMoreTrackLoves(pageNumber="",track_id=""){
    $.ajax({
        url:"/trackLoves?page=" + pageNumber,
        method:'GET',
        data:{
            pageNumber:pageNumber,
            track_id:track_id,
        },
        success:function (loves) {
            // $('#master_view-show_more-button-comments').remove();
            $('.modal-body').append(loves);
        }
    });
}
function loadMoreTrackCommentLoves(pageNumber="",track_id=""){

    $.ajax({
        url:"/commentLoves?page=" + pageNumber,
        method:'GET',
        data:{
            pageNumber:pageNumber,
            comment_id:comment_id,
        },
        success:function (loves) {
            // $('#master_view-show_more-button-comments').remove();
            $('.modal-body').append(loves);
        }
    });
}

function loadMoreFollowers(pageNumber,user_id="") {
    $.ajax({
        url:"/friends/followers/"+ user_id + "?page=" + pageNumber,
        method:'GET',
        data:{
            pageNumber:pageNumber
        },
        success:function (followers) {
            // $('#follower-modal-body').remove();
            $('.modal-body-followers-table').append(followers);
        },
        error:function () {
            console.log("failed");

        }
    });
}

function loadMoreFollowings(pageNumber="",user_id="") {

    $.ajax({
        url:"/friends/following/"+ user_id + "?page=" + pageNumber,
        method:'GET',
        data:{
            pageNumber:pageNumber
        },
        success:function (followings) {

            $('.modal-body-following-table').append(followings);
        },
        error:function () {
            console.log("failed");

        }

    });
}

function addCommentFromSubmit(event){

    event.preventDefault();
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    var trackId = $(this).data('id');
    var comment = $('#comment-'+ trackId).val();
    $.ajax({
        url:"/comments",
        method:"POST",
        data:{
            track_id : trackId,
            comment : comment,
        },
        success:function (comment) {
            $('#comment-'+ trackId).val("");
            $('#track_comments').prepend(comment);
            $('.delete-track_comment-submit').on('click',delete_track_comment_submit);
        }

    }) ;
}

function addCommentFromEnter(event){

    if(event.which == 13){
        event.preventDefault();
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        var trackId = $(this).data('id');

        var comment = $('#comment-'+ trackId).val();
        $.ajax({
            url:"/comments",
            method:"POST",
            data:{
                track_id : trackId,
                comment : comment,
            },
            success:function (comment) {
                $('#comment-'+ trackId).val("");
                $('#track_comments').prepend(comment);
                $('.delete-track_comment-submit').on('click',delete_track_comment_submit);
            }

        }) ;

    }
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
var audioPlayer = null;
var audioPlayerId =null ;
var trackIsPlaying = 0 ;
playMethod();
var doRepeat = 1 ;
function repeatMethod(event){
    if (doRepeat){
        console.log("repeatMethod");
        doRepeat = 0;
    }else{
        console.log("unrepeatMethod");
        doRepeat = 1;
    }
}
var doShuffle = 1 ;
function shuffleMethod(event){
    if (doShuffle){
        console.log("shuffleMethod");
        doShuffle=0;
    }else{
        console.log("unshuffleMethod");
        doShuffle=1;
    }
}
var doAddToPlaylist = 1 ;
function addToPlayListMethod(event){
    if(doAddToPlaylist){
        $(this).attr('src','/images/media_removefromplaylist_btn.png');
        doAddToPlaylist=0 ;
    }else{
        $(this).attr('src','/images/media_addtoplaylist_btn.png');
        doAddToPlaylist = 1;
    }
}
var doMute = 1 ;
function muteMethod() {
    if (doMute){
        audioPlayer.muted = true ;
        $(this).attr('src','/images/media_unmute_btn.png');
        doMute=0;
    }else{
        audioPlayer.muted = false ;
        $(this).attr('src','/images/media_mute_btn.png');
        doMute=1;
    }
}
function voluemMethod(event) {
    audioPlayer.volume = ($(this).val() / 100) ;
    document.getElementById('volume_start').innerHTML = parseInt(audioPlayer.volume * 100) ;
    document.getElementById('volume_end').innerHTML = "100" ;

}
function lastTrackMethod(event){
    console.log("lastTrackMethod");
}
function back5SecMethod(event){
    var position = parseInt(audioPlayer.currentTime)  - parseInt(5) ;
    audioPlayer.currentTime = position  ;
    console.log(parseInt(position));
}
function playMethod() {
    var play = document.getElementsByClassName('play');
    $(document).on('click','.play',function (event) {
            songName = event.target.getAttribute('data-src');
            audioPlayer = document.querySelector('#player'); //there are audio or not

            if(! audioPlayer){
                audioPlayer = document.createElement('audio');
                audioPlayer.id = 'player';
                audioPlayer.src = songName;
                audioPlayerId = event.target.getAttribute('data-track_id');
                document.body.appendChild(audioPlayer);
                audioPlayer.play();
                event.target.src = '/images/media_pause_btn.png';
                trackIsPlaying = 1;

                //for end
                audioPlayer.addEventListener("ended",function () {
                    audioPlayer.parentNode.removeChild(audioPlayer);
                    // event.target.id = '';
                    event.target.src = '/images/media_play_btn.png';
                    trackIsPlaying = 0;
                });

            }else{
//
                if(songName === audioPlayer.getAttribute('src')){
                    if(audioPlayer.paused){
                        audioPlayer.play();
                        event.target.src = '/images/media_pause_btn.png';
                        trackIsPlaying = 1 ;
//
                    }else{
                        audioPlayer.pause();
                        event.target.src = '/images/media_play_btn.png';
                        trackIsPlaying = 0 ;
//
                    }
                }else{
                    audioPlayer.src = songName ;
                    audioPlayerId = event.target.getAttribute('data-track_id');

                    audioPlayer.play();

                    for(var j=0 ; j < play.length ; ++j) {
                        play[j].setAttribute('src','/images/media_play_btn.png');
                        trackIsPlaying = 0 ;
                    }
                    // if(document.querySelector('#playing')){
                    //     document.querySelector('#playing').id = '' ;
                    // }else{
                    //     document.querySelector('#paused').id = '' ;
                    // }
                    // event.target.id='playing';
//
                    event.target.src = '/images/media_pause_btn.png';
                    trackIsPlaying = 1;
//
                }
//
            }
//
    });

}
function next5SecMethod(event){
    var position = parseInt(audioPlayer.currentTime)  + parseInt(5) ;
    audioPlayer.currentTime = position  ;
    console.log(parseInt(position));
}
function nextTrackMethod(event){
    console.log("nextTrackMethod");
}
function durationMethod(event) {
    audioPlayer.currentTime = parseInt((audioPlayer.duration * $(this).val()) / 100);
    console.log(parseInt((audioPlayer.duration * $(this).val()) / 100));
}
