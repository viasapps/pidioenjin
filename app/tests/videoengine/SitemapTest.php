<?php
use Way\Tests\Factory;

class SitemapTest extends TestCase {

	public function setUp()
	{
        parent::setUp();
        $video = Factory::create('Video', array('slug' => null));
        $video = Factory::create('Video', array('slug' => null));
        $this->response = $this->call('GET', 'sitemap.xml');
    }

    public function testSitemapRoute()
    {
    	
    	$this->assertContains('xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9', $this->response->getContent(), 'Sitemap content should not empty');
    }

    public function testSitemapShouldContainsVideoHeader()
    {
        $this->assertContains('xmlns:video', $this->response->getContent(), 'Sitemap should contains video schema header');
    }

    public function testShouldLoadVideoSitemap()
    {
    	$sitemap = App::make('sitemap');
    	$this->assertInstanceOf('Roumen\Sitemap\Sitemap', $sitemap, 'Should be instance of Roumen\Sitemap\Sitemap');
    }

    public function testSitemapShouldContainsVideoXml()
    {
        $this->assertContains('<video:video>', $this->response->getContent(), 'Sitemap does not contains video tag');
    }



}