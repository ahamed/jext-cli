<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext\Interfaces;


/**
 * Registry interface
 *
 * @since	1.0.0
 */
interface RegistryInterface
{
	/**
	 * Register a command.
	 *
	 * @param	string		$name		The command name.
	 * @param	callable	$callable	The callable method which would be registered.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function registerCommand(string $name, callable $callable) : void;

	/**
	 * Register a controller.
	 *
	 * @param	string				$name			The command name.
	 * @param	ControllerInterface	$controller		The callable method which would be registered.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function registerController(string $name, ControllerInterface $controller) : void;

	/**
	 * Get a registered command.
	 *
	 * @param	string		$name	The command name.
	 *
	 * @return	callable|ControllerInterface	The registered callable or null if not found.
	 *
	 * @throws	\InvalidArgumentException
	 *
	 * @since	1.0.0
	 */
	public function getRegistry(string $name);
}