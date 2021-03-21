<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext\Controllers;

use Ahamed\Jext\Utils\Printer;

/**
 * Create the base command controller class.
 *
 * @since	1.0.0
 */
class BaseController
{
	/**
	 * Get the component metadata.
	 *
	 * @var		array	$meta	The metadata associative array.
	 * @since	1.0.0
	 */
	protected $meta = [];

	/**
	 * Get the working directory.
	 *
	 * @var		string	$workingDirectory	The directory.
	 *
	 * @since	1.0.0
	 */
	protected $workingDirectory = '';

	/**
	 * Constructor function for the command controller.
	 *
	 * @since	1.0.0
	 */
	public function __construct()
	{
		$this->workingDirectory = exec('pwd');
		$this->meta = [];
	}

	/**
	 * Print JEXT-CLI ASCII logo.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	protected function printAsciiLogo()
	{
		$asciiArt = <<<ASCII_ART
		_________   _______              _________         _______    _         _________
		\__    _/  (  ____ \  |\     /|  \__   __/        (  ____ \  ( \        \__   __/
		   )  (    | (    \/  ( \   / )     ) (           | (    \/  | (           ) (   
		   |  |    | (__       \ (_) /      | |   _____   | |        | |           | |   
		   |  |    |  __)       ) _ (       | |  (_____)  | |        | |           | |   
		   |  |    | (         / ( ) \      | |           | |        | |           | |   
		|\_)  )    | (____/\  ( /   \ )     | |           | (____/\  | (____/\  ___) (___
		(____/     (_______/  |/     \|     )_(           (_______/  (_______/  \_______/                                                             
		ASCII_ART;
		Printer::println(Printer::getColorizeMessage($asciiArt, 'green'));
		Printer::println();
	}

	/**
	 * Sanitize the user inputs.
	 *
	 * @param	string	$input	The input string.
	 *
	 * @return	string	The sanitized input string.
	 *
	 * @since	1.0.0
	 */
	protected function sanitizeInput(string $input)
	{
		/** Remove the leading and trailing quotes. */
		$input = preg_replace("@^[\"\']@", '', $input);
		$input = preg_replace("@[\"\']$@", '', $input);

		return $input;
	}

	/**
	 * Get the meta datum.
	 *
	 * @param	string	$component	The component name.
	 *
	 * @return	array	The meta data array.
	 *
	 * @since	1.0.0
	 */
	protected function getMeta(string $component = '') : array
	{
		$metaPath = $this->workingDirectory . '/jext.json';

		if (\file_exists($metaPath))
		{
			$this->meta = \json_decode(\file_get_contents($metaPath), true);
		}
		else
		{
			throw new \Exception('You are too early to get the meta data or the `jext.json` file has been deleted!');
		}

		return !empty($component) ? $this->meta[$component] : $this->meta;
	}

	/**
	 * Set meta data and write to the jext.json file.
	 *
	 * @param	array	$data		The meta array.
	 * @param	string	$component	If data write into a specific component.
	 * @param	bool	$replace	If the jext data need to be completely replaced.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	protected function setMeta(array $data, string $component, $replace = false) : void
	{
		try
		{
			$meta = $this->getMeta();
		}
		catch (\Exception $e)
		{
			$meta = [];
		}

		$meta[$component] = $meta[$component] ?? [];
		$meta[$component] = !$replace
			? array_merge($meta[$component], $data)
			: $data;

		\file_put_contents($this->workingDirectory . '/jext.json', \json_encode($meta, JSON_UNESCAPED_SLASHES));
	}
}
