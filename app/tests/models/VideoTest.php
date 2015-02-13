<?php
use Way\Tests\Factory;

class VideoTest extends TestCase {

    public function testVideoIsSluggable()
    {
    	$video = Factory::create('Video', array('slug' => null, 'title' => 'One Does Not Simply'));
    	$this->assertNotNull($video->slug);
    	$this->assertSame('one-does-not-simply', $video->slug);
    }

    public function testYoutubeidIsUnique($value='')
    {
    	$video = Factory::create('Video', array('slug' => null));
    	$video2 = Factory::video(array('youtubeid' => $video->youtubeid));
    	$this->assertFalse($video2->save());
    }

    public function testVideoSearch()
    {
        $videos = Video::search('minecraft-tekkit');
        $this->assertCount(25, $videos, 'video search should returns 25 videos by default');
    }

    public function testCategory()
    {
        $slug = 'minecraft-tekkit';
        $max_results = 10;
        $page = 1;

        $videos = Video::category($slug, $max_results, $page);
        $this->assertCount($max_results, $videos, 'Video count should match max_results');
    }

    public function testRandomVideos()
    {
        Video::search('minecraft-tekkit');
        $videos = Video::random(10);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $videos);
    }

    public function testRandomOne()
    {
        Video::search('minecraft-tekkit');
        $video = Video::random_one();
        
        $this->assertInstanceOf('Video', $video);
    }
}