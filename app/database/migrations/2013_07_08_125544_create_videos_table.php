<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('youtube_id');
			$table->string('author');
			$table->string('title');
			$table->text('excerpt');
			$table->integer('views');
			$table->integer('likes');
			$table->string('aspect_ratio');
			$table->integer('duration');
			$table->string('thumbnail');
			$table->string('thumbnail_mq');
			$table->string('thumbnail_hq');
			$table->string('thumbnail_sd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('videos');
    }

}
