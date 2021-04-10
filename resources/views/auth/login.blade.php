@extends('layouts.master_layout')
@section('content')
<div class="container">
    <div class="row">
        @include('auth.sign_up')
        @if(! isset($complete_sign_up))
            @include('auth.sign_in')
        @endif
    </div>
</div>
@endsection
