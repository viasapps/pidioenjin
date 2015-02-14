{{ Theme::partial('header')}}
{{ Theme::partial('nav')}}
<div class="container">
    {{ Theme::partial('search')}}
    {{ Theme::place('content')}}
    @if(Route::currentRouteName() == 'term')
    <div class="row spp-term">
        <div class="col-xs-12" >
            {{ spp($term->term) }}
        </div>
    </div>
    <div class="row" >

        <div class="col-xs-12" >
            <div class="line3" >

            </div>
        </div>

    </div>
    @endif
</div>
{{ Theme::partial('footer')}}