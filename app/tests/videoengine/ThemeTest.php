<?php

class ThemeTest extends TestCase {

    public function testThemeLoaded()
    {
    	$this->assertTrue(class_exists('Theme'), 'Theme class is not loaded');
    }

    public function testDefaultThemeExists()
    {
    	$this->assertTrue(Theme::exists('default'), 'Default theme not exists');
    }

}