<div class="row" >
    <div class="col-xs-12" >
        <div class="panel panel-default">
            <div class="panel-heading sidenav">
                <h3 class="panel-title">You Might Also Like</h3>
            </div>
            <ul class="list-group">
                @foreach($videos as $video)
                <li class="list-group-item related">
                    <a href="{{ route('video', $video->slug) }}">
                        <img class="img-responsive" src="{{ $video->thumbnail_hq }}" alt="{{ $video->title}}" title="{{ $video->title}}">
                    </a>
                    <h5>{{ link_to_route('video', $video->title, array('slug' => $video->slug))}}</h5>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>