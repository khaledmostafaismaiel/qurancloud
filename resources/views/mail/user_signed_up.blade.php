@component('mail::chat')
    # New user had signed up now!
    * first name: {{ $user->first_name }}
    * second name: {{ $user->second_name }}
    * user name: {{ $user->user_name }}

    @component('mail::button', ['url' => env('WEBSITE_DOMAIN').'/users/'.$user->id])
        User Profile
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
