<?php
use LaravelBook\Ardent\Ardent;

class Term extends Ardent {
    
	public static $sluggable = array(
		'build_from' => 'term',
		'save_to' => 'slug'
	);

    protected $guarded = array();

    public static $rules = array(
		'term' => 'required|unique:terms',
	);

	public static function random($count = 10) {
        
    	//$models = self::orderBy(DB::raw('RAND()'))->take($count)->get();
     //optimized
     $models = DB::select('SELECT r1.* FROM terms AS r1 JOIN (SELECT (RAND() * (SELECT MAX(id) FROM terms)) AS id) AS r2 WHERE r1.id >= r2.id ORDER BY r1.id ASC LIMIT '. $count);
        
    	return $models;
        
    }

    public static function saveOrSelect($slug) {
    	
        $tags = self::where('slug', '=', $slug)->first();
        
        if (count($tags)) {
            $term = $tags;
        } else {
            $term = new Term();
            $term->term = str_replace('-', ' ', $slug);
            $term->save();
        }
	
        return $term;
        
    }

}