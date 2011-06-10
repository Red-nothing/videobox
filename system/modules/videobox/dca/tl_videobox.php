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
 * Table tl_videobox 
 */
$GLOBALS['TL_DCA']['tl_videobox'] = array
(
	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_videobox_archive',
		'enableVersioning'            => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('videotitle'),
			'headerFields'            => array('title', 'activeVideoTypes', 'allowedUserGroups'),
			'panelLayout'             => 'filter;search,limit',
			'child_record_callback'   => array('tl_videobox', 'compileVideos')
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
				'label'               => &$GLOBALS['TL_LANG']['tl_videobox']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_videobox']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_videobox']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_videobox']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_videobox']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	
 	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('videotype'),
		'default'                     => '{title_legend},videotitle,videotype;',
		'youtube'					  => '{title_legend},videotitle,videotype;{youtube_legend},youtube_id;'
	),
	
	// Fields
	'fields' => array
	(
		'videotitle' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_videobox']['videotitle'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true)
		),
		'videotype' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_videobox']['videotype'],
			'exclude'                 => true,
			'default'				  => 'youtube',
			'inputType'               => 'select',
			'default'				  => '-',				
			'options_callback'		  => array('tl_videobox', 'getVideoTypes'),
			'eval'                    => array('mandatory'=>true, 'submitOnChange'=>true,'includeBlankOption'=>true)
		),
		'youtube_id' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_videobox']['youtube_id'],
			'exclude'                 => true,
			'inputType'               => 'text'
		)
	)
);

class tl_videobox extends Backend
{

	/**
	 * Method to list all video types that have been allowed for this archive
	 * @return array
	 */
	public function getVideoTypes()
	{
		$objPID = $this->Database->prepare("SELECT pid FROM tl_videobox WHERE id=?")
								 ->execute($this->Input->get('id'));
								 
		$objArchive = $this->Database->prepare("SELECT activeVideoTypes as aVT FROM tl_videobox_archive WHERE id=?")
									 ->execute($objPID->pid);
									 
		// if there are no video types allowed return
		if(strlen($objArchive->aVT) == 0)
		{
			return;
		}
		
		$arrAllowedVidTypes = deserialize($objArchive->aVT);		
		$arrTypes = array();
		
		foreach(array_keys($GLOBALS['VIDEOBOX']['VideoType']) as $type)
		{
			if(in_array($type, $arrAllowedVidTypes))
			{
				$arrTypes[$type] = $GLOBALS['TL_LANG']['VideoTypes'][$type];
			}
		}
		
		return $arrTypes;
	}
	
	/**
	 * Compile Videos for the backend view
	 * @param array
	 * @return string
	 */
	public function compileVideos($arrRow)
	{
		return '
		<div class="cte_type"><strong>' . $arrRow['videotitle'] . '</strong></div>
		<div class="limit_height' . (!$GLOBALS['TL_CONFIG']['doNotCollapse'] ? ' h64' : '') . ' block">
		' . new VideoBoxElement((int) $arrRow['id']) . '
		</div>' . "\n";
	}
} 

?>