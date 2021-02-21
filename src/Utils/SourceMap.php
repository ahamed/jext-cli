<?php
/**
 * @package		ahamed.jext-cli
 *
 * @copyright	(C) 2021, Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @license		MIT
 */

namespace Ahamed\Jext\Utils;

/**
 * Source mapping class for mapping the assets.
 *
 * @since	1.0.0
 */
final class SourceMap
{
	/**
	 * Defining the source mapping array.
	 *
	 * @var		array	$sourceMap		The mapping array.
	 *
	 * @since	1.0.0
	 */
	private static $sourceMap = [
		[
			'directory' => '/',
			'src' => 'component.txt',
			'dest' => '{{component}}.xml',
			'package' => 'component',
			'client' => 'administrator'
		],
		[
			'directory' => '/',
			'src' => 'config.txt',
			'dest' => 'config.xml',
			'package' => 'component',
			'client' => 'administrator'
		],
		[
			'directory' => '/',
			'src' => 'access.txt',
			'dest' => 'access.xml',
			'package' => 'component',
			'client' => 'administrator'
		],
		[
			'directory' => '/forms',
			'src' => 'sample.txt',
			'dest' => 'sample.xml',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/forms',
			'src' => 'filter_samples.txt',
			'dest' => 'filter_samples.xml',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/helpers',
			'src' => 'component.txt',
			'dest' => '{{component_capitalize}}Helper.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/services',
			'src' => 'provider.txt',
			'dest' => 'provider.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/sql',
			'src' => 'install.mysql.utf8.txt',
			'dest' => 'install.mysql.utf8.sql',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/tmpl/sample',
			'src' => 'edit.txt',
			'dest' => 'edit.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/tmpl/samples',
			'src' => 'default.txt',
			'dest' => 'default.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Controller',
			'src' => 'DisplayController.txt',
			'dest' => 'DisplayController.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Controller',
			'src' => 'IcomoonController.txt',
			'dest' => 'IcomoonController.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Controller',
			'src' => 'SampleController.txt',
			'dest' => 'SampleController.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Controller',
			'src' => 'SamplesController.txt',
			'dest' => 'SamplesController.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Extension',
			'src' => 'ExtensionComponent.txt',
			'dest' => '{{component_capitalize}}Component.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Helper',
			'src' => 'ExtensionHelper.txt',
			'dest' => '{{component_capitalize}}Helper.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Helper',
			'src' => 'Icomoon.txt',
			'dest' => 'Icomoon.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Model',
			'src' => 'SampleModel.txt',
			'dest' => 'SampleModel.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Model',
			'src' => 'SamplesModel.txt',
			'dest' => 'SamplesModel.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Service/HTML',
			'src' => 'Icon.txt',
			'dest' => 'Icon.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Table',
			'src' => 'SampleTable.txt',
			'dest' => 'SampleTable.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/View/Icomoon',
			'src' => 'HtmlView.txt',
			'dest' => 'HtmlView.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/View/Sample',
			'src' => 'HtmlView.txt',
			'dest' => 'HtmlView.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/View/Samples',
			'src' => 'HtmlView.txt',
			'dest' => 'HtmlView.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/', // This language directory is relative to Assets/language directory
			'src' => 'extension.txt',
			'dest' => '{{prefix_component}}.ini',
			'package' => 'language',
			'client' => 'administrator'
		],
		[ 	'directory' => '/',
			'src' => 'extension.sys.txt',
			'dest' => '{{prefix_component}}.sys.ini',
			'package' => 'language',
			'client' => 'administrator'
		],
		[ 	'directory' => '/',
			'src' => 'extension.txt',
			'dest' => '{{prefix_component}}.ini',
			'package' => 'language',
			'client' => 'site'
		],
	];

	/**
	 * Get the source map.
	 *
	 * @return	array	The source mapping array.
	 *
	 * @since	1.0.0
	 */
	public static function getSourceMap()
	{
		return self::$sourceMap;
	}
}