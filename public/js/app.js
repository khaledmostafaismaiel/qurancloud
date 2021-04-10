/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

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
// window.Echo.join(`online`)
//     .here((users) => {
//         let userId = $('meta[name=user-id]').attr('content');
//         users.forEach(function (user) {
//             // if (user.id != userId){
//             //     if (get_chat_id_by_user_id(user)){
//                     $('#online-users').append(`
//                         <li id="user-${user.id}" class="chat-page-sidebar-chats-item chat-page-sidebar-chats-item--active">
//                             <a href="/chats/prepare_and_create/${user.id}"  class="chat-page-sidebar-chats-item">
//                                 <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
//                                 <span>${full_name(user)}</span>
//                             </a>
//                         </li>
//                     `);
//                 // }else{
//                 //     $('#online-users').append(`
//                 //         <li id="user-${user.id}" class="chat-page-sidebar-chats-item chat-page-sidebar-chats-item--active">
//                 //             <a href="/chats/prepare_and_create/${user.id}" class="chat-page-sidebar-chats-item">
//                 //                 <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
//                 //                 <span>${full_name(user)}</span>
//                 //             </a>
//                 //         </li>
//                 //     `);
//                 // }
//
//             // }
//         })
//     })
//     .joining((user) => {
//         // if (get_chat_id_by_user_id(user)){
//             $('#online-users').append(`
//                 <li id="user-${user.id}" class="chat-page-sidebar-chats-item chat-page-sidebar-chats-item--active">
//                     <a href="/chats/prepare_and_create/${user.id}"  class="chat-page-sidebar-chats-item">
//                         <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
//                         <span>${full_name(user)}</span>
//                     </a>
//                 </li>
//             `);
//         // }else{
//         //     $('#online-users').append(`
//         //         <li id="user-${user.id}" class="chat-page-sidebar-chats-item chat-page-sidebar-chats-item--active">
//         //             <a href="/chats/prepare_and_create/${user.id}"  class="chat-page-sidebar-chats-item">
//         //                 <img src="/storage/uploads/profile_pictures/${user.profile_picture}" alt="User photo" class="user-nav__user-photo">
//         //                 <span>${full_name(user)}</span>
//         //             </a>
//         //         </li>
//         //     `);
//         // }
//     })
//     .leaving((user) => {
//         $('#user-' + user.id).remove();
//     });
//
//
// $('#chat-text-for_first_time').keypress(function(event){
//     if(event.which == 13){
//         event.preventDefault();
//         let body = $(this).val();
//         if (! body){
//             return;
//         }
//         // $('#chat-text-for_first_time').validate({
//         //     rules:{
//         //         body:{
//         //             required:true,
//         //         }
//         //     }
//         // });
//
//         let userProfilePic = $('meta[name=user-profile_pic]').attr('content');
//
//         $(this).val('');
//         $('#chat').append(`
//             <div class="message-section-square-from_me">
//                 <spam class="message-section-square-from_me-profile_pic">
//                     <img src="/storage/uploads/profile_pictures/${userProfilePic}" alt="User photo" class="chat-page-sidebar-chats-item__user-photo">
//                 </spam>
//                 ${body}
//             </div>
//         `);
//         let data = {
//             '_token': $('meta[name=csrf-token]').attr('content'),
//             body,
//             'to_user_id': $('meta[name=to_user_id]').attr('content'),
//         }
//
//         console.log(data);
//
//         $.ajax({
//             url:'/chats/store/for_first_time',
//             method:'POST',
//             data:data,
//         })
//
//     }
// });
var indexPageNumber = 1;
var profilePageNumber = 1;
var showTrackPageNumber = 1;
var followerPageNumber = 1;
var followingsPageNumber = 1;
var trackLovesPageNumber = 1;
var trackCommentLovesPageNumber = 1;
var songName;
var audioPlayer = null;
var audioPlayerId = null;
var trackIsPlaying = 0;
var doRepeat = 0;
var doShuffle = 1;
var doAddToPlaylist = 1;
var doMute = 1;
var volume = 100;
var my_id = $('meta[name="csrf-token"]').attr('id');
var chat_reciver_id = ''; // Enable pusher logging - don't include this in production

Pusher.logToConsole = false;
var pusher = new Pusher('9bb11ecff1789ec03671', {
  cluster: 'eu',
  encrypted: true
}); // var channel = pusher.subscribe('new-comment-notification');
// use_swal("hi khaled");

