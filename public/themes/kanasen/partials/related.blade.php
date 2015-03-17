<!-- start video-play -->	
	<div class="row">		
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title title">You might also like</h3>
			  </div>
			  <div class="panel-body">
				<div class="row">
					@foreach($videos as $key => $video)
						{{ Theme::partial('ritem', array('video' => $video, 'key' => $key ))}}
						 
						@if($key == 1)

						@endif
					@endforeach
				</div>
			  </div>
			</div>			
		</div>
	</div><!-- end video-play -->