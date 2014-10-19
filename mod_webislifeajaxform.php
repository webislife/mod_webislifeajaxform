<?php 
/*
# ------------------------------------------------------------------------
# Ajax contact form for Joomla 2.5.x 
# ------------------------------------------------------------------------
# Copyright (C) webislife.ru
# @license - FREE
# Author: webislife.ru
# Websites:  http://webislife.ru
# ------------------------------------------------------------------------ 
*/

// no direct access
defined('_JEXEC') or die;

$document 					= JFactory::getDocument();
$ad_form_mails				= $params->get('ad_ajax_form_mail', '');
$ad_form_title				= $params->get('ad_ajax_form_title', '');
$ad_form_text				= $params->get('ad_ajax_form_text', '');


require JModuleHelper::getLayoutPath('mod_webislifeajaxform', $params->get('layout', 'default'));
?>
