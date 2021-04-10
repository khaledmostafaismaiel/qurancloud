@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--@if($errors->any())--}}
{{--    <div>--}}
{{--        <ul>--}}
{{--            <script>--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                alert({{ $error }});--}}
{{--                @endforeach--}}
{{--            </script>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}
