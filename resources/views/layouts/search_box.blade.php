<form action="/tracks/search/{{auth()->id()}}" method="POST" class="search">
    {{csrf_field()}}
    <input type="text" name="search" class="search__input" placeholder="Search">
    <button class="search__button">
        <svg class="search__icon">
            <use xlink:href="/images/sprite.svg#icon-magnifying-glass"></use>
        </svg>
    </button>
</form>
