<!DOCTYPE html>
<html lang="en" class="js js">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>{{ Theme::place('title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ Theme::place('meta_desc') }}">
    <meta name="keywords" content="{{ Theme::place('meta_keywords') }}">
	<link rel="stylesheet" type="text/css" href="{{ Theme::asset()->url('css/style.css') }}"> 
	<script src="{{ Theme::asset()->url('js/jquery.js') }}"></script> 

 
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->
    <!-- Le fav  -->
    <link rel="shortcut icon" href="{{ Theme::asset()->url('img/favicon.ico') }}">
  </head>
  <!-- activate scrollspy -->
  <body id="top" data-spy="scroll" data-target=".navbar" data-offset="50">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];o-o-
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script> 
 
    <!-- Nav button -->
    <a id="toggle" class="closed" aria-hidden="true">
      <i class="icon-reorder"></i>
    </a>
<!-- Navigation -->
<?php $cats = Config::get('videoengine.categories');?>
<div class="topmenu">
	<div class="head">
	<div class="logo">
        <h1><a href="{{ url('/') }}">Daulah Islamiyah <span>Video</span></a></h1>
       
    </div>
    <div class="toogle"></div>
    <div class="menu">
    <ul>
        <li class="@if($active ==  'home') active @endif">{{ link_to('/', 'Home') }}</li>
        
        <li><a href="#">Categories &raquo;</a>
            <ul> 
                @foreach($cats as $cat)
                    <li>{{ add_icon('list', link_to_route('category', mb_convert_case(str_replace('-', ' ', $cat), MB_CASE_TITLE, "UTF-8"), array('slug' => $cat))) }}</li>
                @endforeach  
            </ul>
        </li>
        
        <li class="@if($active ==  'popular') active @endif">{{ link_to('popular', 'Popular') }}</li>
        <li class="@if($active ==  'newest') active @endif">{{ link_to('newest', 'New') }}</li>
        <li class="@if($active ==  'random') active @endif">{{ link_to('random', 'Random') }}</li>
        
    </ul>
    </div>
    </div>
</div>
<div class="header">
		<script type="text/javascript">
		//<![CDATA[LSM_slot({ adkey: 'ada', ad_size: '728x90', slot : 'slot_111214'});//]]>
		</script>
        <div class="search">
            {{ Form::open(array('url' => url(''), 'class' => 'form-inline form-search border-rd4')) }}
                <input placeholder="Keywords here..." name="q" type="text" class="box-text" value="@if(isset($search)){{ $search }}@endif">
                <button type="submit" class="btn-search">SEARCH!</button>
            {{ Form::close()}}
           
        </div>
        <div >
            <p style="margin-left:5px" > <br><span>Recent search: </span>  
            <?php $termx = Config::get('videoengine.terms.index');?>
            <?php print_r($termx);?>
            <?php 
                /*foreach($terms as $term):
                  $linkedterm[] = link_to_route('term', $term->term, array('slug' => $term->slug));
                endforeach;
                $recterms = implode(", ", $linkedterm);
                echo $recterms;*/
                
               	$hottrend = file_get_contents("http://www.google.com/trends/hottrends/atom/hourly");
               	/*
               	 $html=new DOMDocument();
   						 $html->loadHTML($hottrend);
   						 
   						 $semualink = $html->getElementsByTagName('a');//link
   						print_r($semualink);
   						foreach($semualink as $link)
								{
									$afflink = $link->getAttribute('href');
									
									echo "<br>$afflink";

								} 
								*/
							$hottrend = preg_replace("/\<\!\[CDATA\[(.*?)\]\]\>/ies", "'[CDATA]'.base64_encode('$1').'[/CDATA]'", $hottrend);
							$xmlht = new SimpleXmlElement($hottrend);

							//echo "<pre>";

							$tmp = (string) $xmlht->entry->content;
							$tmp = preg_replace("/\[CDATA\](.*?)\[\/CDATA\]/ies", "base64_decode('$1')", $tmp);
							$tmp = str_replace("<li>","",$tmp);
							$tmp = str_replace("</li>",",",$tmp);
							$tmp = str_replace("<ol>","",$tmp);
							$tmp = str_replace("</ol>","",$tmp);
							//$tmp = preg_replace('/<a(.*?)href="(.*?)"(.*?)>/','$1="http://mydomain.com/$3"', $tmp);
							//$tmp = str_replace("http://www.google.com/trends/hottrends?pn=p1#a=","tags/",$tmp);
							//$tmp = preg_replace("/href=\"(?!http:\/\/)(.*?)\"/","'http://video-daulahislamiyah.rhcloud.com/tags/'", $tmp);
   						/*$html=new DOMDocument();
   						$html->load('http://www.google.com/trends/hottrends/atom/hourly');
   					 $semualink = $html->getElementsByTagName('a');//link
   						echo "<pre>".var_dump($html)."</pre>";
   						foreach($semualink as $link)
								{
									$afflink = $link->getAttribute('href');
									
									echo "<br>* $afflink";

								} */
							//echo '<br>Trending search: '.$tmp.'<br>dom : ';
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
        <div style="clear:both"></div>
</div>