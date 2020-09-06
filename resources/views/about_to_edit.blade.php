@extends('layouts.master_layout')
@section('content')
    <div class="about_container flex-container-column-wrap">

        <div class="">
            <img class="about-background_pic" src="/storage/uploads/cover_pictures/{{$user->cover_picture}}" alt="cover_pic">
            @if($can_edit == "cover_picture")
                <form method="post" enctype="multipart/form-data" action="/users/{{$user->id}}">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php /*echo $max_file_size; */?>" />
                    <input type="file" name="cover_picture" required />
                    <input type="submit"  class="btn btn-comment-form" name="cover_picture" value="edit">
                </form>
            @else
                <a class="btn btn-comment-form" href="/users/{{$user->id}}/edit?can_edit=cover_picture">Edit</a>
            @endif
        </div>

        <div class="">
            <img src="/storage/uploads/profile_pictures/{{$user->profile_picture}}" alt="User photo" class="about-profile_pic">
            @if($can_edit == "profile_picture")
                <form action="/users/{{$user->id}}" enctype="multipart/form-data" method="POST" class="">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php /*echo $max_file_size; */?>" />
                    <input type="file" name="profile_picture" required />
                    <input type="submit"  class="btn btn-comment-form" name="submit" value="edit">
                </form>
            @else
                <a class="btn btn-comment-form" href="/users/{{$user->id}}/edit?can_edit=profile_picture">Edit</a>
            @endif

        </div>

        <div class="about-personal_info flex-container-column-wrap">
            <div class="about-personal_info-first_name">
                <label for="" class="about-personal_info-first_name-label">First name</label>
                @if($can_edit == "first_name")
                    <form method="post" action="/users/{{$user->id}}">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <input name="first_name" class="about-personal_info-first_name-input" type="text" value="{{$user->first_name}}"  required>
                        <input type="submit" value="ok" class="btn btn-comment-form">
                    </form>
                @else
                    <input class="about-personal_info-first_name-input" type="text" value="{{$user->first_name}}" readonly >
                    <a class="btn btn-comment-form" href="/users/{{$user->id}}/edit?can_edit=first_name">Edit</a>

                @endif
            </div>
            <div class="about-personal_info-second_name">
                <label class="about-personal_info-second_name-label" for="">Second name</label>
                @if($can_edit == "second_name")
                    <form method="post" action="/users/{{$user->id}}">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <input name="second_name" class="about-personal_info-second_name-input" type="text" value="{{$user->second_name}}"  required>
                        <input type="submit" value="ok" class="btn btn-comment-form">
                    </form>
                @else
                    <input class="about-personal_info-second_name-input" type="text" value="{{$user->second_name}}" readonly>
                    <a class="btn btn-comment-form" href="/users/{{$user->id}}/edit?can_edit=second_name">Edit</a>
                @endif
            </div>
            <div class="about-personal_info-from">
                <label class="about-personal_info-from-label" for="">From</label>
                @if($can_edit == "from")
                    <form method="post" action="/users/{{$user->id}}">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <input name="from" class="about-personal_info-from-input" type="text" value="{{$user->from}}"  required>
                        <input type="submit" value="ok" class="btn btn-comment-form">
                    </form>
                @else
                    <input class="about-personal_info-from-input" type="text" value="{{$user->from}}" readonly>
                    <a class="btn btn-comment-form" href="/users/{{$user->id}}/edit?can_edit=from">Edit</a>
                @endif
            </div>
            <div class="about-personal_info-lives">
                <label class="about-personal_info-lives-label" for="" readonly>Lives</label>
                @if($can_edit == "lives" )
                    <form method="post" action="/users/{{$user->id}}">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <input name="lives" class="about-personal_info-lives-input" type="text" value="{{$user->lives}}" required>
                        <input type="submit" value="ok" class="btn btn-comment-form" >
                    </form>
                @else
                    <input class="about-personal_info-lives-input" type="text" value="{{$user->lives}}" readonly>
                    <a class="btn btn-comment-form"  href="/users/{{$user->id}}/edit?can_edit=lives">Edit</a>
                @endif
            </div>
            <div class="about-personal_info-study_at">
                <label class="about-personal_info-study_at-label" for="" readonly>Study</label>
                @if($can_edit == "study" )
                    <form method="post" action="/users/{{$user->id}}">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <input name="study" class="about-personal_info-study_at-input" type="text" value="{{$user->study}}" required>
                        <input type="submit" value="ok" class="btn btn-comment-form" >
                    </form>
                @else
                    <input class="about-personal_info-study_at-input" type="text" value="{{$user->study}}" readonly>
                    <a class="btn btn-comment-form"  href="/users/{{$user->id}}/edit?can_edit=study">Edit</a>
                @endif
            </div>
            <div class="about-personal_info-work">
                <label class="about-personal_info-study_at-label" for="" readonly>Work</label>
                @if($can_edit == "work" )
                    <form method="post" action="/users/{{$user->id}}">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <input name="work" class="about-personal_info-work-input" type="text" value="{{$user->work}}" required>
                        <input type="submit" value="ok" class="btn btn-comment-form" >
                    </form>
                @else
                    <input class="about-personal_info-work-input" type="text" value="{{$user->work}}" readonly>
                    <a class="btn btn-comment-form"  href="/users/{{$user->id}}/edit?can_edit=work">Edit</a>
                @endif
            </div>
            <div class="about-personal_info-gender">
                <label class="about-personal_info-gender-label" for="" readonly>Gender</label>
                @if($can_edit == "gender")
                    <form method="post" action="/users/{{$user->id}}">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <div class="flex-container-row-wrap">
                            <label class="about-personal_info-gender-label" for="" readonly>Male</label>
                            <input required name="gender" type="radio" value="Male" placeholder="Male" class="about-personal_info-gender-input">
                        </div>
                        <div class="flex-container-row-wrap">
                            <label class="about-personal_info-gender-label" for="" readonly>Female</label>
                            <input required name="gender" type="radio" value="Female" class="about-personal_info-gender-input">
                        </div>
                        <input type="submit" value="ok" class="btn btn-comment-form">
                    </form>
                @else
                    <input class="about-personal_info-gender-input" type="text" value="{{$user->gender}}" readonly>
                    <a class="btn btn-comment-form" href="/users/{{$user->id}}/edit?can_edit=gender">Edit</a>
                @endif
            </div>
        </div>
    </div>

@endsection
