{{ Theme::partial('header')}}

    {{ Theme::partial('nav', array()) }}
    
    {{ Theme::partial('search', array('position' => 'header'))}}

    @foreach($videos as $key => $video)
      {{ Theme::partial('item', array('video' => $video, 'key' => $key ))}}
      @if($key == 1)
        
      @endif
    @endforeach

    @if(Route::currentRouteName() == 'term')
    	<div class="row-fluid inner-page color-4"> 
    	{{ spp($term->term) }}
    	</div>
    @endif

{{ Theme::partial('footer') }}