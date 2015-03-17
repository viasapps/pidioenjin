<!-- Search -->
	<div class="">
		
		<div class="section-tout">	
			<div class="container">
			<div class="row">
			<div class="col-lg-12">
			{{ Form::open(array('url' => url(''))) }}
			<p class="text-center">
			<div class="form-group">			  
			  <div class="input-group">
				<input placeholder="Your keywords here..." name="q" type="text" class="form-control" value="@if(isset($search)){{ $search }}@endif">
				<span class="input-group-btn">
				  <button type="submit" class="btn btn-primary">Search</button>
				</span>				
			  </div>					  					  
			</div>
			</p>
			{{ Form::close()}}
			</div>
			</div>
			</div>
		</div>
	</div>
	
	<div class="col-lg-12 text-center">
			<p>Recent search: 
			<?php
				$hottrend = file_get_contents("http://www.google.com/trends/hottrends/atom/hourly");
            
							$hottrend = preg_replace("/\<\!\[CDATA\[(.*?)\]\]\>/ies", "'[CDATA]'.base64_encode('$1').'[/CDATA]'", $hottrend);
							$xmlht = new SimpleXmlElement($hottrend);

							//echo "<pre>";

							$tmp = (string) $xmlht->entry->content;
							$tmp = preg_replace("/\[CDATA\](.*?)\[\/CDATA\]/ies", "base64_decode('$1')", $tmp);
							$tmp = str_replace("<li>","",$tmp);
							$tmp = str_replace("</li>",",",$tmp);
							$tmp = str_replace("<ol>","",$tmp);
							$tmp = str_replace("</ol>","",$tmp);
							$trendingterms = strip_tags($tmp);
							$trendingsearch = explode(',',$trendingterms);
							//print_r($trendingsearch);
							foreach($trendingsearch as $trend)
								{
									 echo "<a href=\"http://".$_SERVER['HTTP_HOST']."/tags/".str_replace(" ","-",substr($trend,2))."\">".$trend."</a>, " ;
								}
			?>
			</p>
	</div>	