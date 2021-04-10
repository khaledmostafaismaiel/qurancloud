<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    @include('layouts.User-Navigation.DropDown.about_to_edit')
    @include('layouts.User-Navigation.DropDown.privacy')
    @include('layouts.User-Navigation.DropDown.security')
    @include('layouts.User-Navigation.DropDown.settings')

    <div class="dropdown-divider"></div>
        @include('layouts.User-Navigation.DropDown.sign_out')
</div>
