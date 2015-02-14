{{ Theme::partial('header')}}

    {{ Theme::partial('nav', array()) }}
    {{ Theme::place('content')}}
    {{ Theme::partial('related', array('videos' => $related_videos))}}
    {{ Theme::partial('search', array('position' => 'footer', 'search' => $video->title))}}
    @if(Route::currentRouteName() == 'video')
    	<div class="row-fluid inner-page color-4"> 
    	{{ spp($video->title) }}
    	</div>
    @endif

{{ Theme::partial('footer') }}