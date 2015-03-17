<li class="span5">
	<div class="relateds">
    	<a href="{{ route('video', $video->slug) }}">
        <div class="overlay"> </div>
        <div class="thumb"><img class="border-radius-top" src="{{ $video->thumbnail_hq }}" alt="{{ $video->title}}" title="{{ $video->title}}">        </div></a>
		<div class="thumb-title">
			<h5>
			{{link_to_route('video', substr($video->title,0,100), array('slug' => $video->slug))}}
			</h5> 
		</div>
	</div>
</li>