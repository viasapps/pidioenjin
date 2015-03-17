<?php 
  $color = $key%2 == 0 ? 4 : 1;
  if($key == 2){ $pull = 'thumb-right'; }
  else if($key == 5){ $pull = 'thumb-right'; }
  else if($key == 8){ $pull = 'thumb-right'; }
  else if($key == 11){ $pull = 'thumb-right'; }
  else if($key == 14){ $pull = 'thumb-right'; }  
  else if($key == 17){ $pull = 'thumb-right'; }
  else {$pull = 'thumb-left'; }
?>
	<div class="thumbnail {{ $pull }}">
    	<a href="{{ route('video', $video->slug) }}">
        <div class="overlay"> </div>
        <div class="thumb"><img class="border-radius-top" src="{{ $video->thumbnail_hq }}" alt="{{ $video->title}}" title="{{ $video->title}}">        </div></a>
		<div class="thumb-title">
        <?php $duration = gmdate("H:i:s", $video->duration); ?>
			<h2>{{link_to_route('video', substr($video->title,0,40), array('slug' => $video->slug))}}</h2>
            <span class="like" title="likes">{{ $video->likes }}</span>
            <span class="view" title="views">{{ number_format($video->views) }}</span>
            <span class="duration" title="duration">{{ $duration }} seconds</span>
			<p>{{ $video->excerpt }}</p>
		</div> 
	</div>