{{ Theme::partial('header')}}
{{ Theme::partial('nav')}}
<div class="container">
    <div class="row" >
        <div class="col-md-8" >
            {{ Theme::place('content')}}
        </div>
        <div class="col-md-4" >
            {{ Theme::partial('sidebar', array('video' => $video, 'videos' => $related_videos))}}
        </div>
    </div>
    {{ Theme::partial('search')}}
</div>
{{ Theme::partial('footer')}}