$(document).ready(function () {
  var message_channel = pusher.subscribe('chat');
  message_channel.bind('new-message', function (data) {
    if (my_id == data.from_user_id) {
      if ($('.chat-page-message-section-menu_bar-send').attr('data-chat_id') == data.chat_id) {
        $('.chat-page-message-section-menu_bar').find('.chat-page-message-section-menu_bar-text').val("");
        $('.chat-page-message-section-square').animate({
          scrollTop: $('.chat-page-message-section-square').get(0).scrollHeight
        }, 50);
        $('.chat-page-message-section-square').append(data.message_from_me);
      }
    } else if (my_id == data.to_user_id) {
      if ($('.chat-page-message-section-menu_bar-send').attr('data-chat_id') == data.chat_id) {
        $('.chat-page-message-section-square').animate({
          scrollTop: $('.chat-page-message-section-square').get(0).scrollHeight
        }, 50);
        $('.chat-page-message-section-square').append(data.message_to_me);
      } else {
        if ($('.chat-page-message-section-menu_bar-send').length) {
          console.log("fate7 chat");
        } else {
          var old_mesages = parseInt($('#user-nav__messages_box').find('span.badge-pill').text());
          $('#user-nav__messages_box').find('span.badge-pill').text(old_mesages + parseInt(1));
        }
      }
    }
  });
  var friend_request_channel = pusher.subscribe('friend-request');
  friend_request_channel.bind('new-friend-request', function (data) {
    if (data.following_user_id == my_id) {
      var old_friend_requests = parseInt($('#user-nav__friend_requests_box').find('span.badge-pill').text());
      $('#user-nav__friend_requests_box').find('span.badge-pill').text(old_friend_requests + parseInt(1));
    }
  }); // $(function() {
  //     var divContent = $('.notifi-box-message-body').text();
  //     var contentSpillage = divContent.split(" ");
  //     $('.notifi-box-message-body').text( contentSpillage.slice(0,3) );
  // });
  //common////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  $('#navbar-logo').on('click', get_index_blade);
  $('#search').on('keyup', function () {
    var query = $(this).val();
    fetch_users_and_tracks_data(query);
  });
  $('#search').on('focus', function () {
    $('#search-records').toggle();
  });
  $('#track_options-user_nav-btn').on('click', trackOptions);
  $('#playlist-user_nav-btn').on('click', loadMorePlaylistTracks);
  $('#avatar_pic').on('click', get_profile_blade);
  $('#user-nav__friend_requests_box').on('click', toggleFriendRequests);
  $('#user-nav__messages_box').on('click', toggleChats);
  $('#user-nav__notifications_box').on('click', toggleNotifications);
  $('#about_to_edit').on('click', get_about_to_edit_blade);
  $('#privacy').on('click', get_privacy_blade);
  $('#security').on('click', get_security_blade);
  $('#settings').on('click', get_sittings_blade);
  $(document).on('click', '.track_loves_modal_btn ', function () {
    $('.modal-body-track-loves-table').empty();
    var track_id = $(this).data('track_id');
    trackLovesPageNumber = 1;
    loadMoreTrackLoves(trackLovesPageNumber, track_id);
  });
  $(document).on('click', '.track_comment_loves_modal_btn ', function () {
    $('.modal-body-track-comment-loves-table').empty();
    trackCommentLovesPageNumber = 1;
    var comment_id = $(this).data('comment_id');
    loadMoreTrackCommentLoves(trackCommentLovesPageNumber, comment_id);
  });
  tinymce.init({
    selector: ".chat-page-message-section-menu_bar-text",
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name'
  }); // $(document).on('keypress','.message-section-menu_bar-text',function(event){
  //     if(event.which == 13){
  //         var body = $(this).val();
  //         var to_user_id = $(this).attr('data-to_user_id');
  //         var chat_id = $(this).attr('data-chat_id');
  //
  //         if(! body ){
  //             return;
  //         }
  //         $.ajaxSetup({
  //             headers:{
  //                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
  //             }
  //         });
  //         $.ajax({
  //             url:'/messages',
  //             method:'post',
  //             data:{
  //                 chat_id:chat_id,
  //                 to_user_id:to_user_id,
  //                 body :body
  //             },
  //             cache: false,
  //             success:function (response) {
  //                 $('.message-section-square').append(response);
  //                 $(event.target).val("");
  //             },
  //             error:function (jqXHR,status,err) {
  //
  //             },
  //             complete:function () {
  //                 $('.message-section-square').animate({
  //                     scrollTop: $('.message-section-square').get(0).scrollHeight
  //                 }, 50);
  //             },
  //         });
  //
  //     }
  // });

  $(document).on('click', '.chat-page-message-section-menu_bar-send', function (event) {
    var body = $(this).closest('.chat-page-message-section-menu_bar').find('.chat-page-message-section-menu_bar-text').val();
    var to_user_id = $(this).attr('data-to_user_id');
    var chat_id = $(this).attr('data-chat_id');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/messages',
      method: 'post',
      data: {
        chat_id: chat_id,
        to_user_id: to_user_id,
        body: body
      },
      cache: false,
      success: function success() {},
      error: function error(jqXHR, status, err) {},
      complete: function complete(event) {
        $('.chat-page-message-section-square').animate({
          scrollTop: $('.chat-page-message-section-square').get(0).scrollHeight
        }, 50);
      }
    });
  });
  $(document).on('click', '.track-track_owner-pic', get_profile_blade);
  $(document).on('click', '.track-track_owner-name', get_profile_blade);
  $(document).on('click', '.track-track_name', get_show_track_blade);
  $(document).on('click', '.track-love_photo', loveTrack);
  $(document).on('click', '.track-unlove_photo', unLoveTrack);
  $(document).on('click', '.delete-track-submit', delete_track_submit);
  $(document).on('click', '.track-comment-photo', get_profile_blade);
  $(document).on('click', '.play', playMethod);
  $(document).on('click', '.add_to_play_list', addToPlayListMethod);
  $(document).on('click', '#repeat', repeatMethod);
  $(document).on('click', '#shuffle', shuffleMethod);
  $(document).on('click', '#mute', muteMethod);
  $(document).on('change', '#volume', voluemMethod);
  $(document).on('click', '#last_track', lastTrackMethod);
  $(document).on('click', '#back_5_sec', back5SecMethod);
  $(document).on('click', '#next_5_sec', next5SecMethod);
  $(document).on('click', '#next_track', nextTrackMethod);
  $(document).on('change', '#duration', durationMethod);
  $(document).on('click', '#remove_from_playlist', remove_track_from_playlist);
  $(window).scroll(function () {
    if ($('.index_script').length) {
      if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        indexPageNumber++;
        loadMoreIndexTracks(indexPageNumber);
      }
    }

    if ($('.profile_script').length) {
      if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        profilePageNumber++;
        var userId = $('.profile_script').data('user_id');
        loadMoreProfileTracks(profilePageNumber, userId);
      }
    }

    if ($('.show-track_script').length) {
      if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        showTrackPageNumber++;
        var trackId = $('.show-track_script').data('track_id');
        loadMoreComments(showTrackPageNumber, trackId);
      }
    }
  });
  $('.modal-body-followers').scroll(function () {
    if ($('.modal-body-followers').scrollTop() + $('.modal-body-followers').height() >= $('.modal-body-followers').height()) {
      followerPageNumber++;
      var userId = $('#follower-modal-button').data('user_id');
      loadMoreFollowers(followerPageNumber, userId);
    }
  });
  $('.modal-body-followings').scroll(function () {
    if ($('.modal-body-followings').scrollTop() + $('.modal-body-followings').height() >= $('.modal-body-followings').height()) {
      followingsPageNumber++;
      var userId = $('#following-modal-button').data('user_id');
      loadMoreFollowings(followingsPageNumber, userId);
    }
  });
  $('.modal-body-track-loves').scroll(function () {
    if ($('.modal-body-track-loves').scrollTop() + $('.modal-body-track-loves').height() >= $('.modal-body-track-loves').height()) {
      trackLovesPageNumber++;
      var track_id = $(this).closest('.modal').data('track_id');
      loadMoreTrackLoves(trackLovesPageNumber, track_id);
    }
  });
  $('.modal-body-track-comment-loves').scroll(function () {
    if ($('.modal-body-track-comment-loves').scrollTop() + $('.modal-body-track-comment-loves').height() >= $('.modal-body-track-comment-loves').height()) {
      trackCommentLovesPageNumber++;
      var comment_id = $(this).closest('.modal').data('comment_id');
      loadMoreTrackCommentLoves(trackCommentLovesPageNumber, comment_id);
    }
  }); //index////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if ($('.index_script').length) {
    indexPageNumber = 1;
    loadMoreIndexTracks(indexPageNumber);
  } //profile////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  if ($('.profile_script').length) {
    profilePageNumber = 1;
    var userId = $('.profile_script').data('user_id');
    loadMoreProfileTracks(profilePageNumber, userId);
  }

  $(document).on('click', '#about', get_about_blade);
  $(document).on('click', '.chats', get_chats_blade);
  $(document).on('click', '#follower-modal-button', function () {
    followerPageNumber = 1;
    var user_id = $(this).data('user_id');
    $('.modal-body-followers-table').empty();
    loadMoreFollowers(followerPageNumber, user_id);
  });
  $(document).on('click', '#following-modal-button', function () {
    followingsPageNumber = 1;
    var user_id = $(this).data('user_id');
    $('.modal-body-following-table').empty();
    loadMoreFollowings(followingsPageNumber, user_id);
  });
  $(document).on('click', 'button.followAction', followAction);
  $(document).on('click', 'button.unfollowAction', unfollowAction);
  $(document).on('click', '.chat', function () {
    var chat_id = $(this).attr('data-chat_id');
    var with_side_nav = $(this).attr('data-from_notifications');

    if (with_side_nav == 1) {
      //from notifications
      $.ajax({
        url: '/chats/' + chat_id,
        method: 'get',
        data: {
          with_side_nav: 1
        },
        success: function success(response) {
          $('#master_view').empty();
          $('#master_view').append(response); // loadMoreShowChatMessages(showChatMessagesPageNumber,chat_id);
        }
      });
    } else {
      $.ajax({
        url: '/chats/' + chat_id,
        method: 'get',
        success: function success(response) {
          $('.chat-page-message-section').remove();
          $('.chat-page').append(response); // loadMoreShowChatMessages(showChatMessagesPageNumber,chat_id);
        }
      });
    }
  });
  $(document).on('click', '.chat-page-sidebar-chats-item', function () {
    if (!$(this).hasClass('bg-info')) {
      $('.chat-page-sidebar-chats-item').removeClass('selected_chat');
      $(this).addClass('selected_chat');
    }
  });
  $(document).on('click', '.edit-track', function () {
    var track_id = $(this).closest('.dropdown').attr('data-track_id');
    $(this).closest('div#track-' + track_id).find('div.card-body input.card-text').attr('readonly', false).removeClass('text-white bg-dark border-0').addClass('text-dark bg-white border');
    $(this).closest('div#track-' + track_id).find('div.card-body button.submit_edit_track').removeClass('d-none');
  });
  $(document).on('click', 'button.submit_edit_track', updateTrackFromSubmit); // $(document).keypress('.edit_track',updateTrackFromEnter);
  //showtrack////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  $(document).on('click', '.delete-track_comment-submit', delete_track_comment_submit);
  $(document).on('click', '.track-comment-love_photo', loveComment);
  $(document).on('click', '.track-comment-unlove_photo', unLoveComment);
  $(document).on('click', '.edit-track-comment', allowUpdateTrackComment);
  $(document).on('click', 'button.submit_edit_comment', updateTrackCommentFromSubmit); // $(document).keypress('input[name=edit_comment]',updateTrackCommentFromEnter);

  $(document).on('click', '.add_comment', addCommentFromSubmit); //from comment by ajax without reloading
  // $(document).keypress('input[name=add_comment]',addCommentFromEnter);
  //Edit about////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  $(document).on('click', '.btn-comment-form', edit_about_info);
});

