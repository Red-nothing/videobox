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
 * Legends
 */
$GLOBALS['TL_LANG']['tl_videobox_settings']['youtube_legend'] = 'Youtube video';


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_videobox_settings']['youtube_template'] = array('Template','Choose the template for Youtube videos.');
$GLOBALS['TL_LANG']['tl_videobox_settings']['youtube_size'] = array('Size','Choose the size for the video (width x height).');
$GLOBALS['TL_LANG']['tl_videobox_settings']['youtube_rel'] = array('Show related videos','Sets whether the player should load related videos once playback of the initial video starts.');
$GLOBALS['TL_LANG']['tl_videobox_settings']['youtube_autoplay'] = array('Autoplay','Sets whether or not the initial video will autoplay when the player loads.');
$GLOBALS['TL_LANG']['tl_videobox_settings']['youtube_loop'] = array('Loop the video','This will cause the player to play the video again and again.');
$GLOBALS['TL_LANG']['tl_videobox_settings']['youtube_start'] = array('Where should the video start playing?','This parameter causes the player to begin playing the video at the given number of seconds from the start of the video. Note that the player will look for the closest keyframe to the time you specify. This means sometimes the play head may seek to just before the requested time, usually no more than ~2 seconds.');
$GLOBALS['TL_LANG']['tl_videobox_settings']['youtube_fs'] = array('Allow fullscreen','This enables the fullscreen button.');
$GLOBALS['TL_LANG']['tl_videobox_settings']['youtube_showinfo'] = array('Show video information','Display information like the video title and rating before the video starts playing.');
$GLOBALS['TL_LANG']['tl_videobox_settings']['youtube_theme'] = array('Theme', 'Choose the theme for the player.');