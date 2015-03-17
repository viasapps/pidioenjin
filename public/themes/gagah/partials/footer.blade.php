</div>
<div class="footer"> 
	<div class="bottom-menu">
    <!--	<ul>
        	<li class="@if($active ==  'home') active @endif">{{ link_to('/', 'Home') }}</li>
            <li class="@if($active ==  'popular') active @endif">{{ link_to('popular', 'Popular') }}</li>
            <li class="@if($active ==  'newest') active @endif">{{ link_to('newest', 'New') }}</li>
            <li class="@if($active ==  'random') active @endif">{{ link_to('random', 'Random') }}</li>
        </ul>-->
       <ul class="list-unstyled">
				<li>{{ HTML::link('/about', 'About')}}</li>
				<li>{{ HTML::link('/terms', 'Terms of Use')}}</li>
				<li>{{ HTML::link('/privacy', 'Privacy Policy')}}</li>
				<li>{{ HTML::link('/copyright', 'Copyright')}}</li>
        </ul>
    </div>
        <div class="copy_right">
            © 2015 {{ $config['name'] }}<a href="#top" title="Got to top" class="scroll">
        </div> 
</div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    if (typeof jQuery == 'undefined') {
      document.write(unescape("%3Cscript src='{{ urlencode(Theme::asset()->url('js/jquery-1.9.1.min.js')) }} type='text/javascript'%3E%3C/script%3E"));
    }
$(document).ready(function() { 
	$(".maintitles h3").click(function(){
		var idx = (this.id);
		$("h3").removeClass('selected'); 
		$("h3#" + idx).addClass('selected'); 
		$("div.single").hide(); 
		$("div#" + idx).fadeIn(); 
	}); 
});
    </script>

    <!-- Main js fail. -->
    {{ Theme::asset()->container('footer')->scripts() }}
  </body>
</html>