{{ Theme::partial('header')}}
{{ Theme::partial('nav', array()) }}

<div class="container">
	<div class="bs-docs-section">
	  <div class="row">  
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						{{ Theme::place('content')}}					
					 <p style="text-align:right;">{{ number_format($video->views) }} views</p> 
					
						<div class="panel-heading">
							<h3 class="panel-title title">News Flash</h3>
						</div>
						<div class="panel-body">
							@if(Route::currentRouteName() == 'video')
								{{ spp($video->title) }}
							@endif
							<a href="<?php echo Config::get('videoengine.ve_android.cpa_url');?>">Read more...</a>
							 <div id="ayboll-w-640"></div><script type="text/javascript">window._aybollw=window._aybollw|| [];_aybollw.push(["id", "640"]);</script>
						</div>
					</div>
				</div>
			</div>		
		</div>
		<div class="col-md-4">				
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-danger">
					  <div class="panel-heading">
						<h3 class="panel-title title">Download Video</h3>
					  </div>
					  <div class="panel-body">
							
								 		 <!-- Here is the content -->  
    <p>Do you love the video?</p>
    <p class="adl-outside-gate">
      Do you want to save it to your disk? Please click one of the buttons below to download the video. Once you click it the download buttons will appear.
    </p>
    <br>
    <div class="adl-inside-gate">
    <p >
      Thanks for the love ^_^. Here are the download buttons. Enjoy!
    </p>
      	<ul class="nav nav-pills" >
                    <li>{{ add_icon('download', link_to_route('download', 'High Definition', array('id' => $video->id, 'format' => 'hd720', 'slug' => $video->slug), array('class' => 'iframe lightbox'))) }}</li>
                    <li>{{ add_icon('download', link_to_route('download', 'Medium', array('id' => $video->id, 'format' => 'medium', 'slug' => $video->slug), array('class' => 'iframe lightbox'))) }}</li>
                    <li>{{ add_icon('download', link_to_route('download', 'Small', array('id' => $video->id, 'format' => 'small', 'slug' => $video->slug), array('class' => 'iframe lightbox'))) }}</li>
                    <li>
                    <a href="<?php 
			$cpi = Config::get('videoengine.ve_android.apk_url');
			echo $cpi; ?>" target="_blank" class="iframe lightbox"><i class="icon-download"></i>APK</a>
                    </li>
        </ul>
                
    </div>
    
      <!-- Here are the sharing buttons -->
    <table>
      <tr>
        <td valign="top">
          <div id="fb-root"></div>
          <script src="http://connect.facebook.net/en_US/all.js#appId=1234&amp;xfbml=1"></script>
          <fb:like href="" send="true" layout="box_count" width="55" show_faces="true" font=""></fb:like>
        </td>
        <td valign="top">
          <a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a>
          <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        </td>
        <td valign="top">
          <script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
          <script type="IN/Share" data-counter="top" data-onSuccess="ADL.viralGate.afterLinkedInShare"></script>
        </td>
        <td valign="top">
          <g:plusone size="tall" callback="afterPlus"></g:plusone>
          <script type="text/javascript">
            (function() {
              var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
              po.src = 'https://apis.google.com/js/plusone.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
          </script>
        </td>
      </tr>
    </table>
     <!-- Here is the code -->
    <script type="text/javascript">
      ADL = {};
      
      (function(namespace) {
        
        function ViralGate() { };
        
        ViralGate.prototype.setDisplay = function(className, value) {
          var els = document.getElementsByClassName(className);          
          for (var i = 0; i < els.length; i++) {
            els[i].style.display = value;
          }          
        };
        
        ViralGate.prototype.lock = function() {
          this.setDisplay('adl-outside-gate', 'block');
          this.setDisplay('adl-inside-gate', 'none');
        };
        
        ViralGate.prototype.unlock = function() {
          this.setDisplay('adl-outside-gate', 'none');
          this.setDisplay('adl-inside-gate', 'block');          
        }
        
        ViralGate.prototype.afterLike = function(event) {
          // event is the URL
          ADL.viralGate.unlock();
        };
        
        ViralGate.prototype.afterPlus = function(data) {
          // data is object with { href: 'http://...', state: 'on' }    
          if (data.state == 'on') {
            ADL.viralGate.unlock();
          }
        };
        
        ViralGate.prototype.afterTweet = function(event) {
          // event.type == 'tweet'
          ADL.viralGate.unlock();
        };
        
        ViralGate.prototype.afterLinkedInShare = function(url) {
          // url is url string
          ADL.viralGate.unlock();
        }; 
        
        namespace.viralGate = new ViralGate(); 
        
      })(ADL);
      
      ADL.viralGate.lock();
      twttr.events.bind('tweet', ADL.viralGate.afterTweet); 
      FB.Event.subscribe('edge.create', ADL.viralGate.afterLike);
      
      // Google callback must be in global namespace
      afterPlus = function(data) {
        ADL.viralGate.afterPlus(data);
      }
    </script>
					  </div>
					</div>
				</div>
					
			</div>
			{{ Theme::partial('related', array('videos' => $related_videos))}}:-) 
		</div>
		
	  </div>
	</div>

</div><!-- end container -->

{{ Theme::partial('search', array('position' => 'footer', 'search' => $video->title))}}
{{ Theme::partial('footer') }}