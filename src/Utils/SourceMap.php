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
			'src' => 'note.txt',
			'dest' => 'note.xml',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/forms',
			'src' => 'filter_notes.txt',
			'dest' => 'filter_notes.xml',
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
		[ 	'directory' => '/tmpl/note',
			'src' => 'edit.txt',
			'dest' => 'edit.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/tmpl/notes',
			'src' => 'default.txt',
			'dest' => 'default.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/tmpl/icomoon',
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
			'src' => 'NoteController.txt',
			'dest' => 'NoteController.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Controller',
			'src' => 'NotesController.txt',
			'dest' => 'NotesController.php',
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
			'src' => 'NoteModel.txt',
			'dest' => 'NoteModel.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Model',
			'src' => 'NotesModel.txt',
			'dest' => 'NotesModel.php',
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
			'src' => 'NoteTable.txt',
			'dest' => 'NoteTable.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/View/Icomoon',
			'src' => 'HtmlView.txt',
			'dest' => 'HtmlView.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/View/Note',
			'src' => 'HtmlView.txt',
			'dest' => 'HtmlView.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/View/notes',
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
		[ 	'directory' => '/',
			'src' => 'joomla.asset.txt',
			'dest' => 'joomla.asset.json',
			'package' => 'media',
			'client' => ''
		],
		[ 	'directory' => '/js',
			'src' => 'icons.txt',
			'dest' => 'icons.js',
			'package' => 'media',
			'client' => ''
		],
		[ 	'directory' => '/css',
			'src' => 'icons.txt',
			'dest' => 'icons.css',
			'package' => 'media',
			'client' => ''
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