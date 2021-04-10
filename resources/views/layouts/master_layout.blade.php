<!DOCTYPE html>
<html>
@include('layouts/head')
@include('layouts/error_messages')
<div id="master_view" class="master_view">
@yield('content')
</div>
@include('layouts/footer')
</html>
