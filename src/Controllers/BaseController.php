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
		Printer::println(Printer::getColorizeMessage(
			"
_________   _______              _________         _______    _         _________
\__    _/  (  ____ \  |\     /|  \__   __/        (  ____ \  ( \        \__   __/
   )  (    | (    \/  ( \   / )     ) (           | (    \/  | (           ) (   
   |  |    | (__       \ (_) /      | |   _____   | |        | |           | |   
   |  |    |  __)       ) _ (       | |  (_____)  | |        | |           | |   
   |  |    | (         / ( ) \      | |           | |        | |           | |   
|\_)  )    | (____/\  ( /   \ )     | |           | (____/\  | (____/\  ___) (___
(____/     (_______/  |/     \|     )_(           (_______/  (_______/  \_______/                                                             
			",
		'green'));
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
	 * @return	array	The meta data array.
	 *
	 * @since	1.0.0
	 */
	protected function getMeta() : array
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

		return $this->meta;
	}
}