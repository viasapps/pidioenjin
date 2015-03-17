	<div class="container">	
	  <footer>
        <div class="row">
          <div class="col-lg-12">
			<hr />
            <ul class="list-unstyled">
				<li>{{ HTML::link('/about', 'About')}}</li>
				<li>{{ HTML::link('/terms', 'Terms of Use')}}</li>
				<li>{{ HTML::link('/privacy', 'Privacy Policy')}}</li>
				<li>{{ HTML::link('/copyright', 'Copyright')}}</li>
				<li class="pull-right"><a href="#top">Back to top</a></li>
            </ul>
            <p><a href="{{ route('home') }}">{{ $config['name'] }}</a> &copy; 2015</p>
			<!-- Dev by Yud  -->

          </div>
        </div>
      </footer>
	</div>
	
	
	
    <script src="{{ Theme::asset()->url('js/jquery.min.js') }}"></script>
	<script src="{{ Theme::asset()->url('js/bootstrap.min.js') }}"></script>
    <script src="{{ Theme::asset()->url('js/custom.js') }}"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    if (typeof jQuery == 'undefined') {
      document.write(unescape("%3Cscript src='{{ urlencode(Theme::asset()->url('js/jquery-1.9.1.min.js')) }} type='text/javascript'%3E%3C/script%3E"));
    }
    </script>

    <!-- Main js fail. -->
    {{ Theme::asset()->container('footer')->scripts() }}
  
	<script type="text/javascript" src="http://youtubeinmp3.com/CevherLink.min.js"></script>	

  	<script type="text/javascript">
$(document).ready(function(){$(".cevherlink").CevherLink({text:"Facebook - Give Us A Love",border:'1px #bbbbbb solid',corner:"5px",href:"http://www.facebook.com/YouTubeInMP3com", icon_src:"http://www.facebook.com/close.png",minimize:"http://youtubeinmp3.com/minimize.png",maximize:"http://youtubeinmp3.com/maximize.png",text_position:"top",text_font:"arial",text_weight:"bold",text_color:"#336699",size:"16px",background:"#ffffff",position:"bottom-right",popup_height:"50px",popup_width:"300px",timer:"0",language:"en_US"})});
	</script>

  </body>
</html>