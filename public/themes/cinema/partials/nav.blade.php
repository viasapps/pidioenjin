<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}"><span class="orange" >Video</span>Engine</a>
        </div>
        @if($register_on)
        <div id="navbar" >
            <ul class="nav navbar-nav navbar-right">
                @if(!$logged_in)
                <li class="@if($active ==  'login') active @endif user"><a href="{{ url('user/login')}}" ><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;&nbsp;Login</a></li>
                <li class="@if($active ==  'register') active @endif user"><a href="{{ url('user/signup')}}" ><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;&nbsp;Register</a></li>
                @else
                <li class="user"><p>Welcome, {{ $user->name }}</p></li>
                <li class="@if($active ==  'login') active @endif user"><a href="{{ url('user/logout')}}" ><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;&nbsp;Logout</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
        @endif
    </div>
</nav>