<?php 
  $cats = Config::get('videoengine.categories');
?>
{{ Theme::partial('header')}}
{{ Theme::partial('nav', array()) }}
{{ Theme::partial('search', array('position' => 'header'))}}


<!-- start container -->
<div class="container">
	
		<div class="row">
			<div class="col-lg-12">
				<h3 class="title">{{ $page_title }}</h3>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-8">				
				<div class="row">		
					<div class="col-md-12">
						<div class="panel panel-default">
						  <div class="panel-body">
							<div class="row">
								@foreach($videos as $key => $video)
								  {{ Theme::partial('item', array('video' => $video, 'key' => $key ))}}
								  @if($key == 1)
									
								  @endif
								@endforeach
							</div>
						  </div>
						</div>			
					</div>
				</div>
				
				<div class="row text-center">
					<!-- start navigation -->
					@if(isset($paginator))
					  {{ $paginator->links() }}
					@endif
					<!-- end navigation -->
				</div>
				
				<!-- start if term display text -->
				@if(Route::currentRouteName() == 'term')
				<div class="row">		
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-body">											 
								{{ spp($term->term) }}
							</div>
						</div>			
					</div>
				</div>
				@endif
				<!-- end if term -->				
			</div>
			
			<!-- start sidebar -->
			<div class="col-md-4">				
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title title">Categories</h3>
						  </div>
						  <div class="panel-body">
								<ul class="nav">
									@foreach($cats as $cat)
										<li>{{ add_icon('list', link_to_route('category', mb_convert_case(str_replace('-', ' ', $cat), MB_CASE_TITLE, "UTF-8"), array('slug' => $cat))) }}</li>
									@endforeach
								</ul>
						  </div>
						</div>
					</div>
						
				</div>
				
			</div>
			<!-- end sidebar -->
		</div>

			
		<!-- **************** end All Flie  ****************** -->
		
	
{{ Theme::partial('footer') }}