function updateTrackFromEnter(event) {
  if (event.which == 13) {
    var track_id = $(event.target).closest('.card-body').attr('data-track_id');
    var newCaption = $(event.target).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/tracks/' + track_id,
      method: 'patch',
      data: {
        caption: newCaption
      },
      success: function success(response) {
        $(event.target).attr('readonly', true).addClass('text-white bg-dark border-0').removeClass('text-dark bg-white border');
        $(event.target).closest('div.card-body').find('button.submit_edit_track').addClass('d-none');
        $.toaster({
          priority: response.priority,
          title: response.title,
          message: response.message
        });
      },
      error: function error() {
        $.toaster({
          priority: "danger",
          title: "Error",
          message: "Try again,sorry!"
        });
      }
    });
  }
}

function updateTrackFromSubmit(event) {
  var track_id = $(this).closest('.card-body').attr('data-track_id');
  var newCaption = $(this).closest('div.card-body').find('input.card-text').val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: '/tracks/' + track_id,
    method: 'patch',
    data: {
      caption: newCaption
    },
    success: function success(response) {
      $(event.target).closest('div.card-body').find('input.card-text').attr('readonly', true).addClass('text-white bg-dark border-0').removeClass('text-dark bg-white border');
      $(event.target).addClass('d-none');
      $.toaster({
        priority: response.priority,
        title: response.title,
        message: response.message
      });
    },
    error: function error() {
      $.toaster({
        priority: "danger",
        title: "Error",
        message: "Try again,sorry!"
      });
    }
  });
}

