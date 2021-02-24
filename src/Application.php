<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext;

use Ahamed\Jext\Controllers\ComponentController;
use Ahamed\Jext\Controllers\HelpController;
use Ahamed\Jext\Controllers\VersionController;
use Ahamed\Jext\Controllers\ViewController;
use Ahamed\Jext\Registry;

/**
 * The main CLI Application class.
 *
 * @since	1.0.0
 */
class Application
{
	/**
	 * Command Registry instance.
	 *
	 * @var		CommandRegistry		$registry	the registry instance.
	 *
	 * @since	1.0.0
	 */
	protected $registry = null;

	/**
	 * Set the default command for the application.
	 *
	 * @var		string	$defaultCommand 	The default command name.
	 *
	 * @since	1.0.0
	 */
	protected $defaultCommand = '--help';

	/**
	 * The application constructor function
	 *
	 * @since	1.0.0
	 */
	public function __construct()
	{
		$this->registry = new Registry;
	}

	/**
	 * Run commander function.
	 *
	 * @param	array	$argv	The CLI arguments array.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function runCommand(array $argv = [])
	{
		$command = $argv[1] ?? $this->defaultCommand;

		switch ($command)
		{
			case '--component':
			case '-c':
				$this->registry->registerController($command, new ComponentController);
				\call_user_func($this->registry->getRegistry($command), $argv);
				break;

			case '--view':
				$this->registry->registerController($command, new ViewController);
				\call_user_func($this->registry->getRegistry($command), $argv);
				break;

			case '--version':
			case '-v':
				$this->registry->registerController($command, new VersionController);
				\call_user_func($this->registry->getRegistry($command), $argv);
				break;

			case '--help':
			case '-h':
			default:
				$this->registry->registerController($command, new HelpController);
				\call_user_func($this->registry->getRegistry($command), $argv);
				break;
			
		}
	}
}