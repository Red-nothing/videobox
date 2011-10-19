-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************


-- --------------------------------------------------------

-- 
-- Table `tl_videobox_archive`
-- 

CREATE TABLE `tl_videobox_archive` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(64) NOT NULL default '',
  `activeVideoTypes` blob NULL,
  `allowedUserGroups` blob NULL,
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_videobox_settings`
-- 

CREATE TABLE `tl_videobox_settings` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `youtube_template` varchar(64) NOT NULL default '',
  `youtube_size` varchar(64) NOT NULL default '',
  `youtube_rel` char(1) NOT NULL default '',
  `youtube_autoplay` char(1) NOT NULL default '',
  `youtube_loop` char(1) NOT NULL default '',
  `youtube_border` char(1) NOT NULL default '',
  `youtube_color1` varchar(6) NOT NULL default '',
  `youtube_color2` varchar(6) NOT NULL default '',
  `youtube_start` int(10) unsigned NOT NULL default '0',
  `youtube_fs` char(1) NOT NULL default '',
  `youtube_hd` char(1) NOT NULL default '',
  `youtube_showinfo` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_user`
-- 

CREATE TABLE `tl_user` (
 `videobox_archives` blob NULL,
 `videobox_operations` blob NULL
) ENGINE=MyISAM  CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_user_group`
-- 

CREATE TABLE `tl_user_group` (
 `videobox_archives` blob NULL,
 `videobox_operations` blob NULL
) ENGINE=MyISAM  CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_videobox`
-- 

CREATE TABLE `tl_videobox` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `videotitle` varchar(64) NOT NULL default '',
  `videotype` varchar(64) NOT NULL default '',
  `youtube_id` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_content`
-- 

CREATE TABLE `tl_content` (
  `tstamp` int(10) unsigned NOT NULL default '0',
  `videobox_video` int(10) unsigned NOT NULL default '0',
  `videobox_description` text NULL,
  `videobox_floating` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_news`
-- 

CREATE TABLE `tl_news` (
  `tstamp` int(10) unsigned NOT NULL default '0',
  `videobox_addvideo` char(1) NOT NULL default '',
  `videobox_video` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_calendar_events`
-- 

CREATE TABLE `tl_calendar_events` (
  `tstamp` int(10) unsigned NOT NULL default '0',
  `videobox_addvideo` char(1) NOT NULL default '',
  `videobox_video` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  CHARSET=utf8;
