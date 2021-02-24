<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext\Utils;

/**
 * The global utils class,
 * The pluralize methods functionalities get from
 * https://gist.github.com/tbrianjones/ba0460cc1d55f357e00b
 *
 * @since	1.0.0
 */
final class Utils
{
	/**
	 * Printer color map.
	 *
	 * @var		array	$colorMap	The mapped color name and value.
	 *
	 * @since	1.0.0
	 */
	private static $plural = array(
		'/(quiz)$/i'               => "$1zes",
		'/^(ox)$/i'                => "$1en",
		'/([m|l])ouse$/i'          => "$1ice",
		'/(matr|vert|ind)ix|ex$/i' => "$1ices",
		'/(x|ch|ss|sh)$/i'         => "$1es",
		'/([^aeiouy]|qu)y$/i'      => "$1ies",
		'/(hive)$/i'               => "$1s",
		'/(?:([^f])fe|([lr])f)$/i' => "$1$2ves",
		'/(shea|lea|loa|thie)f$/i' => "$1ves",
		'/sis$/i'                  => "ses",
		'/([ti])um$/i'             => "$1a",
		'/(tomat|potat|ech|her|vet)o$/i'=> "$1oes",
		'/(bu)s$/i'                => "$1ses",
		'/(alias)$/i'              => "$1es",
		'/(octop)us$/i'            => "$1i",
		'/(ax|test)is$/i'          => "$1es",
		'/(us)$/i'                 => "$1es",
		'/s$/i'                    => "s",
		'/$/'                      => "s"
	);

	/**
	 * Irregular language strings.
	 *
	 * @var		array	$irregular	The irregular array.
	 *
	 * @since	1.0.0
	 */
	private static $irregular = array(
		'move'   => 'moves',
		'foot'   => 'feet',
		'goose'  => 'geese',
		'sex'    => 'sexes',
		'child'  => 'children',
		'man'    => 'men',
		'tooth'  => 'teeth',
		'person' => 'people',
		'valve'  => 'valves'
	);
	
	/**
	 * No change values.
	 *
	 * @var		array	This values are never changed.
	 *
	 * @since	1.0.0
	 */
	private static $noChange = array( 
		'sheep', 
		'fish',
		'deer',
		'series',
		'species',
		'money',
		'rice',
		'information',
		'equipment'
	);

	/**
	 * The pluralize method.
	 *
	 * @param	string	$str	The singular string.
	 *
	 * @return	string	The pluralize string.
	 *
	 * @since	1.0.0
	 */
	public static function pluralize(string $string) : string
	{
		$string = \strtolower($string);

		/** Check if the string matches with the noChanged values. */
		if (\in_array($string, self::$noChange))
		{
			return	$string;
		}

		/** Check if the string matches with the irregular values. */
		foreach (self::$irregular as $key => $value)
		{
			if ($key === $string)
			{
				return $value;
			}
		}

		/** Check on regular match cases. */
		foreach (self::$plural as $regex => $replace)
		{
			if (preg_match($regex, $string))
			{
				return preg_replace($regex, $replace, $string);
			}
		}

		/** If nothing matches then returns the original string. */
		return $string;
	}
}