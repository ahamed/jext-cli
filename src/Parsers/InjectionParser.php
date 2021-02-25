<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext\Parsers;

use Ahamed\Jext\Parsers\SourceParser;
use Ahamed\Jext\Utils\ComponentHelper;
use Ahamed\Jext\Utils\Printer;

/**
 * Parser class for handling the injections.
 *
 * @since	1.0.0
 */
class InjectionParser extends SourceParser
{
	/**
	 * The injection type.
	 *
	 * @var		string	$type	The injection type.
	 *
	 * @since	1.0.0
	 */
	private $type = '';

	/**
	 * Constructor function for the InjectionParser.
	 *
	 * @since	1.0.0
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Set the injection type.
	 *
	 * @param	string	$type	The type to set.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function setType(string $type) : InjectionParser
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * Get the injection type.
	 *
	 * @return	string	The injection type.
	 *
	 * @since	1.0.0
	 */
	public function getType() : string
	{
		return $this->type;
	}

	/**
	 * Parse the injected data.
	 * @override the SourceParser parse method.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function parse(): void
	{
		if (empty($this->srcPath) || empty($this->destPath))
		{
			throw new \Exception(\sprintf('Please register source path and destination path before calling this "%s" method.', __METHOD__));
		}

		$srcContent = \file_get_contents($this->srcPath);
		$destContent = \file_get_contents($this->destPath);

		if (empty($srcContent))
		{
			throw new \Exception(\sprintf('The "%s" is invalid or the file is corrupted!', $this->srcPath));
		}

		if (empty($destContent))
		{
			throw new \Exception(\sprintf('The "%s" is invalid or the file is corrupted!', $this->destPath));
		}

		$parsedContent = ComponentHelper::parseInjections(
			$destContent,
			ComponentHelper::parseContent($srcContent, $this->meta),
			$this->getType()
		);

		\file_put_contents($this->destPath, $parsedContent);

		Printer::println(Printer::getColorizeMessage("Injected contents into " . $this->destPath . " file.", 'green'));
	}
}
