<div class="row">
    <div class="col-xs-12" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $video->title}}</h3>
            </div>
            <div class="panel-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{ $video->youtubeid }}?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item download-header">Download</li>
                <li class="list-group-item download">
                    <ul class="nav nav-justified">
                        <li><a href="{{ route('download', array('id' => $video->id, 'format' => 'mp4', 'slug' => $video->slug)) }}" target="_blank"><span class="glyphicon glyphicon-download-alt" ></span> MP4</a></li>
                        <li><a href="{{ route('download', array('id' => $video->id, 'format' => 'webm', 'slug' => $video->slug)) }}" target="_blank"><span class="glyphicon glyphicon-download-alt" ></span> WEBM</a></li>
                        <li><a href="{{ route('download', array('id' => $video->id, 'format' => 'flv', 'slug' => $video->slug)) }}" target="_blank"><span class="glyphicon glyphicon-download-alt" ></span> FLV</a></li>
                        <li><a href="{{ route('download', array('id' => $video->id, 'format' => '3gp', 'slug' => $video->slug)) }}" target="_blank"><span class="glyphicon glyphicon-download-alt" ></span> 3GP</a></li>
                        <li><a href="{{ route('download', array('id' => $video->id, 'format' => 'mp3', 'slug' => $video->slug)) }}" target="_blank"><span class="glyphicon glyphicon-download-alt" ></span> MP3</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Detail video</h3>
            </div>
            <div class="panel-body">
                @if(Route::currentRouteName() == 'video')
                {{ spp($video->title) }}
                @endif
            </div>
        </div>
    </div>
</div>