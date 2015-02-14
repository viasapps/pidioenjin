<?php 
  $color = $key%2 == 0 ? 4 : 1;
  $pull = $key%2 == 0 ? 'right' : 'left';
?>
<div class="row-fluid inner-page color-{{ $color }}">
      <div class="span6 pull-{{ $pull }}">
        <div class="btn-container figurette">
          <img src="{{ $video->thumbnail_hq }}" alt="{{ $video->title}}" title="{{ $video->title}}">
          {{ add_icon('play', link_to_route('video', ' ', array('slug' => $video->slug), array('class' => 'btn-play')))}}
        </div>
      </div>
      <div class="span6 pull-right">
          <h3>
            @if(isset($video->category))
            {{ link_to_route('category', $video->category, array('slug' => $video->category_slug))}}:
            @endif
             
            {{ $video->title }}
          </h3>
          <p>
            {{ $video->excerpt }}
          </p>
          {{ add_icon('play', link_to_route('video', $video->title, array('slug' => $video->slug), array('class' => 'scroll btn')))}}
          </a>
      </div>
    </div>