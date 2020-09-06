<nav class="sidebar">
    <ul class="advertise-side-nav">
        @for($i=0 ; $i < 5 ;++$i)
            <li class="advertise-side-nav__item /*advertise-side-nav__item--active*/">
                <a href="/users/{{auth()->id()}}" class="advertise-side-nav__link">
                    <img src="/images/user-6.jpg" alt="User photo" class="side-nav__user-photo">
                    <span>jane doo</span>
                </a>
            </li>
            <li class="advertise-side-nav__item">
                <a href="/users/{{auth()->id()}}" class="advertise-side-nav__link">
                    <img src="/images/user-1.jpg" alt="User photo" class="side-nav__user-photo">
                    <span>june doo</span>
                </a>
            </li>
        @endfor
    </ul>
</nav>
