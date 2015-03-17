<!-- start -->	
	<div class="col-md-12 col-xs-12">
		<div class="nav row">
			<div class="col-md-4 col-xs-4">
				<a class="link" href="{{ route('video', $video->slug) }}" >  
					<img class="img-responsive" src="{{ $video->thumbnail_hq }}" alt="{{ $video->title}}" title="{{ $video->title}}" />
				</a>
			</div>
			<div class="col-md-8 col-xs-8">
				<h5>{{ link_to_route('video', $video->title, array('slug' => $video->slug))}}</h5>
				  <?php $duration = gmdate("H:i:s", $video->duration); ?>
			
            <span class="like" title="likes">{{ number_format($video->likes) }} likes </span>
            <span class="view" title="views">{{ number_format($video->views) }} views</span>
            <span class="duration" title="duration">{{ $duration }} seconds</span>
            <p>{{ $video->excerpt }}</p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	</div>