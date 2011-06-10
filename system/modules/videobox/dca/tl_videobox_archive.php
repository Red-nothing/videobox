<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005-2009 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Yanick Witschi 2010 
 * @author     Yanick Witschi <yanick.witschi@certo-net.ch> 
 * @package    videobox 
 * @license    LGPL 
 * @filesource
 */


/**
 * Table tl_videobox_archive
 */
$GLOBALS['TL_DCA']['tl_videobox_archive'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_videobox','tl_videobox_settings'),
		'switchToEdit'                => true,
		'enableVersioning'            => true
	),
	
	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_videobox_archive']['edit'],
				'href'                => 'table=tl_videobox',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_videobox_archive']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_videobox_archive']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_videobox_archive']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			),
			'editvideosettings' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_videobox_archive']['editvideosettings'],
				'href'                => 'key=videobox_settings',
				'icon'                => 'system/modules/videobox/html/editvideosettings.png'
			),
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => '{title_legend},title,activeVideoTypes,allowedUserGroups;'
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_videobox_archive']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true)
		),
		'activeVideoTypes' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_videobox_archive']['activeVideoTypes'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'options_callback'        => array('tl_videobox_archive', 'getVideoTypes'),
			'eval'                    => array('multiple'=>true)
		),
		'allowedUserGroups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_videobox_archive']['allowedUserGroups'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_user_group.name',
			'eval'                    => array('multiple'=>true)
		)
	)
);

class tl_videobox_archive extends Backend
{
	/**
	 * Method to list all video types
	 * @return array
	 */
	public function getVideoTypes()
	{
		$arrTypes = array();

		foreach(array_keys($GLOBALS['VIDEOBOX']['VideoType']) as $type)
		{
			$arrTypes[$type] = $GLOBALS['TL_LANG']['VideoTypes'][$type];
		}

		return $arrTypes;
	}
}

?>