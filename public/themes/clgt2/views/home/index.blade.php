<?php $cats = $config['categories']; ?>
<div class="row" >
    <div class="col-sm-9" >
        <div class="row" >
            <div class="col-sm-12 " >
                <h3 class="title">{{ $page_title }}</h3>
            </div>
        </div>

        <div class="row multi-columns-row" >
            {{ Theme::partial('item', array('videos' => $videos ))}}
        </div>
        <div class="row" >
            <div class="col-xs-12" >
                @if(isset($paginator))
                {{ $paginator->links() }}
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-3" >
        <div class="panel panel-default" style="margin-top:12px">
            <div class="panel-heading sidenav">
                <h3 class="panel-title">Categories</h3>
            </div>
            <ul class="list-group">
                @foreach($cats as $cat)
                <li class="list-group-item" ><a href="{{ route('category', array('slug' => $cat)) }}" ><span class="glyphicon glyphicon-list" ></span> {{ mb_convert_case(str_replace('-', ' ', $cat), MB_CASE_TITLE, "UTF-8") }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
<div class="row" >

    <div class="col-xs-12" >
        <div class="line3" >

        </div>
    </div>

</div>