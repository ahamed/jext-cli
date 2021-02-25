<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext\Interfaces;

/**
 * Controller interface.
 *
 * @since	1.0.0
 */
interface ControllerInterface
{
	/**
	 * The run function for the controller which is responsible for running a command.
	 *
	 * @param	array	$args	Command arguments.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function run(array $args = []) : void;
}
