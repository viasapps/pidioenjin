<div class="row-fluid contact color-2" style="position:relative;bottom:-40px; margin-bottom:-40px;">
    <h1 class="page-headline ">Please Login or Register to Download</h1>
    <div class="span6">
        <h3>Login</h3>

        @if ( Session::get('error') )
        <div class="alert alert-error">{{{ Session::get('error') }}}</div>
        @endif

        @if ( Session::get('notice') )
        <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif
        <form method="POST" action="{{{ Confide::checkAction('UserController@do_login') ?: URL::to('/user/login') }}}" accept-charset="UTF-8">
            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
            
            <input tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
            
            <input tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
            <small>
                <a href="{{{ (Confide::checkAction('UserController@forgot_password')) ?: 'forgot' }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
            </small>
            <br>
            <label for="remember" class="checkbox">{{{ Lang::get('confide::confide.login.remember') }}}
                <input type="hidden" name="remember" value="0">
                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
            </label>
            <button type="submit" class="btn btn-centered">{{{ Lang::get('confide::confide.login.submit') }}}</button>
        </form>
    </div>
    <div class="span6">
        <h3>Register</h3>
        @if ( Session::get('error') )
        <div class="alert alert-error">
            @if ( is_array(Session::get('error')) )
            {{ head(Session::get('error')) }}
            @endif
        </div>
        @endif

        @if ( Session::get('notice') )
        <div class="alert">{{ Session::get('notice') }}</div>
        @endif
        <form method="POST" action="{{{ (Confide::checkAction('UserController@store')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
            
            <input placeholder="Username" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">

            <input placeholder="Your Name" type="text" name="name" id="name" value="{{{ Input::old('name') }}}">

            <input placeholder="Email" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">

            <input placeholder="Password" type="password" name="password" id="password">

            <input placeholder="Confirm Password" type="password" name="password_confirmation" id="password_confirmation">

            

            <div class="form-actions">
                <button type="submit" class="btn btn-centered">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
            </div>

        </form>

    </div>
</div>
