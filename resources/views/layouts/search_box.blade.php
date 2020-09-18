<div class="search"  id="user-nav__search_box">
    <input type="text" name="search" id="search" class="search__input" placeholder="Search">
    <div class="search__button">
{{--        <a href="/tracks">--}}
            <svg class="search__icon">
                <use xlink:href="/images/sprite.svg#icon-magnifying-glass"></use>
            </svg>
{{--        </a>--}}
    </div>
    <div class="search-records" id="search-records">
        <table class="table table-striped table-dark table-hover" id="tracks-table">
            <thead>
                <tr>
                    <th class="d-flex justify-content-center">
                        <p>Tracks</p>&nbsp;
                        (<p id="total_tracks_records"></p>)
                    </th>
                    <th>
                        &nbsp;
                    </th>

                </tr>
            </thead>
            <tbody id="tracks-table-body">

            </tbody>
        </table>

        <table class="table table-striped table-dark table-hover" id="users-table">
            <thead>
                <tr>
                    <th class="d-flex justify-content-center">
                        <p>Users</p>&nbsp;
                        (<p id="total_users_records"></p>)
                    </th>
                    <th>
                        &nbsp;
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody  id="users-table-body">


            </tbody>
        </table>
    </div>
</div>
