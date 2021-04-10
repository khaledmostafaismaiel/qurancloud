@if(Session::has('message'))
    <script>
        {{--var type = "{{Session::get('alert-type')}}";--}}
        // switch(type){
        {{--    case 'info': tostar.info("{{Session::get('message')}}")--}}
        //         break;
        //
        {{--    case 'success': tostar.success("{{Session::get('message')}}")--}}
        //         break;
        //
        {{--    case 'warning': tostar.warning("{{Session::get('message')}}")--}}
        //         break;
        //
        {{--    case 'error': tostar.error("{{Session::get('message')}}")--}}
        //         break;
        //
        //     default : tostar.info("Hi");
        //         break;
        // }
        tostar.success("{{Session::get('message')}}")
    </script>
{{--    <div class="message-session">--}}
{{--        <span class = "message-session-span">{{ session('message') }}</span>--}}
{{--    </div>--}}

@endif
