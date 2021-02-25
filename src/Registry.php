<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext;

use Ahamed\Jext\Interfaces\ControllerInterface;
use Ahamed\Jext\Interfaces\RegistryInterface;

/**
 * Registry class for registering various commands.
 *
 * @since	1.0.0
 */
class Registry implements RegistryInterface
{
	/**
	 * The registry container array.
	 *
	 * @var		array	$registry	The registry array.
	 *
	 * @since	1.0.0
	 */
	private $registry = [];

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
	public function registerCommand(string $name, callable $callable) : void
	{
		$this->registry[$name] = $callable;
	}

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
	public function registerController(string $name, ControllerInterface $controller) : void
	{
		$this->registry[$name] = $controller;
	}

	/**
	 * Get a registered command.
	 *
	 * @param	string		$name	The command name.
	 *
	 * @return	callable	The registered callable or null if not found.
	 *
	 * @throws	\InvalidArgumentException
	 *
	 * @since	1.0.0
	 */
	public function getRegistry(string $name) : callable
	{
		/** First check if there any controller registered against the name. */
		$controller = isset($this->registry[$name]) ? $this->registry[$name] : null;

		if (!\is_null($controller))
		{
			return [$controller, 'run'];
		}

		$command = isset($this->registry[$name]) ? $this->registry[$name] : null;

		if (\is_null($command))
		{
			throw new \InvalidArgumentException(sprintf('The %s is not registered to the registry!', $name));
		}

		return $command;
	}
}
