<!-- Navigation -->	
	<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ route('home') }}" class="navbar-brand">{{ $config['name'] }}</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav navbar-right">
				<li class="@if($active ==  'home') active @endif">{{ link_to('/', 'Home') }}</li>
				<li class="@if($active ==  'popular') active @endif">{{ link_to('popular', 'Popular') }}</li>
				<li class="@if($active ==  'newest') active @endif">{{ link_to('newest', 'New') }}</li>
				<li class="@if($active ==  'random') active @endif">{{ link_to('random', 'Random') }}</li>
				@if(!$logged_in)
				<li class="@if($active ==  'login') active @endif"><a title="" href="{{ url('user/login')}}" class=""><i class="glyphicon glyphicon-user"></i> Login</a></li>
				@else
				<li class="@if($active ==  'login') active @endif"><a title="" href="{{ url('user/logout')}}" class=""><i class="glyphicon glyphicon-user"></i> Logout</a></li>
				@endif
          </ul>
        </div>
      </div>
    </div>
	
	