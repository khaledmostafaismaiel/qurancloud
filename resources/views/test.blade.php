<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">--}}
    <link rel="stylesheet" href= "/bootstrap-4.5.2-dist/css/bootstrap.css" >
    <link rel="stylesheet" href= "/css/app.css" >
    <title>QuranCloud {{get_script_name()}}</title>
    <link rel="shortcut icon" type="image/png" href="/images/favicon.png">

    <meta name="csrf-token" content="{{csrf_token()}}">{{--for messages--}}
</head>


<body>
{{--justify-content-start--}}
{{--justify-content-center--}}
{{--justify-content-end--}}

{{--align-self-start--}}
{{--align-self-center--}}
{{--align-self-end--}}

<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white my_navbar">
    <a class="navbar-brand" href="#">
        <img id="logo" src="/images/favicon.png" alt="Quraa logo" class="navbar-brand-logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    Notifications
                    <span class="badge badge-pill badge-info">7</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Messages
                    <span class="badge badge-pill badge-info">7</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Privacy</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Sign Out</a>
                </div>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="container my_container">
    <div class="row">

        <form method="POST" action="/users" class="col-sm form-sign_up">
            {{ csrf_field() }}
            <fieldset class="">
                <legend class="form-sign_up-legend">Please, Sign up first</legend>

                <div class="form-group">
                    <label class="" for="first_name">First Name</label>
                    <input class="form-control" id="first_name" name="first_name" type="text" value=""  placeholder="Enter Your First Name" required>
                </div>

                <div class="form-group">
                    <label class="" for="second_name">Second Name</label>
                    <input class="form-control" id = "second_name" name = "second_name" type="text"  value=""  placeholder="Enter Your Second Name" required>
                </div>

                <div class="form-group">
                    <label class="" for="user_name">User name</label>
                    <input class="form-control" id="user_name" name="user_name" type="text" value=""   placeholder="Enter Your E_mail" required>
                </div>

                <div class="form-group">
                    <label class=""  for="password">Password</label>
                    <input class="form-control"  id="password" name="password"  type="password"   value=""  placeholder="Enter Your Password" required>
                </div>

                <div class="form-group">
                    <label class="" for="password_confirmation">Confirm Password</label>
                    <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"   value="" placeholder="Confirm Your Password" required>
                </div>

                <div class="form-group">
                    <label class="" for="gender">Gender</label>
                    <select name="gender" id=""  size="1" class="form-control" >
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="not_robot" name="not_robot" value="1" type="checkbox" required>
                    <label class="custom-control-label" for="not_robot">I'm not robot.</label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input"  id="terms_of_conditions" name="terms_of_conditions" value= "1"  type="checkbox" required>
                    <label class="custom-control-label" for="terms_of_conditions" >I agree with all <a href="/users/terms_of_conditions" class="alert-link alert-info">terms of conditions.</a></label>
                </div>

                <div class="form-group form-sign_up-submit" role="group">
                    <a href="/sign_in/google" class="btn" id=""><img class="form-sign_up-submit-gmail" src="/images/gmail.png" alt=""></a>
                    <input name="submit_sign_up" class="btn btn-primary" type="submit" value="sign up"/>
                    <a href="/sign_in/facebook" class="btn" id="form-sign_up-submit-facebook"><img class="form-sign_up-submit-facebook" src="/images/facebook.png" alt=""></a>
                </div>
            </fieldset>
        </form>

        <form  method="POST"  action="/users/process_sign_in" class="col-sm form-sign_in align-self-center">
            {{csrf_field()}}
            <fieldset class="">
                <legend class="form-sign_in-legend">Sign in</legend>

                <div class="form-group">
                    <label class="" for="user_name">User Name</label>
                    <input class="form-control" type="text"  id="user_name" name="user_name" value="" placeholder="Your E_mail" required>
                </div>

                <div class="form-group">
                    <label class="" for="password">Password</label>
                    <input class="form-control" type="password" id="password"  name="password" value="" placeholder="Your Password" required>
                </div>

                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="remember_me" name="remember_me" type="checkbox">
                    <label class="custom-control-label" for="remember_me">Remember Me</label>
                </div>

                <div class="form-group form-sign_in-submit" role="group">
                    <a href="/sign_in/google" class="btn"><img class="form-sign_in-submit-gmail" src="/images/gmail.png" alt=""></a>
                    <input name="submit_sign_in" class="btn btn-primary" type="submit"  value="SIGN IN"/>
                    <a href="/sign_in/facebook" class="btn"><img class="form-sign_in-submit-facebook" src="/images/facebook.png" alt=""></a>
                </div>
            </fieldset>
        </form>

    </div>
</div>

















<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
{{--    <script  src="/bootstrap-4.5.2-dist/js/bootstrap.js" type="module"> </script>--}}
{{--<script  src="/js/app.js" type="module"> </script>--}}
</body>
