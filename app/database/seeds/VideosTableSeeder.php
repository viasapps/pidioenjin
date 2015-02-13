<?php
use Way\Tests\Factory;

class VideosTableSeeder extends Seeder {

    public function run()
    {
    	$categories = Config::get('videoengine.categories');
        
        foreach($categories as $category) {
            Video::search($category, 4);
        }
    }

}