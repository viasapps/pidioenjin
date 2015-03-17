<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$this->theme->layout('default');
		$this->theme->setTitle($this->config['SEO']['home']['title']);
		$this->theme->setMeta_desc($this->config['SEO']['home']['meta_description']);
		$this->theme->setMeta_keywords($this->config['SEO']['home']['meta_keywords']);
        $this->theme->bind('videos', Video::newest(Config::get('videoengine.postcount.home')));
		$this->theme->bind('active', 'home');

		return $this->theme->scope('home.index')->render();
	}
    
	public function popular()
	{
		$this->theme->layout('default');
		$this->theme->setTitle('Popular Videos | ' . Config::get('videoengine.name'));
		$this->theme->setMeta_desc('Popular Videos on ' . Config::get('videoengine.name'));
		$this->theme->setMeta_keywords('Popular Videos on ' . Config::get('videoengine.name'));
		$this->theme->bind('videos', Video::popular(Config::get('videoengine.postcount.pages')));
		$this->theme->bind('page_title', 'Popular Videos');
		$this->theme->bind('active', 'popular');

		return $this->theme->scope('home.index')->render();
	}

	public function newest()
	{
		$this->theme->layout('default');
		$this->theme->setTitle('Newest Videos | ' . Config::get('videoengine.name'));
		$this->theme->setMeta_desc('Newest Videos on ' . Config::get('videoengine.name'));
		$this->theme->setMeta_keywords('Newest Videos on ' . Config::get('videoengine.name'));
		$this->theme->bind('videos', Video::newest(Config::get('videoengine.postcount.pages')));
		$this->theme->bind('page_title', 'Newest Videos');
		$this->theme->bind('active', 'newest');

		return $this->theme->scope('home.index')->render();
	}

	public function random()
	{
		$this->theme->layout('default');
		$this->theme->setTitle('Random Videos | ' . Config::get('videoengine.name'));
		$this->theme->setMeta_desc('Random Videos on ' . Config::get('videoengine.name'));
		$this->theme->setMeta_keywords('Random Videos on ' . Config::get('videoengine.name'));
		$this->theme->bind('videos', Video::random(Config::get('videoengine.postcount.pages')));
		$this->theme->bind('page_title', 'Random Videos');
		$this->theme->bind('active', 'random');

		return $this->theme->scope('home.index')->render();
	}
    
	public function page($slug)
	{
		return $slug;
	}

	public function category($slug)
	{
        $count = Config::get('videoengine.postcount.categories');
        
		$start_index = is_numeric(Input::get('page')) ? (Input::get('page')-1)*$count+1 : 1;
		$videos = Video::search($slug, $count, $start_index);
		$category = Helpers::convert_title_case(str_replace('-', ' ', $slug));
		$paginator = Paginator::make($videos, $this->config['videos_per_category'], $count);
		
        $this->theme->layout('default');
        $this->theme->setTitle(
            Theme::blader($this->config['SEO']['default']['title'], array('title' => $category))
            );
        $this->theme->setMeta_desc(
            Theme::blader($this->config['SEO']['default']['meta_description'], array('title' => $category))
            );
        $this->theme->setMeta_keywords(
            Theme::blader($this->config['SEO']['default']['meta_keywords'], array('title' => $category))
            );

        $this->theme->bind('videos', $videos);
        $this->theme->bind('page_title', $category);
        $this->theme->bind('paginator', $paginator);

        return $this->theme->scope('home.index')->render();
	}

	public function sitemap()
	{
		$sitemap = App::make('sitemap');

	    // set item's url, date, priority, freq
	    $sitemap->add(URL::to(''), date('c', time()), '1.0', 'daily');
	    $sitemap->add(URL::to('popular'), date('c', time()), '0.2', 'daily');
	    $sitemap->add(URL::to('new'), date('c', time()), '0.2', 'daily');
	    $sitemap->add(URL::to('random'), date('c', time()), '0.2', 'daily');

	    $categories = Config::get('videoengine.categories');

	    foreach ($categories as $category) {
            
	    	$route = route('category', Slug::create($category));
	    	$sitemap->add($route, date('c', time()), '0.2', 'monthly');
            
	    }

	    $terms = Term::random(10);

	    foreach ($terms as $term) {
            
	    	$route = route('term', $term->slug);
	    	$sitemap->add($route, date('c', time()), '0.2', 'monthly');
	    	
	    }

	    $videos = Video::orderBy('created_at', 'desc')->take(5000)->get();
        
	    foreach ($videos as $video) {
            
	    	$route = route('video', $video->slug);
	        $sitemap->add($route, sitemap_time($video->created_at), '0.1', 'monthly', $video->title, $video);
            
	    }

	    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
	    return $sitemap->render('xml');
	}

	public function search()
	{
		
        $query = Input::get('q');
        
        if (!empty($query)) {
            
            if (substr($query, 0, 4) == 'http') {
                return Redirect::route('home');
            }            
            
            $tags = Term::where('term', '=', $query)->first();
        
            if (count($tags)) {
                $term = $tags;
            } else {
                $term = new Term();
                $term->term = $query;
                $term->save();
            }

			return Redirect::route('term', array('slug' => $term->slug));
            
        } else {
            
            return Redirect::route('home');
            
        }
        
	}
	

	public function download($id, $slug, $format)
	{
		include_once('curl.php');
		 $config['ThumbnailImageMode']=2; // show thumbnail image by proxy from this server
#$config['VideoLinkMode']='direct'; // show only direct download link #$config['VideoLinkMode']='proxy'; // show only by proxy download link 
		$config['VideoLinkMode']='both'; // show both direct and by proxy download links

		$config['feature']['browserExtensions']=true; // show links for install browser extensions? true or false

		
		$video = Video::findOrFail($id);
		//$url = 'http://keepvid.com/?url='.urlencode('http://www.youtube.com/watch?v=' . $video->youtubeid);
		$url = "http://cdn1-daulahislamiysh.rhcloud.com/getvideo.php?videoid=".$video->youtubeid."&type=download";
	
/* First get the video info page for this video id */
//$my_video_info = 'http://www.youtube.com/get_video_info?&video_id='. $my_id;
$getformat = $format;
if($getformat == "android"){

$osFamily = BrowserDetect::osFamily();
        
		if($osFamily == 'AndroidOS' && Config::get('videoengine.ve_android.redirect_download_to_apk')){
			$url = Config::get('videoengine.ve_android.apk_url');
		}
}
$my_video_info = 'http://www.youtube.com/get_video_info?&video_id='. $video->youtubeid.'&asv=3&el=detailpage&hl=en_US'; //video details fix *1
$my_video_info = curlGet($my_video_info);

/* TODO: Check return from curl for status code */

$thumbnail_url = $title = $url_encoded_fmt_stream_map = $type = $url = '';

parse_str($my_video_info);

$my_title = $title;
$cleanedtitle = str_replace(' ', '-', $title ); 
$cleanedtitle = preg_replace('/[^A-Za-z0-9\-]/', '', $cleanedtitle );

if(isset($url_encoded_fmt_stream_map)) {
	/* Now get the url_encoded_fmt_stream_map, and explode on comma */
	$my_formats_array = explode(',',$url_encoded_fmt_stream_map);
	/*if($debug) {
		echo '<pre>';
		print_r($my_formats_array);
		echo '</pre>';
	}*/
} else {
	echo '<p>No encoded format stream found.</p>';
	echo '<p>Here is what we got from YouTube:</p>';
	echo $my_video_info;
}
if (count($my_formats_array) == 0) {
	echo '<p>No format stream map found - was the video id correct?</p>';
	//exit;
}

/* create an array of available download formats */
$avail_formats[] = '';
$i = 0;
$ipbits = $ip = $itag = $sig = $quality = '';
$expire = time(); 

foreach($my_formats_array as $format) {
	parse_str($format);
	$avail_formats[$i]['itag'] = $itag;
	$avail_formats[$i]['quality'] = $quality;
	$type = explode(';',$type);
	$avail_formats[$i]['type'] = $type[0];
	$avail_formats[$i]['url'] = urldecode($url) . '&signature=' . $sig;
	parse_str(urldecode($url));
	$avail_formats[$i]['expires'] = date("G:i:s T", $expire);
	$avail_formats[$i]['ipbits'] = $ipbits;
	$avail_formats[$i]['ip'] = $ip;
	$i++;
}

	/* now that we have the array, print the options */
	for ($i = 0; $i < count($avail_formats); $i++) {
		/*echo '<li>';
		echo '<span class="itag"></span> ';
		if($config['VideoLinkMode']=='direct'||$config['VideoLinkMode']=='both')
		  echo '<a href="' . $avail_formats[$i]['url'] . '&title='.$cleanedtitle.'" class="mime">' . $avail_formats[$i]['type'] . '</a> ';
		else
		  echo '<span class="mime">' . $avail_formats[$i]['type'] . '</span> ';
		echo '<small>(' .  $avail_formats[$i]['quality'];
		if($config['VideoLinkMode']=='proxy'||$config['VideoLinkMode']=='both')
			echo ' / ' . '<a href="http://cdn1-daulahislamiysh.rhcloud.com/download.php?mime=' . $avail_formats[$i]['type'] .'&title='. urlencode($my_title) .'&token='.base64_encode($avail_formats[$i]['url']) . '" class="dl">download</a>';
		echo ')</small> '.
			'<small><span class="size"> ' . get_size($avail_formats[$i]['url']) . '</.span></small>'.
		'</li><br>';*/
		if ( $avail_formats[$i]['quality'] == $getformat ){
				 //echo '<br>Hasil :  ' .$avail_formats[$i]['quality'] .' ('. formatBytes(get_size($avail_formats[$i]['url'])).') <a href="http://cdn1-daulahislamiyah.rhcloud.com/download.php?mime=' . $avail_formats[$i]['type'] .'&title='. urlencode($my_title) .'&token='.base64_encode($avail_formats[$i]['url']) . '" class="dl">Download from this site</a>';
				 //echo ' | <a href="' . $avail_formats[$i]['url'] . '&title='.$cleanedtitle.'" class="mime"> Direct Download</a> ';
				 $url = 'http://cdn1-daulahislamiyah.rhcloud.com/download.php?mime=' . $avail_formats[$i]['type'] .'&title='. urlencode($my_title) .'&token='.base64_encode($avail_formats[$i]['url']); //$avail_formats[$i]['url'].'&title='.$cleanedtitle ;
		//}else{
				//echo "<br>Tidak sama, quality= ". $avail_formats[$i]['quality']."<br>format= " .$getformat ;
		}
	}
	

				//echo "<br>return : <br>";
		 
		return Redirect::to($url);
        
	}
    
    public function upgrade() {
        
        Artisan::call('migrate');
        
        return Redirect::to('/');
        
    }
    
    public function info($dojokey) {
        
        if ($dojokey) {
            $infokey = Config::get('videoengine.key');

            if ($dojokey == $infokey) {
                phpinfo();
            } else {
                return Redirect::route('home');
            }
            
        } else {
            return Redirect::route('home');
        }
         
        
        
    }


	public function about()
	{
		$this->theme->layout('about');
		$this->theme->setTitle('About | ' . Config::get('videoengine.name'));
		$this->theme->setMeta_desc('About ' . Config::get('videoengine.name'));
		$this->theme->setMeta_keywords('About ' . Config::get('videoengine.name'));

		return $this->theme->scope('home.index')->render();
	}
			
	public function privacy()
	{
		$this->theme->layout('privacy');
		$this->theme->setTitle('Privacy Policy | ' . Config::get('videoengine.name'));
		$this->theme->setMeta_desc('Privacy Policy ' . Config::get('videoengine.name'));
		$this->theme->setMeta_keywords('Privacy Policy ' . Config::get('videoengine.name'));

		return $this->theme->scope('home.index')->render();
	}
	
	public function terms()
	{
		$this->theme->layout('terms');
		$this->theme->setTitle('Terms of Use | ' . Config::get('videoengine.name'));
		$this->theme->setMeta_desc('Terms of Use ' . Config::get('videoengine.name'));
		$this->theme->setMeta_keywords('Terms of Use ' . Config::get('videoengine.name'));

		return $this->theme->scope('home.index')->render();
	}
	
	public function copyright()
	{
		$this->theme->layout('copyright');
		$this->theme->setTitle('Copyright | ' . Config::get('videoengine.name'));
		$this->theme->setMeta_desc('Copyright ' . Config::get('videoengine.name'));
		$this->theme->setMeta_keywords('Copyright ' . Config::get('videoengine.name'));

		return $this->theme->scope('home.index')->render();
	}

}