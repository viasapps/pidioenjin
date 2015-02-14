<div class="popular" >
<div class="container" >
<div class="row" >
<div class="col-xs-12" >
<h3 class="title" ><a href="{{ url('popular')}}" >Popular Videos&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></h3>
</div>
</div>
<div class="row" >
<?php $popular = Video::orderBy('likes', 'desc')->take(4)->get(); ?>
@foreach($popular as $video)
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
<div class="newest" >
<div class="container" >
<div class="row" >
<div class="col-xs-12" >
<h3 class="title" ><a href="{{ url('newest')}}" >Recent Videos&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></h3>
</div>
</div>
<div class="row" >
<?php $newest = Video::orderBy('id', 'desc')->take(4)->get(); ?>
@foreach($newest as $video)
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
<div class="random" >
<div class="container" >
<div class="row" >
<div class="col-xs-12" >
<h3 class="title" ><a href="{{ url('random')}}" >Random Videos&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></h3>
</div>
</div>
<?php $randvideo = Video::random_one(); ?>
<div class="row" >
<div class="col-md-6" >
<a title="{{ $randvideo->title }}" alt="{{ $randvideo->title }}" href="{{ route('video', $randvideo->slug) }}">
<img class="img-responsive" width="480px" height="360px" src="{{ $randvideo->thumbnail_hq }}" alt="{{ $randvideo->title }}" title="{{ $randvideo->title }}" >
</a>
</div>
<div class="col-md-6" >
<h3 class="randtitle" >{{ link_to_route('video', $randvideo->title, array('slug' => $randvideo->slug))}}</h3>
<p class="excerpt" >{{ $randvideo->excerpt }}</p>
<a class="btn btn-success" title="{{ $randvideo->title }}" alt="{{ $randvideo->title }}" href="{{ route('video', $randvideo->slug) }}">Watch</a>
</div>
</div>
</div>
</div>