function unfollowAction(event) {
  var friends_id = parseInt($(this).attr('data-friends_id'));
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: '/friends/' + friends_id,
    method: 'delete',
    success: function success(response) {
      $(event.target).attr('data-friends_id', null);
      $(event.target).removeClass('btn-outline-danger').removeClass('unfollowAction').addClass('btn-outline-info').addClass('followAction');
      $(event.target).text("FOLLOW");
      $.toaster({
        priority: response.priority,
        title: response.title,
        message: response.message
      });
    },
    error: function error() {
      $.toaster({
        priority: "danger",
        title: "Error",
        message: "Try again,sorry!"
      });
    }
  });
}

function followAction(event) {
  var user_id = $(this).data('user_id');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: '/friends',
    method: 'post',
    dataType: 'json',
    data: {
      following_user_id: user_id
    },
    success: function success(response) {
      $(event.target).attr('data-friends_id', response.friends_id); // tostar.success(response.message);

      $(event.target).removeClass('btn-outline-info').removeClass('followAction').addClass('btn-outline-danger').addClass('unfollowAction');
      $(event.target).text("UNFOLLOW");
      $.toaster({
        priority: response.priority,
        title: response.title,
        message: response.message
      });
    },
    error: function error() {
      $.toaster({
        priority: "danger",
        title: "Error",
        message: "Try again,sorry!"
      });
    }
  });
}

function updateTrackCommentFromEnter(event) {
  if (event.which == 13) {
    var commentId = $(event.target).closest('table').data('comment_id');
    var newComment = $(event.target).closest('table').find('tr input[name=edit_comment]').val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/comments/' + commentId,
      method: 'patch',
      data: {
        comment: newComment
      },
      success: function success(response) {
        $(event.target).closest('table').find('tr input[name=edit_comment]').removeClass('bg-white').removeClass('border').removeClass('text-dark').addClass('bg-dark').addClass('border-0').addClass('text-white').attr('readonly', true);
        $(event.target).closest('table').find('tr button.submit_edit_comment').addClass('d-none');
        $.toaster({
          priority: response.priority,
          title: response.title,
          message: response.message
        });
      },
      error: function error() {
        $.toaster({
          priority: "danger",
          title: "Error",
          message: "Try again,sorry!"
        });
      }
    });
  }
}

function allowUpdateTrackComment() {
  $(this).closest('table').find('tr input[name=edit_comment]').removeClass('bg-dark').removeClass('border-0').removeClass('text-white').addClass('bg-white').addClass('border').addClass('text-dark').attr('readonly', false);
  $(this).closest('table').find('tr td button.submit_edit_comment').removeClass('d-none');
}

function updateTrackCommentFromSubmit(event) {
  var commentId = $(this).closest('table').data('comment_id');
  var newComment = $(this).closest('table').find('tr input[name=edit_comment]').val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: '/comments/' + commentId,
    method: 'patch',
    data: {
      comment: newComment
    },
    success: function success(response) {
      $(event.target).closest('table').find('tr input[name=edit_comment]').removeClass('bg-white').removeClass('border').removeClass('text-dark').addClass('bg-dark').addClass('border-0').addClass('text-white').attr('readonly', true);
      $(event.target).addClass('d-none');
      $.toaster({
        priority: response.priority,
        title: response.title,
        message: response.message
      });
    },
    error: function error() {
      $.toaster({
        priority: "danger",
        title: "Error",
        message: "Try again,sorry!"
      });
    }
  });
}

function remove_track_from_playlist() {
  $(this).closest('tr').remove();
  var playlistRecordId = $(this).data('playlist_record_id');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: '/playlistTracks/' + playlistRecordId,
    method: 'delete'
  });
}

