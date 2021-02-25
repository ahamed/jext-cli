<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext\Controllers;

use Ahamed\Jext\Controllers\BaseController;
use Ahamed\Jext\Interfaces\ControllerInterface;
use Ahamed\Jext\Utils\Printer;

/**
 * Create the component controller.
 *
 * @since	1.0.0
 */
class VersionController extends BaseController implements ControllerInterface
{
	/**
	 * The run function for the controller which is responsible for running a command.
	 *
	 * @param	array	$args	The arguments array.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function run(array $args = []) : void
	{
		Printer::println("Jext-CLI version 1.0.0");
	}
}
