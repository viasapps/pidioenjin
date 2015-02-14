<div class="col-md-6 col-md-offset-3" >
    <div class="well well-sm blue login-header" >
        <h3>Login</h3>
    </div>
    @if ( Session::get('error') )
    <div class="alert alert-danger">{{{ Session::get('error') }}}</div>
    @endif

    @if ( Session::get('notice') )
    <div class="alert alert-warning">{{{ Session::get('notice') }}}</div>
    @endif

    <div class="well well-sm dark login-body" >
        <form method="POST" action="{{{ Confide::checkAction('UserController@do_login') ?: URL::to('/user/login') }}}" accept-charset="UTF-8">
            {{ Form::token() }}
            <div class="form-group">
                <label for="email">Username or Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" value="{{{ Input::old('email') }}}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="{{{ Lang::get('confide::confide.password') }}}">
            </div>
            <div class="checkbox">
                <label>
                    <input type="hidden" name="remember" value="0">
                    <input type="checkbox" name="remember" id="remember" value="1" > {{{ Lang::get('confide::confide.login.remember') }}}
                </label>
            </div>

            <button type="submit" class="btn btn-clgt btn-default">{{{ Lang::get('confide::confide.login.submit') }}}</button>

            <a class="btn btn-clgt" href="{{{ url('user/signup') }}}">Register</a>
            
            <small>
                <a href="{{{ (Confide::checkAction('UserController@forgot_password')) ?: 'forgot' }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
            </small>
        </form>	
    </div> 
</div>