function edit_about_info() {
  var can_edit = $(this).data('can_edit');

  if ($(this).text() == "Edit") {
    $(this).text("OK");

    if (can_edit == "from" || can_edit == "lives" || can_edit == "gender") {
      $('select[name=' + can_edit + ']').prop('disabled', false);
    } else {
      $('input[name=' + can_edit + ']').attr('readonly', false);
    }
  } else if ($(this).text() == "OK") {
    $(this).text("Edit");
    var newEdit = $('[name=' + can_edit + ']').val();

    if (can_edit == "from" || can_edit == "lives" || can_edit == "gender") {
      $('select[name=' + can_edit + ']').prop('disabled', true);
    } else {
      $('input[name=' + can_edit + ']').attr('readonly', true);
    }

    var authId = $(this).data('auth_id');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "/users/" + authId,
      method: "patch",
      data: {
        can_edit: can_edit,
        newEdit: newEdit
      }
    });
  }
}

function get_index_blade() {
  indexPageNumber = 1;
  $.ajax({
    url: "/",
    method: "get",
    success: function success(response) {
      $('#master_view').empty();
      $('#master_view').append(response);
      loadMoreIndexTracks(indexPageNumber); // window.location.replace(url);
    }
  });
}

function get_profile_blade(event) {
  profilePageNumber = 1;
  var userId = $(this).data('user-id');
  var url = "/users/" + userId;
  $.ajax({
    url: url,
    method: "get",
    success: function success(response) {
      $('#master_view').empty();
      $('#master_view').append(response);
      loadMoreProfileTracks(profilePageNumber, userId); // window.location.replace(url);
    }
  });
}

function get_show_track_blade(event) {
  showTrackPageNumber = 1;
  var track_id = $(this).data('track-id');
  $.ajax({
    url: "/tracks/" + track_id,
    method: "get",
    success: function success(response) {
      $('#master_view').empty();
      $('#master_view').append(response);
      loadMoreComments(showTrackPageNumber, track_id);
    }
  });
}

function getTrackInfo() {
  var track_id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  $.ajax({
    url: "/tracks/getTrackInfo/" + track_id,
    method: "GET",
    success: function success(trackOptions) {
      $('#track_options-body').append(trackOptions);
    }
  });
}

function delete_track_submit(event) {
  var trackId = $(this).data('id');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#delete_track-' + trackId).remove();
  $('#track-' + trackId).remove();
  $('#track-comments-container-' + trackId).remove();
  $('#master_view-show_more-button-comments').remove();
  $.ajax({
    url: "/tracks/" + $(this).data('id'),
    method: "DELETE",
    success: function success(response) {
      $.toaster({
        priority: response.priority,
        title: response.title,
        message: response.message
      });
    },
    error: function error() {
      $.toaster({
        priority: "danger",
        title: "Error",
        message: "Try again,sorry!"
      });
    }
  });
}

function delete_track_comment_submit(event) {
  event.preventDefault();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#delete_track_comment-' + $(this).data('id')).remove();
  $('#track_comment-' + $(this).data('id')).remove();
  $.ajax({
    url: "/comments/" + $(this).data('id'),
    method: "DELETE",
    dataType: 'json',
    success: function success(response) {
      $.toaster({
        priority: response.priority,
        title: response.title,
        message: response.message
      });
    },
    error: function error() {
      $.toaster({
        priority: "danger",
        title: "Error",
        message: "Try again,sorry!"
      });
    }
  });
}

var show_friend_requests = 1;

function toggleFriendRequests(event) {
  if (screen.width > 992) {
    if (show_friend_requests == 1) {
      show_friend_requests = 0;
    } else {
      show_friend_requests = 1;
    }

    $('#friend_requests-box').toggle();
    $('#chats-box').css('display', 'none');
    $('#notifications-box').css('display', 'none');
  } else {}
}

function toggleChats(event) {
  if (screen.width > 992) {
    $('#user-nav__messages_box').find('span.badge-pill').text(parseInt(0));
    $('#chats-box').toggle();
    $('#notifications-box').css('display', 'none');
    $('#friend_requests-box').css('display', 'none');
  } else {}
}

function toggleNotifications(event) {
  if (screen.width > 992) {
    event.preventDefault();
    $('#notifications-box').toggle();
    $('#friend_requests-box').css('display', 'none');
    $('#chats-box').css('display', 'none');
  } else {}
}

function fetch_users_and_tracks_data() {
  var query = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  $('#notifications-box').css('display', 'none');
  $('#friend_requests-box').css('display', 'none');
  $('#chats-box').css('display', 'none');
  $.ajax({
    url: "/live_search/search/tracksAndUsers",
    method: 'GET',
    data: {
      query: query
    },
    dataType: 'json',
    error: function error(data) {
      console.log(data.table_users_data);
    },
    success: function success(data) {
      $('#users-table-body').html(data.table_users_data);
      $('#total_users_records').text(data.total_users_num);
      $('#tracks-table-body').html(data.table_tracks_data);
      $('#total_tracks_records').text(data.total_tracks_num);
    }
  });
}

function loveTrack(event) {
  var track_id = $(this).attr('data-id');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: '/trackLoves',
    method: 'post',
    dataType: 'json',
    data: {
      '_token': $('meta[name=csrf-token]').attr('content'),
      track_id: track_id
    },
    success: function success(response) {
      $(event.target).data('track_love_id', response.track_love_id);
      $(event.target).attr('src', '/images/love.png');
      $(event.target).removeClass('track-love_photo').addClass('track-unlove_photo');
      $('#track_loves-' + track_id).text(parseInt($('#track_loves-' + track_id).text()) + parseInt(1));
      $.toaster({
        priority: response.priority,
        title: response.title,
        message: response.message
      });
    },
    error: function error() {
      $.toaster({
        priority: "danger",
        title: "Error",
        message: "Try again,sorry!"
      });
    }
  });
}

