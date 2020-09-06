@extends('layouts.master_layout')
@section('content')
    <nav class="settings_sidebar">
        <ul class="settings-nav flex-container-row-wrap">

            <li class="settings-nav__item /*settings-nav__item--active*/">
                <a href="/users/{{auth()->id()}}/about_to_edit" class="settings-nav__link">
                    <svg class="settings-nav__icon">
                        <use xlink:href="/images/sprite.svg#icon-chevron-thin-right"></use>
                    </svg>
                    <span>Edit About</span>
                </a>
            </li>

            <li class="settings-nav__item">
                <a href="" class="settings-nav__link">
                    <svg class="settings-nav__icon">
                        <use xlink:href="/images/sprite.svg#icon-chevron-thin-right"></use>
                    </svg>
                    <span>Praivcy</span>
                </a>
            </li>

            <li class="settings-nav__item">
                <a href="" class="settings-nav__link">
                    <svg class="settings-nav__icon">
                        <use xlink:href="/images/sprite.svg#icon-chevron-thin-right"></use>
                    </svg>
                    <span>Security</span>
                </a>
            </li>
        </ul>

    </nav>
@endsection
