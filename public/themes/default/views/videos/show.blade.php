<div class="row-fluid inner-page color-4" style="margin-bottom:50px;">
    <div class="offset1 span10 ">
        <h2 class="page-headline">{{ $video->title}}</h2>
        <div class="btn-container figurette">
            <iframe width="857" height="482" src="http://www.youtube.com/embed/{{ $video->youtubeid }}?rel=0&amp;vq=hd720" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>

<div class="clients color-1">
    <div class="inner-page">
        <h2 class="page-headline">Download {{ $video->title }}</h2>
    </div>
    <div class="inner-page row-fluid">
        <ul class="clients list-inline">
            <li>{{ add_icon('cloud-download', link_to_route('download', 'MP4', array('id' => $video->id, 'format' => 'mp4', 'slug' => $video->slug), array('target' => '_blank'))) }}</li>
            <li>{{ add_icon('laptop', link_to_route('download', 'FLV', array('id' => $video->id, 'format' => 'flv', 'slug' => $video->slug), array('target' => '_blank'))) }}</li>
            <li>{{ add_icon('mobile-phone', link_to_route('download', '3GP', array('id' => $video->id, 'format' => '3gp', 'slug' => $video->slug), array('target' => '_blank'))) }}</li>
            <li>{{ add_icon('volume-up', link_to_route('download', 'MP3', array('id' => $video->id, 'format' => 'mp3', 'slug' => $video->slug), array('target' => '_blank'))) }}</li>
        </ul>
    </div>
</div>