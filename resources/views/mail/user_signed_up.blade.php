@component('mail::message')
    # New user had signed up now!
    * User ID: {{ $user->id }}
    * First Name: {{ $user->first_name }}
    * Second Name: {{ $user->second_name }}
    * User Name: {{ $user->user_name }}

    @component('mail::button', ['url' => env('WEBSITE_DOMAIN').'/users/'.$user->id])
        User Profile
    @endcomponent

    Thanks,{{ config('app.name') }}
@endcomponent
