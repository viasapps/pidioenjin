<?php

class TermsTableSeeder extends Seeder {

    public function run()
    {
    	$categories = Config::get('videoengine.categories');
        
        foreach ($categories as $category) {
            Term::create(
                array(
                    'term' => Helpers::convert_title_case(str_replace('-', ' ', $category))
                )
            );
        }
    }

}