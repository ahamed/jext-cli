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
use Ahamed\Jext\Parsers\InjectionParser;
use Ahamed\Jext\Parsers\SourceParser;
use Ahamed\Jext\Utils\ComponentHelper;
use Ahamed\Jext\Utils\Printer;
use Ahamed\Jext\Utils\SourceMap;
use Ahamed\Jext\Utils\Utils;

/**
 * Create the component controller.
 *
 * @since	1.0.0
 */
class ViewController extends BaseController implements ControllerInterface
{
	/**
	 * The singular view name.
	 *
	 * @var		string	$singular	The view name (required).
	 *
	 * @since	1.0.0
	 */
	protected $singular;

	/**
	 * The plural view name.
	 *
	 * @var		string	$plural	The view name (required).
	 *
	 * @since	1.0.0
	 */
	protected $plural;

	/**
	 * The component name.
	 *
	 * @var		string	$component	The component name (required).
	 *
	 * @since	1.0.0
	 */
	protected $component;

	/**
	 * The view client.
	 *
	 * @var		string	$client		The view client, possible values ['--back', '-b', '--front', '-f']
	 *
	 * @since	1.0.0
	 */
	protected $client;

	/**
	 * ComponentController constructor function.
	 *
	 * @since	1.0.0
	 */
	public function __construct()
	{
		$this->singular = '';
		$this->plural = '';
		$this->component = '';

		/** By default we assume that the client is --back if user skip it. */
		$this->client = '--back';

		parent::__construct();
	}

	/**
	 * Override the getMeta function.
	 *
	 * @param	string	$component	The component name.
	 * @return	array	The meta data array.
	 *
	 * @since	1.0.0
	 */
	protected function getMeta(string $component = '') : array
	{
		$meta = parent::getMeta($component);

		$meta['singular'] = $this->getValue('singular');
		$meta['plural'] = $this->getValue('plural');

		return $meta;
	}

	/**
	 * Set the value of the properties.
	 *
	 * @param	string	$name	The component name.
	 * @param	string	$value	The value to set.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function setValue(string $name, string $value)
	{
		switch ($name)
		{
			case 'singular':
				$this->singular = $value;
				break;
			case 'plural':
				$this->plural = $value;
				break;
			case 'component':
				$this->componentName = $value;
				break;
			case 'client':
				$this->client = $value;
				break;
			default:
				throw new \InvalidArgumentException(\sprintf('%s property is not available to %s.', $name, __CLASS__));
		}
	}

	/**
	 * Get value of a property.
	 *
	 * @param	string	$name	The property name.
	 *
	 * @return	string	The value of the property.
	 *
	 * @since	1.0.0
	 */
	public function getValue(string $name)
	{
		switch ($name)
		{
			case 'singular':
				return $this->singular;
			case 'plural':
				return $this->plural;
			case 'component':
				return $this->componentName;
			case 'client':
				return $this->client;
			default:
				throw new \InvalidArgumentException(\sprintf('%s property is not available to %s.', $name, __CLASS__));
		}
	}

	/**
	 * Check if the component exists or not.
	 *
	 * @param	string	$component	The component name.
	 *
	 * @return	boolean	True if exists, false otherwise.
	 *
	 * @since	1.0.0
	 */
	private function hasComponent(string $component) : bool
	{
		$adminPath = $this->workingDirectory
			. '/administrator/components/com_' . $component;
		$sitePath = $this->workingDirectory
			. '/components/com_' . $component;
		$client = $this->mapClient($this->getValue('client'));

		return $client === 'both'
			? (\file_exists($adminPath) || \file_exists($sitePath))
			: ($client === 'administrator' ? \file_exists($adminPath) : \file_exists($sitePath));
	}

	/**
	 * Check if the view exists or not.
	 *
	 * @param	string	$view	The view name.
	 *
	 * @return	boolean	True if exists, false otherwise.
	 *
	 * @since	1.0.0
	 */
	private function hasView(string $view) : bool
	{
		$adminPath = $this->workingDirectory
			. '/administrator/components/com_' . $this->getValue('component')
			. '/tmpl/' . $view;
		$sitePath = $this->workingDirectory
			. '/components/com_' . $this->getValue('component')
			. '/tmpl/' . $view;
		$client = $this->mapClient($this->getValue('client'));

		return $client === 'both'
			? (\file_exists($adminPath) || \file_exists($sitePath))
			: ($client === 'administrator' ? \file_exists($adminPath) : \file_exists($sitePath));
	}

	/**
	 * Predict the plural form of the singular view name.
	 *
	 * @param	string	$singular	The singular name.
	 *
	 * @return	string	The plural name.
	 *
	 * @since	1.0.0
	 */
	private function predictPlural(string $singular) : string
	{
		return Utils::pluralize($singular);
	}

	/**
	 * Map client value.
	 *
	 * @param	string	$client		The client string.
	 *
	 * @return	string	The mapped client value.
	 *
	 * @since	1.0.0
	 */
	private function mapClient(string $client) : string
	{
		switch($client)
		{
			case '-bt':
			case '--both':
				return 'both';
			case '-f':
			case '--front':
				return 'site';
			case '-b':
			case '--back':
			default:
				return 'administrator';
		}
	}

