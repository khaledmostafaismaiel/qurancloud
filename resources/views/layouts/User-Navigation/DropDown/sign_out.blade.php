<a class="dropdown-item" href="#">
    <form method="post" action="/users/process_sign_out">
        {{csrf_field()}}
        <input type="submit" value="sign out" class="btn btn-danger w-100">
    </form>
</a>
