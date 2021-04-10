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
            <select name="gender" id=""  size="1" class="form-control" required>
                <option value="" selected>Gender</option>
                @foreach(App\Gender::all() as $gender)
                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" id="not_robot" name="not_robot" value="1" type="checkbox" required>
            <label class="custom-control-label" for="not_robot">I'm not robot.</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input class="custom-control-input"  id="terms_of_conditions" name="terms_of_conditions" value= "1"  type="checkbox" required>
            <label class="custom-control-label" for="terms_of_conditions" >I agree with all <a href="/users/terms_of_conditions" class="alert-link">terms of conditions.</a></label>
        </div>

        <div class="form-group form-sign_up-submit" role="group">
            <input name="submit_sign_up" class="btn btn-primary" type="submit" value="sign up"/>
        </div>
    </fieldset>
</form>
