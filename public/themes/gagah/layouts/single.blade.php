{{ Theme::partial('header')}} 
<div class="main">
	<div class="container">
    	<div class="left"> 
            {{ Theme::place('content')}}
            <div class="social">
             	<!--<div class="g-plusone" data-size="medium"></div>
                Place this tag after the last +1 button tag.
                <script type="text/javascript">
                    (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                        po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                    })();
                </script>
             	<div class="fb-like" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false" data-font="arial"></div>
             	<a href="https://twitter.com/share" class="twitter-share-button" data-hashtags="vectorea">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
             	<a rel="nofollow" href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
                    <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script> 
                    -->
           
                    <span><h4>{{ number_format($video->views) }} Views</h4></span> 
             </div> 
            <div class="maintitles">
                <h3 id="description" class="selected">News Flash</h3>
                <h3 id="download">Download Video</h3>
                <h3 id="aff-movie" onclick="window.open('http://go.vid-id.org/?a=1132')">Stream Movies</h3>
                
            </div>
            <div class="widget"> 
            	<div class="ads728">
            	 <script type="text/javascript">
		//<![CDATA[LSM_slot({ adkey: '896', ad_size: '468x60', slot : 'slot_111140'});//]]>
					 </script><!--share gate-->
            	</div><br />
            	<div id="description" class="single">
                @if(Route::currentRouteName() == 'video')
                    {{ spp($video->title) }}
                @endif
                </div>
                <div id="download"  class="single" style="display:none;">
                <script type="text/javascript">
		//<![CDATA[LSM_slot({ adkey: '883', ad_size: '300x250', slot : 'slot_111215'});//]]>
		</script>
		
          
              
            
      				 
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
      	<ul class="download" >
                    <li>{{ add_icon('download', link_to_route('download', 'High Definition', array('id' => $video->id, 'format' => 'hd720', 'slug' => $video->slug), array('class' => 'iframe lightbox'))) }}</li>
                    <li>{{ add_icon('download', link_to_route('download', 'Medium', array('id' => $video->id, 'format' => 'medium', 'slug' => $video->slug), array('class' => 'iframe lightbox'))) }}</li>
                    <li>{{ add_icon('download', link_to_route('download', 'Small', array('id' => $video->id, 'format' => 'small', 'slug' => $video->slug), array('class' => 'iframe lightbox'))) }}</li>
                    <li>
                    <a href="<?php $cpi = Config::get('videoengine.ve_android.apk_url'); echo $cpi; ?>" target="_blank" class="iframe lightbox"><i class="icon-download"></i>APK</a>
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
   
    
                <div id="aff-movie" class="single" style="display:none;" > </div>
                </div>
        	</div>
        	<div style="clear:both"></div>
		</div>
        <div class="right"> 
            <div class="box-titles">
                <h3>MORE <span>VIDEOS</span></h3>
            </div> 
            <div class="related">
                {{ Theme::partial('related', array('videos' => $related_videos))}}
            </div>
        </div>
        <div style="clear:both"></div> 
</div>
{{ Theme::partial('footer') }}

