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
 * Class VideoBoxElement 
 *
 * @copyright  certo web & design GmbH 2010 - 2011 
 * @author     Yanick Witschi <yanick.witschi@certo-net.ch> 
 * @package    Controller
 */
class VideoBoxElement extends System
{
    /**
     * Current Video ID
     * @var integer 
     */
	public $id = null;
	 
	 /**
     * Data table
     * @var string 
     */
	public $strTable = '';
	
	 /**
     * Video type
     * @var string 
     */
	public $strVideoType = '';
	 
    /**
     * Data array
     * @var array 
     */
    public $arrData = array();
	
    /**
     * Video object
     * @var object 
     */
    public $objVideo;
	
    /**
     * Initialize the object
     * @param integer 
     * @param string 
     * @param string 
     */
    public function __construct($id, $strTable='tl_videobox', $strVideoType='')
    {
		if(!is_int($id) || $id == 0)
		{
			$this->objVideo = '<span style="color:red;">Given Video-ID is either not an integer or 0!</span>';
			return $this->objVideo;
		}
		
		// set vars
		$this->id = (int) $id;
		$this->strTable = $strTable;
		$this->strVideoType = $strVideoType;
		
		$this->import('Database');
		
		// SQL - provide data for other tables too
		if($this->strTable == 'tl_videobox')
		{
			$strSQL =	'SELECT
							v.*,a.*,s.*,v.id as videoid
						FROM
						(
							tl_videobox v 
						LEFT JOIN
							tl_videobox_archive a
						ON
							v.pid = a.id
						)
						LEFT JOIN
							tl_videobox_settings s
						ON
							a.id = s.pid
						WHERE
							v.id=?';
		}
		else
		{
			$strSQL = 'SELECT * FROM ' . $this->strTable . ' WHERE id=?';
		}		
		
		// set data
		$this->arrData = $this->Database->prepare($strSQL)
							            ->limit(1)
						                ->execute($this->id)
						                ->fetchAssoc();
		
		// set videotype
		if(strlen($this->strVideoType) == 0)
		{
			$this->strVideoType = $this->arrData['videotype'];
		}

		// HOOK: processVideoData
		if(isset($GLOBALS['VIDEOBOX']['VideoType']) && is_array($GLOBALS['VIDEOBOX']['VideoType']) && array_key_exists($this->strVideoType, $GLOBALS['VIDEOBOX']['VideoType']))
        {
				$this->import($GLOBALS['VIDEOBOX']['VideoType'][$this->strVideoType][0]);
				$this->objVideo = $this->$GLOBALS['VIDEOBOX']['VideoType'][$this->strVideoType][0]->$GLOBALS['VIDEOBOX']['VideoType'][$this->strVideoType][1]($this->arrData);
				return $this->objVideo;
		}
		
		$this->objVideo = '<span style="color:red;">Missing VideoBox Hook. Video data cannot be processed!</span>';
		return $this->objVideo;
    }
	
	/**
     * Return the video object as a string
     * @return string 
     */
 	public function __toString()
	{
		return $this->objVideo;
	}
}