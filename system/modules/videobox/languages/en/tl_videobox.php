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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_videobox']['videotitle'] = array('Video title', 'Please give your video a title.');
$GLOBALS['TL_LANG']['tl_videobox']['videotype'] = array('Videotype', 'Please choose the type of video you want to specify.');
$GLOBALS['TL_LANG']['tl_videobox']['youtube_id'] = array('Youtube-ID', 'Enter the ID of your Youtube video. The ID is the <strong>bold</strong> part: http://www.youtube.com/watch?v=<strong>SGeZYednWtI</strong>');


/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_videobox']['title_legend'] = 'Default settings';
$GLOBALS['TL_LANG']['tl_videobox']['youtube_legend'] = 'Youtube video';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_videobox']['new']    = array('New video', 'Create a new video');
$GLOBALS['TL_LANG']['tl_videobox']['edit']   = array('Edit video', 'Edit the video with id %s');
$GLOBALS['TL_LANG']['tl_videobox']['copy']   = array('Copy video', 'Copy the video with id %s');
$GLOBALS['TL_LANG']['tl_videobox']['cut']   = array('Move video', 'Move the video with id %s');
$GLOBALS['TL_LANG']['tl_videobox']['delete'] = array('Delete video', 'Delete the video with id %s');
$GLOBALS['TL_LANG']['tl_videobox']['show']   = array('Show details', 'Show the details of the video with id %s');

?>