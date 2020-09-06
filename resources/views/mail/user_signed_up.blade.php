@component('mail::message')
    # New user had signed up now!
    * first name: {{ $user->first_name }}
    * second name: {{ $user->second_name }}
    * user name: {{ $user->user_name }}

    @component('mail::button', ['url' => 'http://localhost:8000/users/'.$user->id])
        User Profile
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
{{--@component('mail::message')--}}
{{--    # New user had signed up now!--}}
{{--    * first name: {{ session('authUser')->first_name }}--}}
{{--    * second name: {{ session('authUser')->second_name }}--}}
{{--    * user name: {{ session('authUser')->user_name }}--}}

{{--    @component('mail::button', ['url' => 'http://localhost:8000/users/'.session('authUser')->id])--}}
{{--        User Profile--}}
{{--    @endcomponent--}}

{{--    Thanks,<br>--}}
{{--    {{ config('app.name') }}--}}
{{--@endcomponent--}}
