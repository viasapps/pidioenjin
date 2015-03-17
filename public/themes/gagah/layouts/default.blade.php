{{ Theme::partial('header')}} 
<?php 
	$page_titles = explode(' ',$page_title);
	$last_page_title = end($page_titles);
	$page_title = str_replace($last_page_title,'<span>'.$last_page_title.'</span>',$page_title);
?>
<div class="main">
	<div class="content">
    	<div class="content-title"><h3>{{ $page_title }}</h3></div>
        <div class="content-post"> 
        	@foreach($videos as $key => $video)
              {{ Theme::partial('item', array('video' => $video, 'key' => $key ))}}
              @if($key == 1)                    
              @endif
            @endforeach
            <div style="clear:both"></div>
        </div>
        <div class="pagination"> 
            @if(isset($paginator))
              {{ $paginator->links() }}
            @endif 
        </div>
        @if(Route::currentRouteName() == 'term')
            <div class="widget inner-page color-4"> 
            {{ spp($term->term) }}
            </div>
                <div style="clear:both"></div>
            </div><!-- end  -->
        @endif
    </div>
    <div style="clear:both"></div>
</div><!-- end main -->
{{ Theme::partial('footer') }}