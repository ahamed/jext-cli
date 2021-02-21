<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext\Controllers;

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
	}
}