function unLoveTrack(event) {
  var track_id = $(this).data('id');
  var track_love_id = $(this).data('track_love_id');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: '/trackLoves/' + track_love_id,
    method: 'delete',
    data: {
      '_token': $('meta[name=csrf-token]').attr('content'),
      'method': 'delete'
    },
    success: function success(response) {
      $(event.target).attr('src', '/images/unlove.png');
      $(event.target).removeClass('track-unlove_photo').addClass('track-love_photo');
      $('#track_loves-' + track_id).text(parseInt($('#track_loves-' + track_id).text()) - parseInt(1));
      $.toaster({
        priority: response.priority,
        title: response.title,
        message: response.message
      });
    },
    error: function error() {
      $.toaster({
        priority: "danger",
        title: "Error",
        message: "Try again,sorry!"
      });
    }
  });
}

function loveComment(event) {
  var track_comment_id = $(this).data('track_comment_id');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: '/commentLoves',
    method: 'post',
    dataType: 'json',
    data: {
      '_token': $('meta[name=csrf-token]').attr('content'),
      track_comment_id: track_comment_id
    },
    success: function success(response) {
      $(event.target).data('track_comment_love_id', response.track_comment_love_id);
      $(event.target).attr('src', '/images/love.png');
      $(event.target).removeClass('track-comment-love_photo').addClass('track-comment-unlove_photo');
      $('#track_comment_loves-' + track_comment_id).text(parseInt($('#track_comment_loves-' + track_comment_id).text()) + parseInt(1));
      $.toaster({
        priority: response.priority,
        title: response.title,
        message: response.message,
        has_progress: false,
        has_icon: true
      });
    },
    error: function error() {
      $.toaster({
        priority: "danger",
        title: "Error",
        message: "Try again,sorry!"
      });
    }
  });
}

function unLoveComment(event) {
  var track_comment_id = $(this).data('track_comment_id');
  var track_comment_love_id = $(this).data('track_comment_love_id');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: '/commentLoves/' + track_comment_love_id,
    method: 'delete',
    data: {
      '_token': $('meta[name=csrf-token]').attr('content'),
      'method': 'delete'
    },
    success: function success(response) {
      $(event.target).attr('src', '/images/unlove.png');
      $(event.target).removeClass('track-comment-unlove_photo').addClass('track-comment-love_photo');
      $('#track_comment_loves-' + track_comment_id).text(parseInt($('#track_comment_loves-' + track_comment_id).text()) - 1);
      $.toaster({
        priority: response.priority,
        title: response.title,
        message: response.message
      });
    },
    error: function error() {
      $.toaster({
        priority: "danger",
        title: "Error",
        message: "Try again,sorry!"
      });
    }
  });
}

function loadMoreIndexTracks() {
  var pageNumber = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";

  if (!$('#spinning-loader-btn').length) {
    $('#master_view').append("\n            <button class=\"btn btn-info w-100\" id=\"spinning-loader-btn\">\n                <i class=\"loading-icon fa fa-spinner fa-spin\"></i>\n                <span class=\"btn-txt\">Loading...</span>\n            </button>\n        ");
  }

  $.ajax({
    url: "/?page=" + pageNumber,
    method: 'GET',
    data: {
      pageNumber: pageNumber
    },
    success: function success(tracks) {
      $('#tracks_container').append(tracks);
      $('#spinning-loader-btn').remove();
    }
  });
}

function loadMoreProfileTracks() {
  var pageNumber = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var user_id = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";

  if (!$('#spinning-loader-btn').length) {
    $('#tracks_container').append("\n            <button class=\"btn btn-info w-100\" id=\"spinning-loader-btn\">\n                <i class=\"loading-icon fa fa-spinner fa-spin\"></i>\n                <span class=\"btn-txt\">Loading...</span>\n            </button>\n        ");
  }

  $.ajax({
    url: "/tracks?page=" + pageNumber,
    method: 'GET',
    // dataType:'json',
    data: {
      pageNumber: pageNumber,
      user_id: user_id
    },
    success: function success(tracks) {
      $('#tracks_container').append(tracks);
      $('#spinning-loader-btn').remove();
    }
  });
}

function loadMoreComments() {
  var pageNumber = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var track_id = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";

  if (!$('#spinning-loader-btn').length) {
    $('#track_comments').append("\n            <button class=\"btn btn-info w-100\" id=\"spinning-loader-btn\">\n                <i class=\"loading-icon fa fa-spinner fa-spin\"></i>\n                <span class=\"btn-txt\">Loading...</span>\n            </button>\n        ");
  }

  $.ajax({
    url: "/comments?page=" + pageNumber,
    method: 'GET',
    data: {
      pageNumber: pageNumber,
      track_id: track_id
    },
    success: function success(comments) {
      $('#track_comments').append(comments);
      $('#spinning-loader-btn').remove();
    }
  });
}

