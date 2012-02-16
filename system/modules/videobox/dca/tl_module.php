<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

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
 * @copyright  certo web & design GmbH 2010 - 2011 
 * @author     Yanick Witschi <yanick.witschi@certo-net.ch> 
 * @package    videobox 
 * @license    LGPL 
 * @filesource
 */

/**
 * Table tl_module 
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['videobox_list']			= '{title_legend},name,headline,type;{config_legend},videobox_archives,videobox_jumpTo,videobox_sql,perPage;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['videobox_reader']		    = '{title_legend},name,headline,type;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['videobox_archives'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['videobox_archives'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'foreignKey'              => 'tl_videobox_archive.title',
	'eval'                    => array('mandatory'=>true, 'multiple'=>true)
);
$GLOBALS['TL_DCA']['tl_module']['fields']['videobox_jumpTo'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['videobox_jumpTo'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'eval'                    => array('mandatory'=>true, 'fieldType'=>'radio')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['videobox_sql'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['videobox_sql'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50')
);