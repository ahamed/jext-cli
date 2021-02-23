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
			'src' => 'component.jext',
			'dest' => '{{component}}.xml',
			'package' => 'component',
			'client' => 'administrator'
		],
		[
			'directory' => '/',
			'src' => 'config.jext',
			'dest' => 'config.xml',
			'package' => 'component',
			'client' => 'administrator'
		],
		[
			'directory' => '/',
			'src' => 'access.jext',
			'dest' => 'access.xml',
			'package' => 'component',
			'client' => 'administrator'
		],
		[
			'directory' => '/forms',
			'src' => 'note.jext',
			'dest' => 'note.xml',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/forms',
			'src' => 'filter_notes.jext',
			'dest' => 'filter_notes.xml',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/helpers',
			'src' => 'component.jext',
			'dest' => '{{component_capitalize}}Helper.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/services',
			'src' => 'provider.jext',
			'dest' => 'provider.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/sql',
			'src' => 'install.mysql.utf8.jext',
			'dest' => 'install.mysql.utf8.sql',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/tmpl/note',
			'src' => 'edit.jext',
			'dest' => 'edit.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/tmpl/notes',
			'src' => 'default.jext',
			'dest' => 'default.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/tmpl/icomoon',
			'src' => 'default.jext',
			'dest' => 'default.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Controller',
			'src' => 'DisplayController.jext',
			'dest' => 'DisplayController.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Controller',
			'src' => 'IcomoonController.jext',
			'dest' => 'IcomoonController.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Controller',
			'src' => 'NoteController.jext',
			'dest' => 'NoteController.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Controller',
			'src' => 'NotesController.jext',
			'dest' => 'NotesController.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Extension',
			'src' => 'ExtensionComponent.jext',
			'dest' => '{{component_capitalize}}Component.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Field',
			'src' => '',
			'dest' => '',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Helper',
			'src' => 'ExtensionHelper.jext',
			'dest' => '{{component_capitalize}}Helper.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Helper',
			'src' => 'Icomoon.jext',
			'dest' => 'Icomoon.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Model',
			'src' => 'NoteModel.jext',
			'dest' => 'NoteModel.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Model',
			'src' => 'NotesModel.jext',
			'dest' => 'NotesModel.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Service/HTML',
			'src' => 'Icon.jext',
			'dest' => 'Icon.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/Table',
			'src' => 'NoteTable.jext',
			'dest' => 'NoteTable.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/View/Icomoon',
			'src' => 'HtmlView.jext',
			'dest' => 'HtmlView.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/View/Note',
			'src' => 'HtmlView.jext',
			'dest' => 'HtmlView.php',
			'package' => 'component',
			'client' => 'administrator'
		],
		[ 	'directory' => '/src/View/notes',
			'src' => 'HtmlView.jext',
			'dest' => 'HtmlView.php',
			'package' => 'component',
			'client' => 'administrator'
		],

		/** Data for the component's site client. */
		[ 	'directory' => '/helpers',
			'src' => '',
			'dest' => '',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/layouts',
			'src' => '',
			'dest' => '',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/src/Controller',
			'src' => 'DisplayController.jext',
			'dest' => 'DisplayController.php',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/src/Controller',
			'src' => 'NotesController.jext',
			'dest' => 'NotesController.php',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/src/Dispatcher',
			'src' => 'Dispatcher.jext',
			'dest' => 'Dispatcher.php',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/src/Helper',
			'src' => 'RouteHelper.jext',
			'dest' => 'RouteHelper.php',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/src/Model',
			'src' => 'NoteModel.jext',
			'dest' => 'NoteModel.php',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/src/Model',
			'src' => 'NotesModel.jext',
			'dest' => 'NotesModel.php',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/src/Service',
			'src' => 'Router.jext',
			'dest' => 'Router.php',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/src/View/Note',
			'src' => 'HtmlView.jext',
			'dest' => 'HtmlView.php',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/src/View/Notes',
			'src' => 'HtmlView.jext',
			'dest' => 'HtmlView.php',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/tmpl/note',
			'src' => 'default.jext',
			'dest' => 'default.php',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/tmpl/notes',
			'src' => 'default.jext',
			'dest' => 'default.php',
			'package' => 'component',
			'client' => 'site'
		],
		[ 	'directory' => '/tmpl/notes',
			'src' => 'menu.jext',
			'dest' => 'default.xml',
			'package' => 'component',
			'client' => 'site'
		],

		/** Data for the language files. */
		/** his language directory is relative to Assets/language directory */
		[ 	'directory' => '/',
			'src' => 'extension.jext',
			'dest' => '{{prefix_component}}.ini',
			'package' => 'language',
			'client' => 'administrator'
		],
		[ 	'directory' => '/',
			'src' => 'extension.sys.jext',
			'dest' => '{{prefix_component}}.sys.ini',
			'package' => 'language',
			'client' => 'administrator'
		],
		[ 	'directory' => '/',
			'src' => 'extension.jext',
			'dest' => '{{prefix_component}}.ini',
			'package' => 'language',
			'client' => 'site'
		],

		/** Data for media files. */
		[ 	'directory' => '/',
			'src' => 'joomla.asset.jext',
			'dest' => 'joomla.asset.json',
			'package' => 'media',
			'client' => ''
		],
		[ 	'directory' => '/js',
			'src' => 'icons.jext',
			'dest' => 'icons.js',
			'package' => 'media',
			'client' => ''
		],
		[ 	'directory' => '/css',
			'src' => 'icons.jext',
			'dest' => 'icons.css',
			'package' => 'media',
			'client' => ''
		],
		[ 	'directory' => '/css',
			'src' => 'notes.jext',
			'dest' => 'notes.css',
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