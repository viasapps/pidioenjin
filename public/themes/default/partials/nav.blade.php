<!-- Navigation -->
<header class="navbar navbar-fixed-top">
    <div class="inner-page">
        <h1 class="logo">{{ link_to_route('home', $config['name']) }}</h1>
        <div id="nav" class="closed closed" aria-hidden="false" style="transition: max-height 400ms; -webkit-transition: max-height 400ms; position: relative;">
            <ul class="nav">
                <li class="@if($active ==  'home') active @endif">{{ link_to('/', 'Home') }}</li>
                <li class="@if($active ==  'popular') active @endif">{{ link_to('popular', 'Popular') }}</li>
                <li class="@if($active ==  'newest') active @endif">{{ link_to('newest', 'New') }}</li>
                <li class="@if($active ==  'random') active @endif">{{ link_to('random', 'Random') }}</li>
                @if(!$logged_in)
                <li class="@if($active ==  'login') active @endif"><a title="" href="{{ url('user/login')}}" class=""><i class="icon icon-key"></i> Login</a></li>
                @else
                <li class="@if($active ==  'login') active @endif"><a title="" href="{{ url('user/logout')}}" class=""><i class="icon icon-key"></i> Logout</a></li>
                @endif
            </ul>
        </div>
    </div> 
</header>