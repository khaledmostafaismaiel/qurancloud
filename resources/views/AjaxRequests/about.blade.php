<div class="about_container flex-container-column-wrap">
    <img class="about-background_pic" src="/storage/uploads/cover_pictures/{{$user->cover_picture}}" alt="cover_pic">
    @if(isset($about_to_edit))
        <form method="post" id="upload_cover_picture" action="/users/{{auth()->id()}}" enctype="multipart/form-data" data-user_id="{{auth()->id()}}" data-can_edit="cover_picture">
            {{csrf_field()}}
            {{method_field('patch')}}
            <input type="file" name="cover_picture" required>
            <input type="submit"  class="btn btn-info" name="cover_picture" value="Edit">
        </form>
    @endif


    <img src="/storage/uploads/profile_pictures/{{$user->profile_picture}}" alt="User photo" class="about-profile_pic">
    @if(isset($about_to_edit))
        <form method="POST"  id="upload_profile_picture" action="/users/{{auth()->id()}}" enctype="multipart/form-data" data-user_id="{{auth()->id()}}">
            {{csrf_field()}}
            {{method_field('patch')}}
            <input type="file" name="profile_picture" required>
            <input type="submit"  class="btn btn-info" name="profile_picture" value="Edit" >
        </form>
    @endif

    <div class="about-personal_info flex-container-column-wrap">
        <div class="about-personal_info-first_name flex-container-row-wrap">
            <label for="" class="about-personal_info-first_name-label">First name</label>
            <input name="first_name" class="about-personal_info-first_name-input" type="text" value="{{$user->first_name}}" readonly>
            @if(isset($about_to_edit))
                <span class="btn btn-info btn-comment-form" data-can_edit="first_name" data-auth_id="{{auth()->id()}}">Edit</span>
            @endif
        </div>

        <div class="about-personal_info-second_name flex-container-row-wrap">
            <label class="about-personal_info-second_name-label" for="">Second name</label>
            <input name="second_name" class="about-personal_info-second_name-input" type="text" value="{{$user->second_name}}"  readonly>
            @if(isset($about_to_edit))
                <span class="btn btn-info btn-comment-form" data-can_edit="second_name" data-auth_id="{{auth()->id()}}">Edit</span>
            @endif
        </div>

        <div class="about-personal_info-from flex-container-row-wrap">
            <label class="about-personal_info-from-label" for="">From</label>
            <select class="form-select about-personal_info-from-input" size="1" aria-label="size 3 select example" name="from" disabled>
                <option @if($user->from == null) selected @endif>I'm from</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}" @if($country->id == $user->from) selected @endif>{{$country->name}}</option>
                @endforeach
            </select>

            @if(isset($about_to_edit))
                <span class="btn btn-info btn-comment-form"  data-can_edit="from" data-auth_id="{{auth()->id()}}">Edit</span>
            @endif
        </div>

        <div class="about-personal_info-lives flex-container-row-wrap">
            <label class="about-personal_info-lives-label" for="">Lives in</label>
            <select class="form-select about-personal_info-from-input" size="1" aria-label="size 3 select example" name="lives" disabled>
                <option @if($user->from == null) selected @endif>Lives In</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}" @if($country->id == $user->lives) selected @endif>{{$country->name}}</option>
                @endforeach
            </select>
            @if(isset($about_to_edit))
                <span class="btn btn-info btn-comment-form"  data-can_edit="lives" data-auth_id="{{auth()->id()}}">Edit</span>
            @endif
        </div>

        <div class="about-personal_info-study_at flex-container-row-wrap">
            <label class="about-personal_info-study_at-label" for="">Study</label>
            <input name="study" class="about-personal_info-study_at-input" type="text" value="{{$user->study}}" readonly>
            @if(isset($about_to_edit))
                <span class="btn btn-info btn-comment-form" data-can_edit="study" data-auth_id="{{auth()->id()}}">Edit</span>
            @endif
        </div>

        <div class="about-personal_info-work flex-container-row-wrap">
            <label class="about-personal_info-work-label" for="">Work</label>
            <input name="work" class="about-personal_info-work-input" type="text" value="{{$user->work}}" readonly>
            @if(isset($about_to_edit))
                <span class="btn btn-info btn-comment-form"  data-can_edit="work" data-auth_id="{{auth()->id()}}">Edit</span>
            @endif
        </div>

        <div class="about-personal_info-gender flex-container-row-wrap">
            <label class="about-personal_info-gender-label" for="">Gender</label>
            <select name="gender" id=""  size="1" class="form-select about-personal_info-from-input" disabled>
                <option value="" @if($user->from == null) selected @endif>Gender</option>
                @foreach($genders as $gender)
                    <option value="{{$gender->id}}" @if($gender->id == $user->gender) selected @endif>{{$gender->name}}</option>
                @endforeach
            </select>
            @if(isset($about_to_edit))
                <span class="btn btn-info btn-comment-form" data-can_edit="gender" data-auth_id="{{auth()->id()}}">Edit</span>
            @endif
        </div>
    </div>
</div>
