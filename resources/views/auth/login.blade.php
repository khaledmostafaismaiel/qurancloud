@extends('layouts.master_layout')
@section('content')
<div class="container">
    <div class="row">
        <form method="POST" action="/users" class="col-sm form-sign_up">
            {{ csrf_field() }}
            <fieldset class="">
                <legend class="form-sign_up-legend">Please, Sign up first</legend>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label class="" for="first_name">First Name</label>
                            <input class="form-control" id="first_name" name="first_name" type="text" value=""  placeholder="Enter Your First Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="" for="second_name">Second Name</label>
                            <input class="form-control" id = "second_name" name = "second_name" type="text"  value=""  placeholder="Enter Your Second Name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="" for="user_name">User name</label>
                    <input class="form-control" id="user_name" name="user_name" type="text" value=""   placeholder="Enter Your E_mail" required>
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label class=""  for="password">Password</label>
                            <input class="form-control"  id="password" name="password"  type="password"   value=""  placeholder="Enter Your Password" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="" for="password_confirmation">Confirm Password</label>
                            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"   value="" placeholder="Confirm Your Password" required>
                        </div>
                    </div>
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
                    <input class="form-control" type="text"  id="user_name" name="user_name" value="" placeholder="Your User Name" required aria-describedby="user_name" >
                    @if($errors->user_name || $errors->password)
                        <div id="user_name" class="invalid-feedback text-danger" >
                            Please provide a valid user name or password.
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label class="" for="password">Password</label>
                    <input class="form-control" type="password" id="password"  name="password" value="" placeholder="Your Password" required aria-describedby="password" >

                    @if($errors->user_name || $errors->password)
                        <div id="password" class="invalid-feedback">
                            Please provide a valid user name or password.
                        </div>
                    @endif
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
@endsection
