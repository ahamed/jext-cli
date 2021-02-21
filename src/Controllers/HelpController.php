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
class HelpController extends BaseController implements ControllerInterface
{
	/**
	 * The run function for the controller which is responsible for running a command.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function run(array $args = []) : void
	{
		Printer::println(Printer::getColorizeMessage("usage:", 'yellow'));
		Printer::println(Printer::getColorizeMessage("\tjext-cli [options] [<name>] [<flag>]", 'green'));
		Printer::println();
		Printer::println(Printer::getColorizeMessage("Options:", 'yellow'));
		Printer::println(Printer::getColorizeMessage("\t-h, --help", 'green') . "\t\t\tDisplay the help message");
		Printer::println(Printer::getColorizeMessage("\t-v, --version", 'green') . "\t\t\tDisplay current stable version");
		Printer::println(Printer::getColorizeMessage("\t-c, --component <name>", 'green') . "\t\tCreate component");
		Printer::println(Printer::getColorizeMessage("\t-v, --view <name> [-f, --front]", 'green') . "\tCreate View with name and frontend view flag");
		Printer::println(Printer::getColorizeMessage("\t-v, --view <name> [-b, --back]", 'green') . "\tCreate View with name and backend view flag");
	}
}