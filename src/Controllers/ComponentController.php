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
use Exception;

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
		$currentYear = (new \DateTime)->format('Y');
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
		$namespace = !empty($namespace) ? $namespace : $defaultNamespace;

		$creationDate = (new \DateTime)->format('d F, Y');

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
			'namespace' => $namespace,
			'singular' => 'note',
			'plural' => 'notes',
			'views' => ['back' => ['note', 'notes'], 'front' => ['note', 'notes']]
		];

		foreach ($this->meta as $key => $value)
		{
			$this->meta[$key] = \is_string($value) ? $this->sanitizeInput($value) : $value;
		}

		Printer::println(Printer::getColorizeMessage(\json_encode($this->meta, JSON_PRETTY_PRINT), 'green'));

		Printer::println();

		Printer::print("Do you confirm component creation [" . Printer::getColorizeMessage("yes", 'yellow') . "]? ");
		$confirmation = trim(fgets($stdin));
		$confirmation = !empty($confirmation) ? strtolower($confirmation) : 'yes';

		if ($confirmation === 'yes')
		{
			Printer::println(Printer::getColorizeMessage("Generating the component metadata...", 'purple'));
			$this->setMeta($this->meta, $this->getName(), true);
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
		$flags = ['component' => false, 'language' => false, 'media' => false];
		$sourceMap = SourceMap::getSourceMap(SourceMap::COMPONENT_MAP);
		$metaData = $this->getMeta($this->name);

		$cliRoot = __DIR__ . '/../Assets';
		$extensionRoot = $this->workingDirectory;

		$parser = new SourceParser;

		foreach ($sourceMap as $map)
		{
			$srcPath = $cliRoot . '/'
				. $map['package'] . '/'
				. $map['client'] . $map['path'];
			$srcPath = rtrim($srcPath, '/');

			$destinationPath = $extensionRoot;

			if ($map['package'] === 'component')
			{
				if (!$flags['component'])
				{
					Printer::println(Printer::getColorizeMessage("Creating component administrator and site files...", 'cyan'));
					$flags['component'] = true;
				}

				if ($map['client'] === 'administrator')
				{
					$destinationPath .= '/administrator/components/';
				}
				else
				{
					$destinationPath .= '/components/';
				}

				$destinationPath .= ComponentHelper::getModifiedName($this->name, 'prefix');
			}
			elseif ($map['package'] === 'language')
			{
				if (!$flags['language'])
				{
					Printer::println(Printer::getColorizeMessage("Creating component language files...", 'cyan'));
					$flags['language'] = true;
				}

				if ($map['client'] === 'administrator')
				{
					$destinationPath .= '/administrator/language/en-GB/';
				}
				else
				{
					$destinationPath .= '/language/en-GB/';
				}
			}
			elseif ($map['package'] === 'media')
			{
				if (!$flags['media'])
				{
					Printer::println(Printer::getColorizeMessage("Creating component media files...", 'cyan'));
					$flags['media'] = true;
				}

				$destinationPath .= '/media/' . ComponentHelper::getModifiedName($this->name, 'prefix');
			}
			else
			{
				continue;
			}

			$destinationPath .= $map['path'];
			$destinationPath = rtrim($destinationPath, '/');

			/** If directory not exists then create it. */
			if (!\file_exists($destinationPath))
			{
				mkdir($destinationPath, 0755, true);
			}

			if ($map['src'] && $map['dest'])
			{
				$src = $srcPath . '/' . $map['src'];
				$src = ComponentHelper::parseContent($src, $metaData);

				$dest = $destinationPath . '/' . $map['dest'];
				$dest = ComponentHelper::parseContent($dest, $metaData);

				$parser->setMeta($metaData)->src($src)->dest($dest)->parse();
			}
		}
	}

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
		$name = isset($args[2]) ? $args[2] : null;

		if (\is_null($name))
		{
			Printer::println(
				Printer::getColorizeMessage(
					"The --component or -c option requires the <name> value as third argument. e.g: "
					. Printer::getColorizeMessage("jext-cli --component todo", 'green'), 'red'
				)
			);
			return;
		}

		$this->setName($name);

		$componentPath = $this->workingDirectory . '/administrator/components/' . ComponentHelper::getModifiedName($this->name, 'prefix');

		if (\file_exists($componentPath))
		{
			Printer::print(
				"The component exists in your project. Do you want to overwrite it? (yes/no) ["
				. Printer::getColorizeMessage("no", 'yellow') . "]: "
			);
			$stdin = fopen("php://stdin", 'r');
			$confirmation = trim(fgets($stdin));

			if (\strtolower($confirmation) !== 'yes')
			{
				Printer::println(Printer::getColorizeMessage("Aborted! Component creation stopped.", 'red'));
				return;
			}
		}

		$this->printAsciiLogo();

		Printer::println(Printer::getColorizeMessage("(C) Sajeeb Ahamed, All rights reserved.", 'cyan'));

		Printer::println();
		Printer::println("Welcome to JEXT-CLI component builder tool. Please provide the asking information:");
		Printer::println();

		$this->createComponentMeta();

		Printer::println(Printer::getColorizeMessage("Creating component core files...", 'cyan'));
		$this->createComponentFiles();
	}
}
