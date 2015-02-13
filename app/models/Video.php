<?php
use LaravelBook\Ardent\Ardent;

class Video extends Ardent {

    public static $rules = array(
		'youtubeid' => 'required|unique:videos',
	);
	
	public static $sluggable = array(
		'build_from' => 'title',
		'save_to' => 'slug'
	);
    
    protected $guarded = array();
    
    public static function localsearch($terms, $limit = 9) {
        
        $videos = self::whereRaw("match (`title`) against (?)", array($terms))
            ->take($limit)
            ->get();
        $videos = (empty($videos)) ? self::whereRaw("match (`title`) against (? IN BOOLEAN MODE)", array($terms))->take($limit)->get() : $videos;
        return $videos;
        
    }
 
    public static function search($term, $max_result = 25, $start_index = 1) {
        
    	$term = str_replace('-', ' ', $term);
    	$youtube = new Youtube();
    	$videos = $youtube->search($term, $max_result, $start_index);

    	$result = self::batch_create($videos['videos']);

    	return $result;
        
    }

    public static function category($slug, $max_result = 25, $page = 1) {
        
    	$term = str_replace('-', ' ', $slug);
    	$start_index = ( ($page-1) * $max_result ) + 1;

    	$videos = self::search($term, $max_result, $start_index);
    	
    	return $videos;
        
    }


    public static function batch_create($videos = array()) {
        
    	$result = array();
        
    	foreach ($videos as $video) {
            
    		$v = self::create($video);
            
    		if($v->errors()->all()){
    			$v = self::where('youtubeid', '=', $v->youtubeid)->first();
    		}
            
    		$result[] = $v;
            
    	}
        
    	return $result;
        
    }

    public static function random($count = 10) {
        
    	//$videos = self::orderBy(DB::raw('RAND()'))->take($count)->get();

		//optimized
		 $videos = DB::select('SELECT r1.* FROM videos AS r1 JOIN (SELECT (RAND() * (SELECT MAX(id) FROM videos)) AS id) AS r2 WHERE r1.id >= r2.id ORDER BY r1.id ASC LIMIT '. $count);
    	return $videos;
        
    }

    public static function random_one() {
        
    	$videos = self::random(1);
    	return (count($videos) > 0) ? $videos[0] : false;
        
    }

    public static function one_video_per_category($cats = array()) {
        
        $videos = array();
        
        foreach ($cats as $cat) {
            
            $slug = $cat;
            $cat = Helpers::convert_title_case(str_replace('-', ' ', $cat));
            $video = self::search($cat, 1, rand(1 , 100));
            
            if(!empty($video)){
                
                $video = $video[0];
                $video->category = $cat;
                $video->category_slug = $slug;
                $videos[] = $video;
                
            }
            
        }

        return $videos;
        
    }

    public static function popular($count = 10) {
        
        $videos = self::orderBy('likes', 'desc')->take($count)->get();
        return $videos;
        
    }
    
    static public function newest($count = 10) {
        
        $videos = self::orderBy('id', 'desc')->take($count)->get();
        return $videos;
        
    }

}