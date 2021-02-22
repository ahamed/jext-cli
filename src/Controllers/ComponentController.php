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
use Ahamed\Jext\Parsers\SourceParser;
use Ahamed\Jext\Utils\ComponentHelper;
use Ahamed\Jext\Utils\Printer;
use Ahamed\Jext\Utils\SourceMap;
use DateTime;

/**
 * Create the component controller.
 *
 * @since	1.0.0
 */
class ComponentController extends BaseController implements ControllerInterface
{
	/**
	 * The component name.
	 *
	 * @var		string	$name	The component name (required).
	 *
	 * @since	1.0.0
	 */
	private $name;

	/**
	 * ComponentController constructor function.
	 *
	 * @since	1.0.0
	 */
	public function __construct()
	{
		$this->name = '';
		
		parent::__construct();
	}


	/**
	 * Print JEXT-CLI ASCII logo.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	private function printAsciiLogo()
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
	 * Set the component name.
	 *
	 * @param	string	$name	The component name.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function setName(string $name)
	{
		$this->name = $name;
	}

	/**
	 * Get the component name.
	 *
	 * @return	string	The component name.
	 *
	 * @since	1.0.0
	 */
	public function getName()
	{
		return $this->name;
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
	private function sanitizeInput(string $input)
	{
		/** Remove the leading and trailing quotes. */
		$input = preg_replace("@^[\"\']@", '', $input);
		$input = preg_replace("@[\"\']$@", '', $input);

		return $input;
	}

	/**
	 * Handling the component meta information.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	private function createComponentMeta()
	{
		$stdin = fopen("php://stdin", 'r');
		$currentUser = exec('whoami');
		$currentYear = (new DateTime)->format('Y');
		$defaultNamespace = ComponentHelper::generateComponentNamespace($this->name);

		Printer::print("Author Name [" . Printer::getColorizeMessage($currentUser, 'yellow') . "]: ");
		$author = trim(fgets($stdin));
		$author = !empty($author) ? $author : $currentUser;

		Printer::print("Author Email []: ");
		$email = trim(fgets($stdin));
		$email = !empty($email) ? $email : '';

		Printer::print("Author Url []: ");
		$url = trim(fgets($stdin));
		$url = !empty($url) ? $url : '';
		
		Printer::print("Description []: ");
		$description = trim(fgets($stdin));
		$description = !empty($description) ? $description : '';
		
		
		Printer::print("Copyright [" . Printer::getColorizeMessage("(C) {$currentYear}, {$this->sanitizeInput($author)}", 'yellow') . "]: ");
		$copyright = trim(fgets($stdin));
		$copyright = !empty($copyright) ? $copyright : "(C) {$currentYear}, {$this->sanitizeInput($author)}";
		
		Printer::print("License [" . Printer::getColorizeMessage('MIT', 'yellow') . "]: ");
		$license = trim(fgets($stdin));
		$license = !empty($license) ? $license : "MIT";

		Printer::print("Version [" . Printer::getColorizeMessage('1.0.0', 'yellow') . "]: ");
		$version = trim(fgets($stdin));
		$version = !empty($version) ? $version : "1.0.0";
		
		Printer::print("Namespace [" . Printer::getColorizeMessage($defaultNamespace, 'yellow') . "]: ");
		$namespace = trim(fgets($stdin));
		$namespace = !empty($namespace) ? $namespace: $defaultNamespace;
		
		$creationDate = (new DateTime)->format('d F, Y');

		Printer::println();

		$this->meta = [
			'name' => $this->name,
			'author' => $author,
			'creationDate' => $creationDate,
			'copyright' => $copyright,
			'license' => $license,
			'email' => $email,
			'url' => $url,
			'version' => $version,
			'description' => $description,
			'namespace' => $namespace
		];

		foreach ($this->meta as $key => $value)
		{
			$this->meta[$key] = $this->sanitizeInput($value);
		}

		Printer::println(Printer::getColorizeMessage(\json_encode($this->meta, JSON_PRETTY_PRINT), 'green'));

		Printer::println();

		Printer::print("Do you confirm component creation [" . Printer::getColorizeMessage("yes", 'yellow') . "]? ");
		$confirmation = trim(fgets($stdin));
		$confirmation = !empty($confirmation) ? strtolower($confirmation) : 'yes';

		if ($confirmation === 'yes')
		{
			Printer::println(Printer::getColorizeMessage("Generating the component metadata...", 'purple'));
			\file_put_contents($this->workingDirectory . '/jext.json', \json_encode($this->meta, JSON_UNESCAPED_SLASHES));
			Printer::println(Printer::getColorizeMessage("Metadata generation completed.", 'green'));
		}
		else
		{
			Printer::println(Printer::getColorizeMessage("Aborted component creation!", 'red'));
		}

		Printer::println();
	}

	/**
	 * Create component files.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	private function createComponentFiles()
	{
		$sourceMap = SourceMap::getSourceMap();

		$cliRoot = __DIR__ . '/../Assets/';
		$componentRoot = $this->workingDirectory;


		$parser = new SourceParser;

		foreach ($sourceMap as $map)
		{
			if ($map['package'] !== 'component')
			{
				continue;
			}

			$destDirectory = $componentRoot . '/'
				. ($map['client'] === 'administrator' ? 'administrator/components/' : 'components/')
				. ComponentHelper::getModifiedName($this->name, 'prefix')
				. rtrim($map['directory'], '/');
			$destDirectory = rtrim($destDirectory, '/');

			if (!\file_exists($destDirectory))
			{
				mkdir($destDirectory, 0755, true);
			}

			if (empty($map['src']) || empty($map['src']))
			{
				continue;
			}

			$src = $cliRoot . $map['client'] . rtrim($map['directory'], '/') . '/' . $map['src'];
			$dest = ComponentHelper::parseContent($destDirectory . '/' . $map['dest'], $this->meta);
			$parser->src($src)->dest($dest)->parse();
		}
	}

	/**
	 * Create Language files
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	private function createLanguageFiles() : void
	{
		$sourceMap = SourceMap::getSourceMap();

		$cliRoot = __DIR__ . '/../Assets/language/';
		$componentRoot = $this->workingDirectory;

		$parser = new SourceParser;

		foreach ($sourceMap as $map)
		{
			if ($map['package'] !== 'language')
			{
				continue;
			}

			$destDirectory = $componentRoot . '/'
				. ($map['client'] === 'administrator' ? 'administrator/language/en-GB' : 'language/en-GB')
				. rtrim($map['directory'], '/');
			$destDirectory = rtrim($destDirectory, '/');

			if (!\file_exists($destDirectory))
			{
				mkdir($destDirectory, 0755, true);
			}

			if (empty($map['src']) || empty($map['src']))
			{
				continue;
			}

			$src = $cliRoot . $map['client'] . rtrim($map['directory'], '/') . '/' . $map['src'];
			$dest = ComponentHelper::parseContent($destDirectory . '/' . $map['dest'], $this->meta);
			$parser->src($src)->dest($dest)->parse();
		}
	}

	/**
	 * Create media files.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function createMediaFiles()
	{
		$sourceMap = SourceMap::getSourceMap();

		$cliRoot = __DIR__ . '/../Assets/media/';
		$componentRoot = $this->workingDirectory;

		$parser = new SourceParser;

		foreach ($sourceMap as $map)
		{
			if ($map['package'] !== 'media')
			{
				continue;
			}

			$destDirectory = $componentRoot . '/media/'
				. ComponentHelper::getModifiedName($this->name, 'prefix')
				. rtrim($map['directory'], '/');

			$destDirectory = rtrim($destDirectory, '/');

			if (!\file_exists($destDirectory))
			{
				mkdir($destDirectory, 0755, true);
			}

			if (empty($map['src']) || empty($map['src']))
			{
				continue;
			}

			$src = $cliRoot . rtrim($map['directory'], '/') . '/' . $map['src'];
			$dest = ComponentHelper::parseContent($destDirectory . '/' . $map['dest'], $this->meta);
			$parser->src($src)->dest($dest)->parse();
		}
	}


	/**
	 * The run function for the controller which is responsible for running a command.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function run(array $args = []) : void
	{
		$name = isset($args[2]) ? $args[2] : null;
		
		if (\is_null($name))
		{
			Printer::println(Printer::getColorizeMessage("The --component or -c option requires the <name> value as third argument. e.g: " . Printer::getColorizeMessage("jext-cli --component todo", 'green'), 'red'));
			return;
		}
		
		$this->setName($name);

		$componentPath = $this->workingDirectory . '/administrator/components/' . ComponentHelper::getModifiedName($this->name, 'prefix');

		if (\file_exists($componentPath))
		{
			Printer::print("The component exists in your project. Do you want to overwrite it? [" . Printer::getColorizeMessage("no", 'yellow') . "]: ");
			$stdin = fopen("php://stdin", 'r');
			$confirmation = trim(fgets($stdin));

			if (\strtolower($confirmation) !== 'yes')
			{
				Printer::println(Printer::getColorizeMessage("Aborted! Component creation stopped.", 'red'));
				return;
			}
		}

		$this->printAsciiLogo();
		
		Printer::println(Printer::getColorizeMessage("(C) Sajeeb Ahamed, All rights reserved.", 'purple'));

		Printer::println();
		Printer::println("Welcome to JEXT-CLI component builder tool. Please provide the asking information:");
		Printer::println();
		
		$this->createComponentMeta();

		Printer::println(Printer::getColorizeMessage("Creating component core files...", 'purple'));
		$this->createComponentFiles();

		Printer::println(Printer::getColorizeMessage("Creating component language files...", 'purple'));
		$this->createLanguageFiles();

		Printer::println(Printer::getColorizeMessage("Creating component media files...", 'purple'));
		$this->createMediaFiles();
	}
}