@extends('layouts.master_layout')
@section('content')
    <div class="about_container flex-container-column-wrap">
        <img class="about-background_pic" src="/storage/uploads/cover_pictures/{{$user->cover_picture}}" alt="cover_pic">
        <img src="/storage/uploads/profile_pictures/{{$user->profile_picture}}" alt="User photo" class="about-profile_pic">

        <div class="about-personal_info flex-container-column-wrap">
                <div class="about-personal_info-first_name flex-container-row-wrap">
                    <label for="" class="about-personal_info-first_name-label">First name</label>
                    <input class="about-personal_info-first_name-input" type="text" value="{{$user->first_name}}" readonly>
                </div>
                <div class="about-personal_info-second_name flex-container-row-wrap">
                    <label class="about-personal_info-second_name-label" for="">Second name</label>
                    <input class="about-personal_info-second_name-input" type="text" value="{{$user->second_name}}" readonly>
                </div>
                <div class="about-personal_info-from flex-container-row-wrap">
                    <label class="about-personal_info-from-label" for="">From</label>
                    <input class="about-personal_info-from-input" type="text" value="{{$user->from}}" readonly>
                </div>
                <div class="about-personal_info-lives flex-container-row-wrap">
                    <label class="about-personal_info-lives-label" for="">Lives in</label>
                    <input class="about-personal_info-lives-input" type="text" value="{{$user->lives}}" readonly>
                </div>
                <div class="about-personal_info-study_at flex-container-row-wrap">
                    <label class="about-personal_info-study_at-label" for="">Study</label>
                    <input class="about-personal_info-study_at-input" type="text" value="{{$user->study}}" readonly>
                </div>
                <div class="about-personal_info-work flex-container-row-wrap">
                    <label class="about-personal_info-work-label" for="">Work</label>
                    <input class="about-personal_info-work-input" type="text" value="{{$user->work}}" readonly>
                </div>
                <div class="about-personal_info-gender flex-container-row-wrap">
                    <label class="about-personal_info-gender-label" for="">Gender</label>
                    <input class="about-personal_info-gender-input" type="text" value="{{$user->gender}}" readonly>
                </div>
        </div>
    </div>
@endsection
