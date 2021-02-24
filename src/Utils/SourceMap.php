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
	 * The source mapping types
	 *
	 * @var		int		The types const.
	 *
	 * @since	1.0.0
	 */
	const COMPONENT_MAP = 1;
	const VIEW_MAP = 2;
	const INJECTION_MAP = 3;

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
		[ 	'directory' => '/src/View/Notes',
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
	 * View source map array.
	 *
	 * @var		array	$viewSourceMap	The source map for the view files.
	 *
	 * @since	1.0.0
	 */
	private static $viewSourceMap = [
		[
			'directory' => '/tmpl/{{plural}}',
			'src' => 'default.jext',
			'dest' => 'default.php',
			'client' => 'administrator',
			'package' => 'view'
		],
		[
			'directory' => '/tmpl/{{singular}}',
			'src' => 'edit.jext',
			'dest' => 'edit.php',
			'client' => 'administrator',
			'package' => 'view'
		],
		[
			'directory' => '/src/View/{{plural_capitalize}}',
			'src' => 'plural.jext',
			'dest' => 'HtmlView.php',
			'client' => 'administrator',
			'package' => 'view'
		],
		[
			'directory' => '/src/View/{{singular_capitalize}}',
			'src' => 'singular.jext',
			'dest' => 'HtmlView.php',
			'client' => 'administrator',
			'package' => 'view'
		],
		[
			'directory' => '/src/Controller',
			'src' => 'singularController.jext',
			'dest' => '{{singular_capitalize}}Controller.php',
			'client' => 'administrator',
			'package' => 'view'
		],
		[
			'directory' => '/src/Controller',
			'src' => 'pluralController.jext',
			'dest' => '{{plural_capitalize}}Controller.php',
			'client' => 'administrator',
			'package' => 'view'
		],
		[
			'directory' => '/src/Model',
			'src' => 'pluralModel.jext',
			'dest' => '{{plural_capitalize}}Model.php',
			'client' => 'administrator',
			'package' => 'view'
		],
		[
			'directory' => '/src/Model',
			'src' => 'singularModel.jext',
			'dest' => '{{singular_capitalize}}Model.php',
			'client' => 'administrator',
			'package' => 'view'
		],
		[
			'directory' => '/src/Table',
			'src' => 'table.jext',
			'dest' => '{{singular_capitalize}}Table.php',
			'client' => 'administrator',
			'package' => 'view'
		],
		[
			'directory' => '/forms',
			'src' => 'form.jext',
			'dest' => '{{singular}}.xml',
			'client' => 'administrator',
			'package' => 'view'
		],
		[
			'directory' => '/forms',
			'src' => 'filter.jext',
			'dest' => 'filter_{{plural}}.xml',
			'client' => 'administrator',
			'package' => 'view'
		],

		/** Site views. */
		[
			'directory' => '/tmpl/{{plural}}',
			'src' => 'default.jext',
			'dest' => 'default.php',
			'client' => 'site',
			'package' => 'view'
		],
		[
			'directory' => '/tmpl/{{plural}}',
			'src' => 'menu.jext',
			'dest' => 'default.xml',
			'client' => 'site',
			'package' => 'view'
		],
		[
			'directory' => '/tmpl/{{singular}}',
			'src' => 'defaultSingular.jext',
			'dest' => 'default.php',
			'client' => 'site',
			'package' => 'view'
		],
		[
			'directory' => '/src/View/{{plural_capitalize}}',
			'src' => 'plural.jext',
			'dest' => 'HtmlView.php',
			'client' => 'site',
			'package' => 'view'
		],
		[
			'directory' => '/src/View/{{singular_capitalize}}',
			'src' => 'singular.jext',
			'dest' => 'HtmlView.php',
			'client' => 'site',
			'package' => 'view'
		],
		[
			'directory' => '/src/Controller',
			'src' => 'pluralController.jext',
			'dest' => '{{plural_capitalize}}Controller.php',
			'client' => 'site',
			'package' => 'view'
		],
		[
			'directory' => '/src/Model',
			'src' => 'pluralModel.jext',
			'dest' => '{{plural_capitalize}}Model.php',
			'client' => 'site',
			'package' => 'view'
		],
		[
			'directory' => '/src/Model',
			'src' => 'singularModel.jext',
			'dest' => '{{singular_capitalize}}Model.php',
			'client' => 'site',
			'package' => 'view'
		],
	];

	/**
	 * Injection source map.
	 *
	 * @var		array	The source map for the injections.
	 *
	 * @since	1.0.0
	 */
	private static $injectionSourceMap = [
		[
			'directory' => '/administrator/language/en-GB',
			'src' => 'language.jext',
			'dest' => '{{prefix_component}}.ini',
			'client' => 'administrator',
			'package' => 'injection',
			'type' => 'administrator_language'
		],
		[
			'directory' => '/administrator/language/en-GB',
			'src' => 'language.sys.jext',
			'dest' => '{{prefix_component}}.sys.ini',
			'client' => 'administrator',
			'package' => 'injection',
			'type' => 'administrator_system_language'
		],
		[
			'directory' => '/administrator/components/{{prefix_component}}',
			'src' => 'submenu.jext',
			'dest' => '{{component}}.xml',
			'client' => 'administrator',
			'package' => 'injection',
			'type' => 'administrator_sub_menu'
		],
		[
			'directory' => '/administrator/components/{{prefix_component}}/sql',
			'src' => 'install.sql.jext',
			'dest' => 'install.mysql.utf8.sql',
			'client' => 'administrator',
			'package' => 'injection',
			'type' => 'install_table'
		],
		[
			'directory' => '/administrator/language/en-GB',
			'src' => 'menuitem.language.jext',
			'dest' => '{{prefix_component}}.sys.ini',
			'client' => 'site',
			'package' => 'injection',
			'type' => 'site_menuitem_language'
		],
		[
			'directory' => '/components/{{prefix_component}}/src/Service',
			'src' => 'router.jext',
			'dest' => 'Router.php',
			'client' => 'site',
			'package' => 'injection',
			'type' => 'register_router_view'
		],
		[
			'directory' => '/components/{{prefix_component}}/src/Service',
			'src' => 'router.methods.jext',
			'dest' => 'Router.php',
			'client' => 'site',
			'package' => 'injection',
			'type' => 'router_methods'
		],
	];

	/**
	 * Get the source map.
	 *
	 * @return	array	The source mapping array.
	 *
	 * @since	1.0.0
	 */
	public static function getSourceMap(int $type = self::COMPONENT_MAP) : array
	{
		switch ($type)
		{
			case self::VIEW_MAP:
				return self::$viewSourceMap;
			case self::INJECTION_MAP:
				return self::$injectionSourceMap;
			case self::COMPONENT_MAP:
			default:
				return self::$sourceMap;		
		}
	}
}