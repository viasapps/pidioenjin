<div class="search-box" >
<div class="container" >
<div class="col-xs-12" >
{{ Form::open(array('route' => 'home', 'class' => 'form form-search')) }}
<div class="form-group search-group" >
<div class="input-group">
<input type="text" name="q" class="form-control box-search" placeholder="Search a nice video" >
<span class="input-group-btn">
<button class="btn btn-default btn-search" type="submit"></button>
</span>
</div><!-- /input-group -->
</div>
{{ Form::close() }}
</div>
</div>
</div>