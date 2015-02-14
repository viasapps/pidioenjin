<div class="row-fluid contact color-2" style="position:relative;bottom:-40px; margin-bottom:-40px;">
    <div class="span6 offset3">
        <h3>Reset Password</h3>
        <form method="POST" action="{{{ (Confide::checkAction('UserController@do_reset_password')) ?: URL::to('/user/reset') }}}" accept-charset="UTF-8">
            <input type="hidden" name="token" value="{{{ $token }}}">
            
            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

            <input placeholder="New Password" type="password" name="password" id="password">

            <input placeholder="Confirm Password" type="password" name="password_confirmation" id="password_confirmation">

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

            <div class="form-actions">
                <button type="submit" class="btn btn-centered">{{{ Lang::get('confide::confide.forgot.submit') }}}</button>
            </div>

        </form>

    </div>
</div>
