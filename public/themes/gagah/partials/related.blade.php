<ul>
    @foreach($videos as $key => $video)
        {{ Theme::partial('ritem', array('video' => $video, 'key' => $key ))}}
        @if($key == 1)

        @endif
    @endforeach
</ul>
	      
