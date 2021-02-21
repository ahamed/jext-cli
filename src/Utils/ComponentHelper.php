<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext\Utils;

/**
 * Component Helper Class
 *
 * @since	1.0.0
 */
class ComponentHelper
{
	/**
	 * Generate the component namespace
	 *
	 * @param	string	$name	The component name.
	 * @param	string	$client	The component name.
	 *
	 * @return	string	The namespace string.
	 *
	 * @since	1.0.0
	 */
	public static function generateComponentNamespace(string $name, string $client = '') : string
	{
		$namespace = "Joomla\\Component\\" . ucfirst($name);
		$namespace = !empty($client) ? $namespace . "\\" . ucfirst($client) : $namespace;

		return $namespace;
	}

	/**
	 * Modify the component name using a modifier.
	 * The valid modifiers are [prefix, capitalize, uppercase]
	 *
	 * @param	string	$modifier	The modifier name.
	 *
	 * @return	string	The modified name.
	 *
	 * @since	1.0.0
	 */
	public static function getModifiedName(string $name, string $modifier) : string
	{
		if (empty($modifier))
		{
			return $name;
		}

		switch ($modifier)
		{
			case 'prefix':
				return 'com_' . $name;
			case 'capitalize':
			case 'capitalise':
				return ucfirst($name);
			case 'uppercase':
				return strtoupper($name);
			case 'prefix-upper':
				return strtoupper('com_' . $name);
			default:
				return $name;
		}

		return $name;
	}

	/**
	 * Parse the source content.
	 *
	 * @param	string	$content	The source content.
	 * @param	array	$meta		The meta array.
	 *
	 * @return	string	The parsed content.
	 *
	 * @since	1.0.0
	 */
	public static function parseContent(string $content, array $meta) : string
	{
		if (empty($meta))
		{
			throw new \Exception(\sprintf('You come too early for this operation!'));
		}

		extract($meta);

		$prefixedName = self::getModifiedName($name, 'prefix');
		$capitalizeName = self::getModifiedName($name, 'capitalize');
		$uppercase = self::getModifiedName($name, 'uppercase');
		$prefixedUppercase = self::getModifiedName($name, 'prefix-upper');

		$content = preg_replace("@{{prefix_component}}@", $prefixedName, $content);
		$content = preg_replace("@{{prefix_component_uppercase}}@", $prefixedUppercase, $content);
		$content = preg_replace("@{{component_capitalize}}@", $capitalizeName, $content);
		$content = preg_replace("@{{component_uppercase}}@", $uppercase, $content);
		$content = preg_replace("@{{component}}@", $name, $content);
		$content = preg_replace("@{{namespace}}@", $namespace, $content);
		$content = preg_replace("@{{author}}@", $author, $content);
		$content = preg_replace("@{{creationDate}}@", $creationDate, $content);
		$content = preg_replace("@{{email}}@", $email, $content);
		$content = preg_replace("@{{url}}@", $url, $content);
		$content = preg_replace("@{{version}}@", $version, $content);
		$content = preg_replace("@{{license}}@", $license, $content);
		$content = preg_replace("@{{copyright}}@", $copyright, $content);
		$content = preg_replace("@{{description}}@", $description, $content);

		return $content;
	}
}