	/**
	 * Read required values for a view.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	private function readRequiredValues() : void
	{
		Printer::println(Printer::getColorizeMessage('Provide required information for the view', 'green'));
		Printer::println();

		$stdin = fopen("php://stdin", 'r');

		Printer::print("Component name []: ");
		$component = trim(fgets($stdin));
		$component = \strtolower($component);

		if (empty($component))
		{
			Printer::println(Printer::getColorizeMessage("Component name is required", 'red'));
			exit;
		}

		$component = \strtolower($component);
		$component = \preg_match("@^com_@", $component)
			? \substr($component, 4)
			: $component;

		if (!$this->hasComponent($component))
		{
			Printer::println(Printer::getColorizeMessage(\sprintf("`%s` component not yet created!", $component), 'red'));
			Printer::println(Printer::getColorizeMessage(\sprintf("Run `jext-cli --component %s` for creating the component!", $component), 'green'));
			exit;
		}

		$this->setValue('component', $this->sanitizeInput($component));

		Printer::print("View name (singular) []: ");
		$singular = \trim(fgets($stdin));
		$singular = \strtolower($singular);

		if (empty($singular))
		{
			Printer::println(Printer::getColorizeMessage("Singular view name is required", 'red'));
			exit;
		}

		if ($this->hasView($singular))
		{
			Printer::print(
				\sprintf(
					"The view `%s` exists in the component `%s`. Do you want to overwrite it? (yes/no) [" .
					Printer::getColorizeMessage("no", 'yellow') . "]: ", $singular, $component
				)
			);
			$confirm = trim(fgets($stdin));
			$confirm = \strtolower($confirm) === 'yes';

			if (!$confirm)
			{
				Printer::println(Printer::getColorizeMessage(\sprintf("Please run `jext-cli --view %s` again.", $this->getValue('client')), 'green'));
				exit;
			}
		}

		$this->setValue('singular', $this->sanitizeInput($singular));

		$defaultPlural = $this->predictPlural($singular);
		Printer::print("View name (plural). Press enter if it is [" . Printer::getColorizeMessage($defaultPlural, 'yellow') . "]: ");
		$plural = \trim(fgets($stdin));
		$plural = !empty($plural) ? $plural : $defaultPlural;
		$plural = \strtolower($plural);
		$this->setValue('plural', $this->sanitizeInput($plural));
	}

	/**
	 * Create the view files.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	private function createView()
	{
		$sourceMap = SourceMap::getSourceMap(SourceMap::VIEW_MAP);
		$flags = ['administrator' => false, 'site' => false];
		$cliRoot = __DIR__ . '/../Assets';
		$extensionRoot = $this->workingDirectory;

		$parser = new SourceParser;
		$meta = $this->getMeta($this->getValue('component'));
		$parser->setMeta($meta);

		$client = $this->mapClient($this->getValue('client'));
		$component = ComponentHelper::getModifiedName($this->getValue('component'), 'prefix');

		foreach ($sourceMap as $map)
		{
			$srcPath = $cliRoot . '/'
				. $map['package'] . '/'
				. $map['client'] . $map['path'];
			$srcPath = rtrim($srcPath, '/');

			$destinationPath = $extensionRoot;

			if ($map['client'] === 'administrator')
			{
				if ($client !== 'both' && $client === 'site')
				{
					continue;
				}

				if (!$flags['administrator'])
				{
					Printer::println(Printer::getColorizeMessage("Creating administrator view files...", 'cyan'));
					$flags['administrator'] = true;
				}

				$destinationPath .= '/administrator/components/' . $component;
			}
			else
			{
				if ($client !== 'both' && $client === 'administrator')
				{
					continue;
				}

				if (!$flags['site'])
				{
					Printer::println(Printer::getColorizeMessage("Creating site view files...", 'cyan'));
					$flags['site'] = true;
				}

				$destinationPath .= '/components/' . $component;
			}

			$destinationPath .= $map['path'];
			$destinationPath = rtrim($destinationPath, '/');
			$destinationPath = ComponentHelper::parseContent($destinationPath, $meta);

			if (!\file_exists($destinationPath))
			{
				mkdir($destinationPath, 0755, true);
			}

			if (!empty($map['src']) && !empty($map['dest']))
			{
				$src = $srcPath . '/' . $map['src'];
				$dest = $destinationPath . '/' . $map['dest'];
				$dest = ComponentHelper::parseContent($dest, $meta);
				$parser->src($src)->dest($dest)->parse();
			}
		}
	}

	/**
	 * Inject the view related contents to the respective files.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	private function injectViewContents() : void
	{
		$sourceMap = SourceMap::getSourceMap(SourceMap::INJECTION_MAP);
		$cliRoot = __DIR__ . '/../Assets/injection';
		$componentRoot = $this->workingDirectory;

		$meta = $this->getMeta($this->getValue('component'));
		$client = $this->mapClient($this->getValue('client'));

		$parser = new InjectionParser;
		$parser->setMeta($meta);

		foreach ($sourceMap as $map)
		{
			if ($client === 'both' || $map['client'] === $client)
			{
				$src = $cliRoot . '/' . $map['client'] . '/' . $map['src'];
				$dest = $componentRoot . ComponentHelper::parseContent($map['directory'], $meta);

				$parser->setType($map['type'])
					->src($src)
					->dest($dest . '/' . ComponentHelper::parseContent($map['dest'], $meta))
					->parse();
			}
		}

		Printer::println();
		Printer::println(Printer::getColorizeMessage('Injection completed.', 'green'));
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
		$client = isset($args[2]) ? $args[2] : '--back';

		if (!\in_array($client, ['--back', '-b', '--front', '-f', '-bt', '--both']))
		{
			Printer::println();
			Printer::println(Printer::getColorizeMessage(sprintf("The %s command does not exists!", $client), 'red'));
			Printer::println();
			Printer::println(Printer::getColorizeMessage('jext-cli --view [-b|--back] [-f|--front] [-bt|--both]', 'green'));
			exit;
		}

		$this->setValue('client', $client);
		$this->readRequiredValues();

		Printer::println(Printer::getColorizeMessage("Creating view files...", 'cyan'));
		$this->createView();

		Printer::println(Printer::getColorizeMessage('Injecting view codes into respective files...', 'cyan'));
		$this->injectViewContents();
	}
}
