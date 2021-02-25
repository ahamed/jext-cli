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
	 * @param	string	$name		The component name.
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
	 * Parse injections.
	 *
	 * @param	string	$content		The content being parsed.
	 * @param	string	$replacement	The replacement content.
	 * @param	string	$type			The injection type.
	 *
	 * @return	string	The parsed contents.
	 *
	 * @since	1.0.0
	 */
	public static function parseInjections(string $content,  string $replacement, string $type) : string
	{
		$regex = "@(--|;;|<!--|\/\/|\/\*\*)\s*{{inject:\s*([^(}})]*)}}(-->|\*\/)?@mi";
		$matches = [];
		$fullMatch = [];
		$injections = [];

		preg_match_all($regex, $content, $matches);

		/** Check if the group 2 is present in the matches. */
		if (!empty($matches) && !empty($matches[2]))
		{
			$injections = $matches[2];
			$fullMatch = $matches[0];
		}

		if (!empty($injections))
		{
			foreach ($injections as $key => $injection)
			{
				if ($type === $injection)
				{
					$content = preg_replace("@" . $fullMatch[$key] . "@i", $replacement, $content);
					break;
				}
			}
		}

		return $content;
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
		$year = (new \DateTime)->format('Y');
		$credit = '<div class="jext-cli-footnote" style="min-height: 80px;background: #ffffff;' .
			'margin-top: 100px;display: flex;flex-direction: column;justify-content: center;'
			. 'align-items: center;border-radius: 10px;box-shadow: 1px 1px 2px 0px #2222225c;'
			. 'font-family: \'helvetica\', sans-serif;font-size: 14px;color: #757575;">'
			. '<p style="margin: 0;">Powered by <a href="https://github.com/ahamed/jext-cli" '
			. 'style="text-decoration: none;"><code>JEXT-CLI</code></a>,'
			. ' Developed by <a href="https://ahamed.github.io" style="text-decoration: none;">Sajeeb Ahamed</a>'
			. '</p><a href="https://ahamed.github.io" style="text-decoration: none;"><small>&copy; '
			. $year . ', Sajeeb Ahamed</small></a></div>';

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
		$content = preg_replace("@{{year}}@", $year, $content);
		$content = preg_replace("@{{credit}}@", $credit, $content);
		$content = preg_replace("@{{singular}}@", $singular, $content);
		$content = preg_replace("@{{plural}}@", $plural, $content);
		$content = preg_replace("@{{singular_capitalize}}@", \ucfirst($singular), $content);
		$content = preg_replace("@{{plural_capitalize}}@", \ucfirst($plural), $content);
		$content = preg_replace("@{{singular_uppercase}}@", \strtoupper($singular), $content);
		$content = preg_replace("@{{plural_uppercase}}@", \strtoupper($plural), $content);

		return $content;
	}
}
