<div class="single" >
    <div class="container" >
        <div class="row" >
            <div class="col-sm-8 content" >
                <div class="row video-header" >
                    <div class="col-xs-12" >
                        <h3 class="single-title">{{ $video->title}}</h3>
                        <p class="excerpt" >{{ $video->excerpt}}</p>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-xs-12" >
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{ $video->youtubeid }}?rel=0&amp;vq=hd720" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="row download" >
                    <div class="col-xs-12" >
                        <ul class="nav nav-pills">
                            <li><a href="{{ route('download', array('id' => $video->id, 'format' => 'mp4', 'slug' => $video->slug)) }}" target="_blank"><span class="glyphicon glyphicon-download-alt" ></span> MP4</a></li>
                            <li><a href="{{ route('download', array('id' => $video->id, 'format' => 'webm', 'slug' => $video->slug)) }}" target="_blank"><span class="glyphicon glyphicon-download-alt" ></span> WEBM</a></li>
                            <li><a href="{{ route('download', array('id' => $video->id, 'format' => 'flv', 'slug' => $video->slug)) }}" target="_blank"><span class="glyphicon glyphicon-download-alt" ></span> FLV</a></li>
                            <li><a href="{{ route('download', array('id' => $video->id, 'format' => '3gp', 'slug' => $video->slug)) }}" target="_blank"><span class="glyphicon glyphicon-download-alt" ></span> 3GP</a></li>
                            <li><a href="{{ route('download', array('id' => $video->id, 'format' => 'mp3', 'slug' => $video->slug)) }}" target="_blank"><span class="glyphicon glyphicon-download-alt" ></span> MP3</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-xs-12" >
                        <h3 class="spp-single-title">Video Description</h3>
                        @if(Route::currentRouteName() == 'video')
                        {{ spp($video->title) }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-4 sidebar" >
                <div class="row hidden-xs" >
                    <div class="col-xs-12" >
                        <img class="img-responsive sidebar-img" width="480px" height="360px" src="{{ $video->thumbnail_hq }}" alt="{{ $video->title }}" title="{{ $video->title }}" >
                    </div>
                </div>
                <div class="row page-menu" >
                    <div class="col-xs-12" >
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{ url('popular')}}" class="menu-popular btn btn-danger" ><i class="glyphicon glyphicon-star"></i>&nbsp;&nbsp;Popular Videos</a></li>
                            <li><a href="{{ url('newest')}}" class="menu-newest btn btn-warning" ><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Recent Videos</a></li>
                            <li><a href="{{ url('random')}}" class="menu-random btn btn-success" ><i class="glyphicon glyphicon-random"></i>&nbsp;&nbsp;Random Videos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row cat-menu" >
                    <div class="col-xs-12" >
                        <div class="well" >
                            <h3 class="list-title" >Categories</h3>
                            <ul class="nav nav-pills nav-stacked">
                                <?php $cats = $config['categories']; ?>
                                @foreach($cats as $cat)
                                <li>
                                    <a href="{{ route('category', array('slug' => $cat)) }}" ><span class="glyphicon glyphicon-list" ></span>&nbsp;&nbsp;{{ mb_convert_case(str_replace('-', ' ', $cat), MB_CASE_TITLE, "UTF-8") }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row cat-menu" >
                    <div class="col-xs-12" >
                        <div class="well" >
                            <h3 class="list-title" >Random Tags</h3>
                            <ul class="nav nav-pills nav-stacked">
                                <?php $terms = Term::orderBy(DB::raw('RAND()'))->take(5)->get(); ?>
                                @foreach($terms as $term)
                                <li>
                                    <a href="{{ route('term', array('slug' => $term->slug)) }}" alt="{{ $term->term }}" ><span class="glyphicon glyphicon-tags" ></span>&nbsp;&nbsp;{{ mb_convert_case(str_replace('-', ' ', $term->term), MB_CASE_TITLE, "UTF-8") }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row related" >
            <div class="col-xs-12" >
                <h3 class="spp-single-title">You might also like</h3>
            </div>
        </div>
        <div class="row" >
            @foreach($related_videos as $video)
            <div class="col-md-3 col-sm-6 thumb" >
                <a title="{{ $video->title }}" alt="{{ $video->title }}" href="{{ route('video', $video->slug) }}">
                    <img class="img-responsive" width="480px" height="360px" src="{{ $video->thumbnail_hq }}" alt="{{ $video->title }}" title="{{ $video->title }}" >
                </a>
                <h5 class="title" >{{ link_to_route('video', $video->title, array('slug' => $video->slug), array('class' => 'btn btn-success'))}}</h5>
            </div>
            @endforeach
        </div>
    </div>
</div>