<?php
use Mockery as m;
use Way\Tests\Factory;

class VideoEnginePermalinksTest extends TestCase {

	public function setUp()
	{
		parent::setUp();
		$this->config = Config::get('videoengine');
	}

    public function testPermalinkStructureIsPresent()
    {
    	$this->assertArrayHasKey('permalinks', $this->config, 'Permalink configuratuion is not present');
    	$this->assertArrayHasKey('search', $this->config['permalinks'], 'Search Permalink configuratuion is not present');
    	$this->assertArrayHasKey('video', $this->config['permalinks'], 'Video Permalink configuratuion is not present');
        $this->assertArrayHasKey('page', $this->config['permalinks'], 'Page Permalink configuratuion is not present');
    	$this->assertArrayHasKey('category', $this->config['permalinks'], 'category Permalink configuratuion is not present');
    }

    public function testVideoShowRoute()
    {
    	$video = Factory::create('Video', array('slug' => null, 'title' => 'Video Test'));
    	$route = str_replace('{slug}', $video->slug, $this->config['permalinks']['video']);
    	
    	$response = $this->call('GET', $route);

    	$this->assertContains('video', $response->getContent());
    }

    public function testSearchShowRoute()
    {
    	$term = Factory::create('Term', array('slug' => null, 'term' => 'Search Term'));
    	$route = str_replace('{slug}', $term->slug, $this->config['permalinks']['search']);

    	$response = $this->call('GET', $route); 

    	$this->assertViewHas('term');
    }

    public function testPageShowRoute()
    {

    	$route = str_replace('{slug}', 'about', $this->config['permalinks']['page']);

    	$response = $this->call('GET', $route);

    	$this->assertResponseOk();
    }

    public function testCategoryRoute()
    {
        $route = str_replace('{slug}', 'minecraft-tekkit', $this->config['permalinks']['category']);

        $response = $this->call('GET', $route);

        $this->assertResponseOk();
    }

}