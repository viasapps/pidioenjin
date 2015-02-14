<?php namespace Teepluss\Theme;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\HTML;

class AssetContainer {

	/**
	 * Use a theme path.
	 *
	 * @var boolean
	 */
	public $usePath = false;

	/**
	 * Path to theme.
	 *
	 * @var string
	 */
	public $path;

	/**
	 * The asset container name.
	 *
	 * @var string
	 */
	public $name;

	/**
	 * All of the registered assets.
	 *
	 * @var array
	 */
	public $assets = array();

	/**
	 * Create a new asset container instance.
	 *
	 * @param  string  $name
	 * @return void
	 */
	public function __construct($name, $path)
	{
		$this->name = $name;

		$this->path = $path;
	}

	/**
	 * Return asset path.
	 *
	 * @param  string $uri
	 * @return string
	 */
	public function url($uri)
	{
		$path = $this->path.$uri;

		return URL::to($path);
	}

	/**
	 * Add an asset to the container.
	 *
	 * The extension of the asset source will be used to determine the type of
	 * asset being registered (CSS or JavaScript). When using a non-standard
	 * extension, the style/script methods may be used to register assets.
	 *
	 * <code>
	 *		// Add an asset to the container
	 *		Asset::container()->add('jquery', 'js/jquery.js');
	 *
	 *		// Add an asset that has dependencies on other assets
	 *		Asset::add('jquery', 'js/jquery.js', 'jquery-ui');
	 *
	 *		// Add an asset that should have attributes applied to its tags
	 *		Asset::add('jquery', 'js/jquery.js', null, array('defer'));
	 * </code>
	 *
	 * @param  string  $name
	 * @param  string  $source
	 * @param  array   $dependencies
	 * @param  array   $attributes
	 * @return AssetContainer
	 */
	public function add($name, $source, $dependencies = array(), $attributes = array())
	{
		$type = (pathinfo($source, PATHINFO_EXTENSION) == 'css') ? 'style' : 'script';

		return $this->$type($name, $source, $dependencies, $attributes);
	}

	/**
	 * Write a content to the container.
	 *
	 * @param  string $name
	 * @param  string string
	 * @param  string $source
	 * @param  array  $dependencies
	 * @return AssetContainer
	 */
	protected function write($name, $type, $source, $dependencies = array())
	{
		$types = array(
			'script' => 'script',
			'style'  => 'style',
			'js'     => 'script',
			'css'    => 'style'
		);

		if (array_key_exists($type, $types))
		{
			$type = $types[$type];

			$this->register($type, $name, $source, $dependencies, array());
		}

		return $this;
	}

	/**
	 * Write a script to the container.
	 *
	 * @param  string $name
	 * @param  string string
	 * @param  string $source
	 * @param  array  $dependencies
	 * @return AssetContainer
	 */
	public function writeScript($name, $source, $dependencies = array())
	{
		$source = '<script>'.$source.'</script>';

		return $this->write($name, 'script', $source, $dependencies);
	}

	/**
	 * Write a style to the container.
	 *
	 * @param  string $name
	 * @param  string string
	 * @param  string $source
	 * @param  array  $dependencies
	 * @return AssetContainer
	 */
	public function writeStyle($name, $source, $dependencies = array())
	{
		$source = '<style>'.$source.'</style>';

		return $this->write($name, 'style', $source, $dependencies);
	}

	/**
	 * Write a content without tag wrapper.
	 *
	 * @param  string $name
	 * @param  string string
	 * @param  string $source
	 * @param  array  $dependencies
	 * @return AssetContainer
	 */
	public function writeContent($name, $source, $dependencies = array())
	{
		$source = $source;

		return $this->write($name, 'script', $source, $dependencies);
	}

	/**
	 * Add a CSS file to the registered assets.
	 *
	 * @param  string           $name
	 * @param  string           $source
	 * @param  array            $dependencies
	 * @param  array            $attributes
	 * @return AssetContainer
	 */
	public function style($name, $source, $dependencies = array(), $attributes = array())
	{
		if ( ! array_key_exists('media', $attributes))
		{
			$attributes['media'] = 'all';
		}

		// Prepaend path to theme.
		if ($this->isUsePath())
		{
			$source = $this->evaluatePath($this->path.$source);

			// Reset using path.
			$this->usePath(false);
		}

		$this->register('style', $name, $source, $dependencies, $attributes);

		return $this;
	}

	/**
	 * Add a JavaScript file to the registered assets.
	 *
	 * @param  string           $name
	 * @param  string           $source
	 * @param  array            $dependencies
	 * @param  array            $attributes
	 * @return AssetContainer
	 */
	public function script($name, $source, $dependencies = array(), $attributes = array())
	{
		// Prepaend path to theme.
		if ($this->isUsePath())
		{
			$source = $this->evaluatePath($this->path.$source);

			// Reset using path.
			$this->usePath(false);
		}

		$this->register('script', $name, $source, $dependencies, $attributes);

		return $this;
	}

	/**
	 * Evaluate path to current theme or force use theme.
	 *
	 * @param  string $source
	 * @return string
	 */
	protected function evaluatePath($source)
	{
		// Switch path to another theme.
		if ( ! is_bool($this->usePath) and \Theme::exists($this->usePath))
		{
			$currentTheme = \Theme::getThemeName();

			$source = str_replace($currentTheme, $this->usePath, $source);
		}

		return $source;
	}

