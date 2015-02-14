@foreach($videos as $video)
<div class="col-sm-6" >
    <div class="media img-thumb">
        <div class="media-left" >
            <a title="{{ $video->title }}" alt="{{ $video->title }}" href="{{ route('video', $video->slug) }}">
                <img title="{{ $video->title }}" alt="{{ $video->title }}" src="{{ $video->thumbnail_hq }}" class="ytthumb" >
            </a>
        </div>
        <div class="media-body">
            <h5 class="media-heading">{{ link_to_route('video', $video->title, array('slug' => $video->slug))}}</h5>
            <p>{{ $video->excerpt }}</p>
        </div>
    </div>
</div>
@endforeach