function loadMoreTrackLoves() {
  var pageNumber = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var track_id = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";

  if (!$('#spinning-loader-btn').length) {
    $('#modal-body-track-loves-table_' + track_id).closest('.modal-body').append("\n            <button class=\"btn btn-info w-100\" id=\"spinning-loader-btn\">\n                <i class=\"loading-icon fa fa-spinner fa-spin\"></i>\n                <span class=\"btn-txt\">Loading...</span>\n            </button>\n        ");
  }

  $.ajax({
    url: "/trackLoves?page=" + pageNumber,
    method: 'GET',
    data: {
      pageNumber: pageNumber,
      track_id: track_id
    },
    success: function success(loves) {
      if (!loves) {
        --trackLovesPageNumber;
      } else {
        $('#modal-body-track-loves-table_' + track_id).append(loves);
        $('#spinning-loader-btn').remove();
      }
    }
  });
}

function loadMoreTrackCommentLoves() {
  var pageNumber = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var comment_id = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";

  if (!$('#spinning-loader-btn').length) {
    $('#modal-body-track-comment-loves-table_' + comment_id).append("\n            <button class=\"btn btn-info w-100\" id=\"spinning-loader-btn\">\n                <i class=\"loading-icon fa fa-spinner fa-spin\"></i>\n                <span class=\"btn-txt\">Loading...</span>\n            </button>\n        ");
  }

  $.ajax({
    url: "/commentLoves?page=" + pageNumber,
    method: 'GET',
    data: {
      pageNumber: pageNumber,
      comment_id: comment_id
    },
    success: function success(loves) {
      if (!loves) {
        --trackCommentLovesPageNumber;
      } else {
        $('#modal-body-track-comment-loves-table_' + comment_id).append(loves);
        $('#spinning-loader-btn').remove();
      }
    }
  });
}

function loadMoreFollowers(pageNumber) {
  var user_id = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";

  if (!$('#spinning-loader-btn').length) {
    $('.modal-body').append("\n            <button class=\"btn btn-info w-100\" id=\"spinning-loader-btn\">\n                <i class=\"loading-icon fa fa-spinner fa-spin\"></i>\n                <span class=\"btn-txt\">Loading...</span>\n            </button>\n        ");
  }

  $.ajax({
    url: "/friends/followers/" + user_id + "?page=" + pageNumber,
    method: 'GET',
    data: {
      pageNumber: pageNumber
    },
    success: function success(followers) {
      if (!followers.length) {
        --followerPageNumber;
      } else {
        $('.modal-body-followers-table').append(followers);
        $('#spinning-loader-btn').remove();
      }
    }
  });
}

function loadMoreFollowings() {
  var pageNumber = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var user_id = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";

  if (!$('#spinning-loader-btn').length) {
    $('.modal-body').append("\n            <button class=\"btn btn-info w-100\" id=\"spinning-loader-btn\">\n                <i class=\"loading-icon fa fa-spinner fa-spin\"></i>\n                <span class=\"btn-txt\">Loading...</span>\n            </button>\n        ");
  }

  $.ajax({
    url: "/friends/following/" + user_id + "?page=" + pageNumber,
    method: 'GET',
    data: {
      pageNumber: pageNumber
    },
    success: function success(followings) {
      if (!followings.length) {
        --followingsPageNumber;
      } else {
        $('.modal-body-following-table').append(followings);
        $('#spinning-loader-btn').remove();
      }
    }
  });
}

function addCommentFromSubmit(event) {
  var trackId = $(this).closest('table').data('track_id');
  var comment = $(this).closest('table').find('tr input[name=add_comment]').val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: "/comments",
    method: "post",
    data: {
      track_id: trackId,
      comment: comment
    },
    success: function success(response) {
      $('tr input[name=add_comment]').val("");
      $('#track_comments').prepend(response.comment);
      $.toaster({
        priority: response.priority,
        title: response.title,
        message: response.message
      });
    },
    error: function error() {
      $.toaster({
        priority: "danger",
        title: "Error",
        message: "Try again,sorry!"
      });
    }
  });
}

function addCommentFromEnter(event) {
  if (event.which == 13) {
    var trackId = $(event.target).closest('table').data('track_id');
    var comment = $(event.target).closest('table').find('tr input[name=add_comment]').val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "/comments",
      method: "post",
      data: {
        track_id: trackId,
        comment: comment
      },
      success: function success(response) {
        $(event.target).closest('table').find('tr input[name=add_comment]').val("");
        $('#track_comments').prepend(response.comment);
        $.toaster({
          priority: response.priority,
          title: response.title,
          message: response.message
        });
      },
      error: function error() {
        $.toaster({
          priority: "danger",
          title: "Error",
          message: "Try again,sorry!"
        });
      }
    });
  }
}

function get_chat_id_by_user_id(user) {// $.ajax({
  //     url:"/chats/get_chat_by_user/"+ user.id,
  //     method:'GET',
  //     success:function (chat) {
  //         console.log(chat.id);
  //         return chat.id;
  //     }
  // });
}

function full_name(user) {
  return user.first_name + " " + user.second_name;
}

function repeatMethod(event) {
  if (doRepeat) {
    $(this).attr('src', '/images/media_repeat_btn.png');
    doRepeat = 0;
  } else {
    $(this).attr('src', '/images/media_unrepeat_btn.png');
    doRepeat = 1;
  }
}

function shuffleMethod(event) {
  if (doShuffle) {
    console.log("shuffleMethod");
    doShuffle = 0;
  } else {
    console.log("unshuffleMethod");
    doShuffle = 1;
  }
}

function addToPlayListMethod(event) {
  if (doAddToPlaylist) {
    $(this).attr('src', '/images/media_removefromplaylist_btn.png');
    doAddToPlaylist = 0;
  } else {
    $(this).attr('src', '/images/media_addtoplaylist_btn.png');
    doAddToPlaylist = 1;
  }
}

