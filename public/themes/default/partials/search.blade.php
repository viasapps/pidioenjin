<!-- Search -->
<div class="newsletter color-1" style="
                                       @if($position == 'header')
                                       position: relative;top: -30px;
                                       @else
                                       position: relative;bottom: -50px;
                                       @endif
                                       ">
    <div class="inner-page" style="padding-top: 50px;">
        <h2 class="page-headline large">{{ $page_title }}</h2>
    </div>
    {{ Form::open(array('url' => url(''))) }}
    <div class="inner-page row-fluid center">
        <div class="span7 offset1">
            <input type="text" placeholder="Enter search term here" name="q" class="subscribe" value="@if(isset($search)){{ $search }}@endif">
        </div>
        <div class="span3">
            <button type="submit" class="btn btn-large pull-right subscribe"><i class="icon icon-search"></i> Search</button>
        </div>
    </div>
    {{ Form::close()}}
    <div class="inner-page row-fluid text-center">
        <p> Or try these terms: 
            @foreach($terms as $term)
            {{ link_to_route('term', $term->term, array('slug' => $term->slug),array('style' => 'text-decoration: underline;')) }}, 
            @endforeach
        </p>

        @if(isset($paginator))
        {{ $paginator->links() }}
        @endif
    </div>
</div>