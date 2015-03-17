<!-- start video-play -->	
		
			<div class="panel-heading">
				<h3 class="panel-title">{{ $video->title}}</h3>
			</div>
			<div class="panel-body">
				<div class="video-container">
					<iframe width="680" height="482" src="http://www.youtube.com/embed/{{ $video->youtubeid }}?rel=0&amp;vq=hd720" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		
<!-- end video-play -->