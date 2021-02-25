<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext\Utils;

/**
 * Printer helper class
 *
 * @since	1.0.0
 */
final class Printer
{
	/**
	 * Printer color map.
	 *
	 * @var		array	$colorMap	The mapped color name and value.
	 *
	 * @since	1.0.0
	 */
	private static $colorMap = [
		'black' => '0;30',
		'blue' => '0;34',
		'green' => '0;32',
		'cyan' => '0;36',
		'red' => '0;31',
		'purple' => '0;35',
		'yellow' => '1;33',
		'white' => '1;37'
	];

	/**
	 * The valid colors array.
	 *
	 * @var		array	$validColors	The valid colors name.
	 *
	 * @since	1.0.0
	 */
	private static $validColors = ['black', 'blue', 'green', 'cyan', 'red', 'purple', 'yellow', 'white'];

	/**
	 * Print plain message.
	 *
	 * @param	string	$message	The message string to print.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public static function print(string $message) : void
	{
		echo $message;
	}

	/**
	 * Print plain message with newline.
	 *
	 * @param	string	$message	The message string to print.
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public static function println(string $message = '') : void
	{
		echo ($message !== '' ? $message . "\n" : "\n");
	}

	/**
	 * Get colorize message.
	 *
	 * @param	string	$message	The message string.
	 * @param	string	$color		The color name.
	 *
	 * @return	string	The colorize string.
	 *
	 * @since	1.0.0
	 */
	public static function getColorizeMessage(string $message, string $color) : string
	{
		if (!\in_array($color, self::$validColors))
		{
			return $message;
		}

		return "\033[" . self::$colorMap[$color] . "m" . $message . "\033[0m";
	}
}
