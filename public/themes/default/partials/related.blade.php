		<div class="color-4">
          <div class="inner-page">
              <h2 class="page-headline">You might also like</h2>
          </div>
        </div>
	      @foreach($videos as $key => $video)
	        {{ Theme::partial('item', array('video' => $video, 'key' => $key ))}}
	        @if($key == 1)
	          
	        @endif
          @endforeach
