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
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	</div>