@if($active ==  'home')
{{ Theme::partial('front')}}
@else
<div class="popular" >
    <div class="container" >
        <div class="row" >
            <div class="col-xs-12" >
                <h3 class="title" >{{ $page_title }}</h3>
            </div>
        </div>
        <div class="row" >
            @foreach($videos as $video)
            <div class="col-md-3 col-sm-6 thumb" >
                <a title="{{ $video->title }}" alt="{{ $video->title }}" href="{{ route('video', $video->slug) }}">
                    <img title="{{ $video->title }}" alt="{{ $video->title }}" src="{{ $video->thumbnail_hq }}" class="img-responsive" >
                </a>
                <h5 class="title" >{{ link_to_route('video', $video->title, array('slug' => $video->slug), array('class' => 'btn btn-success'))}}</h5>
            </div>
            @endforeach
        </div>
        <div class="row" >
            <div class="col-xs-12" >
                @if(isset($paginator))
                {{ $paginator->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@if(Route::currentRouteName() == 'term' || Route::currentRouteName() == 'category' )
<div class="desc" >
    <div class="container" >
        <div class="row" >
            <div class="col-xs-12" >
                @if(Route::currentRouteName() == 'term' )
                {{ spp($term->term) }}
                @else
                {{ spp($page_title) }}
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@endif
@if(Route::currentRouteName() == 'term' || Route::currentRouteName() == 'category' )
<div class="spp" >
    @else
    <div class="desc" >
        @endif
        <div class="container" >
            <div class="row" >
                @if(Route::currentRouteName() != 'home' )
                <div class="col-md-4" >
                    <h3 class="list-title" >Pages</h3>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ url('popular')}}" ><i class="glyphicon glyphicon-star"></i>&nbsp;&nbsp;Popular Videos</a></li>
                        <li><a href="{{ url('newest')}}" ><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Recent Videos</a></li>
                        <li><a href="{{ url('random')}}" ><i class="glyphicon glyphicon-random"></i>&nbsp;&nbsp;Random Videos</a></li>
                    </ul>
                </div>
                @endif
                <div class="col-md-4" >
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
                <div class="col-md-4" >
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
                @if(Route::currentRouteName() == 'home' )
                <div class="col-md-4" >
                    <h3 class="list-title" >Connect</h3>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#" ><i class="fa fa-twitter-square fa-2x"></i>&nbsp;&nbsp;Twitter</a></li>
                        <li><a href="#" ><i class="fa fa-facebook-square fa-2x"></i>&nbsp;&nbsp;Facebook</a></li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>