<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">{{ $config['name'] }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="@if($active ==  'home') active @endif"><a href="{{ url('')}}" ><i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;Home</a></li>
                <li class="@if($active ==  'popular') active @endif"><a href="{{ url('popular')}}" ><i class="glyphicon glyphicon-star"></i>&nbsp;&nbsp;Popular</a></li>
                <li class="@if($active ==  'newest') active @endif"><a href="{{ url('newest')}}" ><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;New</a></li>
                <li class="@if($active ==  'random') active @endif"><a href="{{ url('random')}}" ><i class="glyphicon glyphicon-random"></i>&nbsp;&nbsp;Random</a></li>
                @if(!$logged_in)
                <li class="@if($active ==  'login') active @endif"><a href="{{ url('user/login')}}" ><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Login</a></li>
                @else
                <li class="@if($active ==  'login') active @endif"><a href="{{ url('user/logout')}}" ><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Logout</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>