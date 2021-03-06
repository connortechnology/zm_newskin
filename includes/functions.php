<?php
//
// ZoneMinder web function library, $Date: 2008-07-08 16:06:45 +0100 (Tue, 08 Jul 2008) $, $Revision: 2484 $
// Copyright (C) 2001-2008 Philip Coombes
// 
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// 
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
// 

function xhtmlHeaders( $file, $title )
{
    $skinCssFile = getSkinFile( 'css/skin.css' );
    $skinCssPhpFile = getSkinFile( 'css/skin.css.php' );
    $skinJsFile = getSkinFile( 'js/skin.js' );
    $skinJsPhpFile = getSkinFile( 'js/skin.js.php' );

    $basename = basename( $file, '.php' );
    $viewCssFile = getSkinFile( 'views/css/'.$basename.'.css' );
    $viewCssPhpFile = getSkinFile( 'views/css/'.$basename.'.css.php' );
    $viewJsFile = getSkinFile( 'views/js/'.$basename.'.js' );
    $viewJsPhpFile = getSkinFile( 'views/js/'.$basename.'.js.php' );

    extract( $GLOBALS, EXTR_OVERWRITE );

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title><?= ZM_WEB_TITLE_PREFIX ?> - <?= validHtmlStr($title) ?></title>
 <link rel="icon" type="image/ico" href="graphics/favicon.ico"/>
 <link rel="shortcut icon" href="graphics/favicon.ico"/>
 <link rel="stylesheet" href="css/reset.css" type="text/css"/>
 <link rel="stylesheet" href="<?= $skinCssFile ?>" type="text/css" media="screen"/>
 <link rel="stylesheet" href="skins/new/css/header.css" type="text/css" media="screen"/>
 <script type="text/javascript" src="skins/new/js/jquery-1.4.2.min.js"></script>
 <script type="text/javascript" src="skins/new/js/jquery-ui-1.8.4.custom.min.js"></script>
 <link type="text/css" media="screen" rel="stylesheet" href="skins/new/css/colorbox.css"></link>
 <link type="text/css" media="screen" rel="stylesheet" href="skins/new/css/jquery/jquery-ui-1.8.custom.css"></link>
<?php if ($title == "Console") { ?>
 <script type="text/javascript" src="skins/new/js/jquery.colorbox.js"></script>
 <script type="text/javascript" src="skins/new/js/console.js"></script>
<?php } ?>
<?php
 if ($title == "Monitor") {
?>
  <script type="text/javascript" src="tools/mootools/mootools-core.js"></script>
  <script type="text/javascript" src="tools/mootools/mootools-more.js"></script>
  <script type="text/javascript" src="js/mootools.ext.js"></script>
<?php
 }
?>
<?php
 if (preg_match("/Feed/", $title)) {
?>
  <script type="text/javascript" src="skins/new/views/js/watch.js"></script>
  <link media="screen" type="text/css" href="skins/classic/views/css/watch.css" rel="stylesheet">
  <script src="tools/mootools/mootools-1.2.1-core-nc.js" type="text/javascript"></script>
  <script src="tools/mootools/mootools-1.2-more-nc.js" type="text/javascript"></script>
<?php
 }
?>
<?php
 if ($title == "Admin") {
?>
  <script type="text/javascript" src="skins/new/js/admin.js"></script>
  <script type="text/javascript" src="skins/new/js/jquery.colorbox.js"></script>
<?php
 }
?>
<?php
 if ($title == "Events") {
?>
<script type="text/javascript" src="skins/new/js/jquery.colorbox.js"></script>
<script type="text/javascript" src="skins/new/js/events.js"></script>
<script type="text/javascript" src="skins/new/js/events_search.js"></script>
<?php
 }
?>
<?php
 if ($title == "Full") {
?>
<script type="text/javascript" src="skins/new/js/full.js"></script>
<?php
 }
?>
<?php
    if ( $viewCssFile )
    {
?>
  <link rel="stylesheet" href="<?= $viewCssFile ?>" type="text/css" media="screen"/>
<?php
    }
    if ( $viewCssPhpFile )
    {
?>
  <style type="text/css">
<?php
        require_once( $viewCssPhpFile );
?>
  </style>
<?php
    }
?>
<?php
    if ( $skinJsPhpFile )
    {
?>
  <script type="text/javascript">
<?php
    require_once( $skinJsPhpFile );
?>
  </script>
<?php
    }
    if ( $viewJsPhpFile )
    {
?>
  <script type="text/javascript">
<?php
        require_once( $viewJsPhpFile );
?>
  </script>
<?php
    }
?>
  <script type="text/javascript" src="<?= $skinJsFile ?>"></script>
<?php
    if ( $viewJsFile )
    {
?>
  <script type="text/javascript" src="<?= $viewJsFile ?>"></script>
<?php
    }
?>
</head>
<?php
}
?>
