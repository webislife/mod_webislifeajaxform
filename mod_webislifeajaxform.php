<?php 
/*
# ------------------------------------------------------------------------
# wlensions for Joomla 2.5.x - Joomla 3.x
# ------------------------------------------------------------------------
# Copyright (C) 2011-2014 wl-Joom.com. All Rights Reserved.
# @license - PHP files are GNU/GPL V2.
# Author: wl-Joom.com
# Websites:  http://www.wl-joom.com 
# Date modified: 08/04/2014 - 13:00
# ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die;
error_reporting(-1);

$document 					= JFactory::getDocument();
$ad_form_mails				= $params->get('ad_ajax_form_mail', '');
$ad_form_title				= $params->get('ad_ajax_form_title', '');
$ad_form_text				= $params->get('ad_ajax_form_text', '');


require JModuleHelper::getLayoutPath('mod_webislifeajaxform', $params->get('layout', 'default'));
?>