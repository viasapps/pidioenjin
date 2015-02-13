<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateVideosFulltextSearch extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function(Blueprint $table) {
            $table->unique('youtubeid');
            
        });
        
        DB::statement('ALTER TABLE videos ENGINE=MyISAM');
        DB::statement('ALTER TABLE videos ADD FULLTEXT search(title)');
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function($table) {
            $table->dropUnique('videos_youtubeid_unique');
            $table->dropIndex('search');
        });
    }

}
