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
            <a href="/sign_in/google" id="form-sign_in-submit-gmail"><img class="form-sign_in-submit-gmail-logo" src="/images/gmail.png" alt=""></a>
            <input name="submit_sign_in" class="btn btn-primary" type="submit"  value="SIGN IN"/>
            <a href="/sign_in/facebook" id="form-sign_in-submit-facebook"><img class="form-sign_in-submit-facebook-logo" src="/images/facebook.png" alt=""></a>
        </div>
    </fieldset>
</form>