function muteMethod() {
  if (doMute) {
    audioPlayer.muted = true;
    $(this).attr('src', '/images/media_unmute_btn.png');
    doMute = 0;
  } else {
    audioPlayer.muted = false;
    $(this).attr('src', '/images/media_mute_btn.png');
    doMute = 1;
  }
}

function voluemMethod(event) {
  volume = audioPlayer.volume = $(this).val() / 100;
  document.getElementById('volume_start').innerHTML = parseInt(audioPlayer.volume * 100);
  document.getElementById('volume_end').innerHTML = "100";
}

function lastTrackMethod(event) {
  console.log("lastTrackMethod");
}

function back5SecMethod(event) {
  var position = parseInt(audioPlayer.currentTime) - parseInt(5);
  audioPlayer.currentTime = position;
  console.log(parseInt(position));
}

function playMethod(event) {
  songName = $(this).data('src');
  audioPlayer = document.querySelector('#player'); //there are audio or not

  if (!audioPlayer) {
    audioPlayer = document.createElement('audio');
    audioPlayer.id = 'player';
    audioPlayer.src = songName;
    audioPlayerId = $(this).data('track_id');
    document.body.appendChild(audioPlayer);
    audioPlayer.play();
    $(this).attr('src', '/images/media_pause_btn.png'); //time update

    audioPlayer.addEventListener('timeupdate', timeUpdateMethod); //for ending the track

    audioPlayer.addEventListener("ended", trackEndedMethod);
    trackIsPlaying = 1;
  } else {
    if (songName === audioPlayer.getAttribute('src')) {
      if (audioPlayer.paused) {
        audioPlayer.play();
        $(this).attr('src', '/images/media_pause_btn.png');
        trackIsPlaying = 1;
      } else {
        audioPlayer.pause();
        $(this).attr('src', '/images/media_play_btn.png');
        trackIsPlaying = 0;
      }
    } else {
      audioPlayer.src = songName;
      audioPlayerId = $(this).data('track_id');
      audioPlayer.play();
      $('.play').attr('src', '/images/media_play_btn.png');
      $(this).attr('src', '/images/media_pause_btn.png');
      trackIsPlaying = 1;
    }
  }
}

function next5SecMethod(event) {
  var position = parseInt(audioPlayer.currentTime) + parseInt(5);
  audioPlayer.currentTime = position;
  console.log(parseInt(position));
}

function nextTrackMethod(event) {
  console.log("nextTrackMethod");
}

function durationMethod(event) {
  audioPlayer.currentTime = parseInt(audioPlayer.duration * $(this).val() / 100);
}

function use_swal(message) {
  var status = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "success";
  swal({
    position: 'top-end',
    icon: status,
    title: message,
    showConfirmButton: false,
    timer: 1500,
    button: false
  });
}

function trackOptions() {
  if (audioPlayer) {
    $('#track_options-body').empty();
    var track_id = audioPlayerId;
    getTrackInfo(track_id);
  } else {
    $('#track_options-body').empty();
    $('#track_options-body').append("choose track to play from HOME and try this again.");
  }
}

function loadMorePlaylistTracks() {
  $.ajax({
    url: "/playlistTracks",
    method: 'GET',
    success: function success(playlist) {
      $('#playlist-body').empty();
      $('#playlist-body').append(playlist);
    },
    error: function error(playlist) {
      console.log(playlist);
    }
  });
}

function timeUpdateMethod() {
  var position = audioPlayer.currentTime / audioPlayer.duration * 100;
  $('#duration_start').text(parseInt(audioPlayer.currentTime));
  $('#duration_end').text(parseInt(audioPlayer.duration));
  $('#duration').val(parseInt(position));
  $('#volume_start').text(parseInt(audioPlayer.volume * 100));
  $('#volume_end').text(100);
}

function trackEndedMethod(event) {
  if (doRepeat == 0) {
    audioPlayer.parentNode.removeChild(audioPlayer); // event.target.id = '';

    event.target.src = '/images/media_play_btn.png';
    trackIsPlaying = 0;
  } else {
    document.body.appendChild(audioPlayer);
    audioPlayer.play();
  }
}

function get_sittings_blade() {
  $.ajax({
    url: "/users/settings",
    method: 'get',
    success: function success(response) {
      $('#master_view').empty();
      $('#master_view').append(response);
    }
  });
}

function get_about_blade() {
  var user_id = $(this).data('user_id');
  $.ajax({
    url: "/users/" + user_id + "/about",
    method: 'get',
    success: function success(response) {
      $('#master_view').empty();
      $('#master_view').append(response);
    }
  });
}

function get_chats_blade() {
  $.ajax({
    url: "/chats",
    method: 'get',
    success: function success(response) {
      $('#master_view').empty();
      $('#master_view').append(response);
    }
  });
}

function get_about_to_edit_blade() {
  $.ajax({
    url: "/users/about_to_edit",
    method: 'get',
    success: function success(response) {
      $('#master_view').empty();
      $('#master_view').append(response);
    }
  });
}

function get_privacy_blade() {
  $.ajax({
    url: "/users/privacy",
    method: 'get',
    success: function success(response) {
      $('#master_view').empty();
      $('#master_view').append(response);
    }
  });
}

function get_security_blade() {
  $.ajax({
    url: "/users/security",
    method: 'get',
    success: function success(response) {
      $('#master_view').empty();
      $('#master_view').append(response);
    }
  });
}

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /var/www/QuranCloud-backend/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /var/www/QuranCloud-backend/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });