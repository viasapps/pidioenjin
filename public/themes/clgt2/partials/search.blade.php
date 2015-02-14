<?php 
$terms = Term::orderBy(DB::raw('RAND()'))->take(5)->get();
$linkedterm = array();
foreach($terms as $term) {
    $linkedterm[] = link_to_route('term', $term->term, [$term->slug], ["title" => $term->name, "alt" => $term->name] );
}

$recterms = implode(", ", $linkedterm);
?>
<div class="row " >
    <div class="col-sm-12 " >
        <div class="wrapper" >
            <div class="well search-box" >
                {{ Form::open(array('route' => 'home', 'class' => 'form form-search')) }}
                <div class="form-group search-group" >
                    <div class="input-group">
                        <input type="text" name="q" class="form-control box-search">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-search" type="submit">Search</button>
                        </span>
                    </div><!-- /input-group -->
                </div>
                {{ Form::close() }}
                <p class="search-term" >Or try these term: {{ $recterms }}</p>
            </div>
        </div>
    </div>
</div>