	/**
	 * Force use a theme path.
	 *
	 * @param  boolean $use
	 * @return AssetContainer
	 */
	public function usePath($use = true)
	{
		$this->usePath = $use;

		return $this;
	}

	/**
	 * Check using theme path.
	 *
	 * @return boolean
	 */
	public function isUsePath()
	{
		return (boolean) $this->usePath;
	}

	/**
	 * Returns the full-path for an asset.
	 *
	 * @param  string  $source
	 * @return string
	 */
	public function path($source)
	{
		return $source;
	}

	/**
	 * Add an asset to the array of registered assets.
	 *
	 * @param  string  $type
	 * @param  string  $name
	 * @param  string  $source
	 * @param  array   $dependencies
	 * @param  array   $attributes
	 * @return void
	 */
	protected function register($type, $name, $source, $dependencies, $attributes)
	{
		$dependencies = (array) $dependencies;

		$attributes = (array) $attributes;

		$this->assets[$type][$name] = compact('source', 'dependencies', 'attributes');
	}

	/**
	 * Get the links to all of the registered CSS assets.
	 *
	 * @return  string
	 */
	public function styles()
	{
		return $this->group('style');
	}

	/**
	 * Get the links to all of the registered JavaScript assets.
	 *
	 * @return  string
	 */
	public function scripts()
	{
		return $this->group('script');
	}

	/**
	 * Get all of the registered assets for a given type / group.
	 *
	 * @param  string  $group
	 * @return string
	 */
	protected function group($group)
	{
		if ( ! isset($this->assets[$group]) or count($this->assets[$group]) == 0) return '';

		$assets = '';

		foreach ($this->arrange($this->assets[$group]) as $name => $data)
		{
			$assets .= $this->asset($group, $name);
		}

		return $assets;
	}

	/**
	 * Get the HTML link to a registered asset.
	 *
	 * @param  string  $group
	 * @param  string  $name
	 * @return string
	 */
	protected function asset($group, $name)
	{
		if ( ! isset($this->assets[$group][$name])) return '';

		$asset = $this->assets[$group][$name];

		// If the bundle source is not a complete URL, we will go ahead and prepend
		// the bundle's asset path to the source provided with the asset. This will
		// ensure that we attach the correct path to the asset.
		if (filter_var($asset['source'], FILTER_VALIDATE_URL) === false)
		{
			$asset['source'] = $this->path($asset['source']);
		}

		// If source is not a path to asset, render without wrap a HTML.
		if (strpos($asset['source'], '<') !== false)
		{
			return $asset['source'];
		}

		return HTML::$group($asset['source'], $asset['attributes']);
	}

	/**
	 * Sort and retrieve assets based on their dependencies
	 *
	 * @param   array  $assets
	 * @return  array
	 */
	protected function arrange($assets)
	{
		list($original, $sorted) = array($assets, array());

		while (count($assets) > 0)
		{
			foreach ($assets as $asset => $value)
			{
				$this->evaluateAsset($asset, $value, $original, $sorted, $assets);
			}
		}

		return $sorted;
	}

	/**
	 * Evaluate an asset and its dependencies.
	 *
	 * @param  string  $asset
	 * @param  string  $value
	 * @param  array   $original
	 * @param  array   $sorted
	 * @param  array   $assets
	 * @return void
	 */
	protected function evaluateAsset($asset, $value, $original, &$sorted, &$assets)
	{
		// If the asset has no more dependencies, we can add it to the sorted list
		// and remove it from the array of assets. Otherwise, we will not verify
		// the asset's dependencies and determine if they've been sorted.
		if (count($assets[$asset]['dependencies']) == 0)
		{
			$sorted[$asset] = $value;

			unset($assets[$asset]);
		}
		else
		{
			foreach ($assets[$asset]['dependencies'] as $key => $dependency)
			{
				if ( ! $this->dependecyIsValid($asset, $dependency, $original, $assets))
				{
					unset($assets[$asset]['dependencies'][$key]);

					continue;
				}

				// If the dependency has not yet been added to the sorted list, we can not
				// remove it from this asset's array of dependencies. We'll try again on
				// the next trip through the loop.
				if ( ! isset($sorted[$dependency])) continue;

				unset($assets[$asset]['dependencies'][$key]);
			}
		}
	}

	/**
	 * Verify that an asset's dependency is valid.
	 *
	 * A dependency is considered valid if it exists, is not a circular reference, and is
	 * not a reference to the owning asset itself. If the dependency doesn't exist, no
	 * error or warning will be given. For the other cases, an exception is thrown.
	 *
	 * @param  string  $asset
	 * @param  string  $dependency
	 * @param  array   $original
	 * @param  array   $assets
	 * @return bool
	 */
	protected function dependecyIsValid($asset, $dependency, $original, $assets)
	{
		if ( ! isset($original[$dependency]))
		{
			return false;
		}
		elseif ($dependency === $asset)
		{
			throw new \Exception("Asset [$asset] is dependent on itself.");
		}
		elseif (isset($assets[$dependency]) and in_array($asset, $assets[$dependency]['dependencies']))
		{
			throw new \Exception("Assets [$asset] and [$dependency] have a circular dependency.");
		}

		return true;
	}

}