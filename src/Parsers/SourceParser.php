<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext\Parsers;

use Ahamed\Jext\Utils\ComponentHelper;
use Ahamed\Jext\Utils\Printer;
use Exception;

/**
 * Source code parsers.
 *
 * @since	1.0.0
 */
class SourceParser
{
	/**
	 * The file source path (relative to the jext-cli root)
	 *
	 * @var		string	$srcPath	The source path.
	 *
	 * @since	1.0.0
	 */
	private $srcPath = '';

	/**
	 * The file destination path (relative to the project root)
	 *
	 * @var		string	$destPath	The destination path.
	 *
	 * @since	1.0.0
	 */
	private $destPath = '';

	/**
	 * The component meta data created before by the user.
	 *
	 * @var		array	$meta	The meta information.
	 *
	 * @since	1.0.0
	 */
	private $meta = [];

	/**
	 * Constructor function for the source parser.
	 *
	 * @since	1.0.0
	 */
	public function __construct()
	{
		$workingDirectory = exec('pwd');
		$metaPath = $workingDirectory . '/jext.json';

		if (!\file_exists($metaPath))
		{
			throw new \Exception(sprintf('The jext.json file is missing!'));
		}

		$this->meta = \json_decode(\file_get_contents($metaPath), true);
	}

	/**
	 * Register the src path.
	 *
	 * @param	string	$path 	The source path.
	 *
	 * @return	SourceParser for chaining.
	 *
	 * @since	1.0.0
	 */
	public function src(string $path) : SourceParser
	{
		$this->srcPath = $path;

		return $this;
	}

	/**
	 * Register the destination path.
	 *
	 * @param	string	$path 	The source path.
	 *
	 * @return	SourceParser for chaining.
	 *
	 * @since	1.0.0
	 */
	public function dest(string $path) : SourceParser
	{
		$this->destPath = $path;

		return $this;
	}

	/**
	 * Run the parse operation
	 *
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function parse() : void
	{
		if (empty($this->srcPath) || empty($this->destPath))
		{
			throw new \Exception(\sprintf('Please register source path and destination path before calling this "%s" method.', __METHOD__));
		}

		$srcContent = \file_get_contents($this->srcPath);

		if (empty($srcContent))
		{
			throw new \Exception(\sprintf('The "%s" is invalid or the file is corrupted!', $this->srcPath));
		}

		$parsedContent = ComponentHelper::parseContent($srcContent, $this->meta);
		\file_put_contents($this->destPath, $parsedContent);

		Printer::println(Printer::getColorizeMessage("Created " . $this->destPath . " file.", 'green'));
	}
}