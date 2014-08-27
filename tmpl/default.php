<?php
/*
# ------------------------------------------------------------------------
# Модуль ajax формы связи для  Joomla 2.5.x - Joomla 3.x
# ------------------------------------------------------------------------
# Copyright (C) 2014 webislife.ru.
# @license - :)
# Author: webislife.ru
# Websites:  http://webislife.ru
# Date modified: 14/07/2014 - 
# ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die;

// $app = JFactory::getApplication();
// $inp = $app->input;
// $task =$inp->getString('tmpl', false);

?>
<style>
	#ad-ajax-form-container input, #ad-ajax-form-container textarea {
		width: auto !important;
		max-width: 100%;
	}
</style>
<div id="ad-ajax-form-container" class="<?php echo $moduleclass_sfx ?>">
	
<form id="ad-ajax-form" action="index.php" class="form">
	<fieldset>
		
	<div class="control-group">
		<label for="ad-ajax-form-name" class="control-label">Представьтесь</label>
		<div class="controls">
			<input type="text" name="ad-ajax-form-name" id="ad-ajax-form-name"></div>
	</div>
	<div class="control-group">
		<label for="ad-ajax-form-contact" class="control-label">Контакт для связи</label>
		<div class="controls">
			<input type="text" name="ad-ajax-form-contact" id="ad-ajax-form-contact"></div>
	</div>
	<div class="control-group">
		<label for="ad-ajax-form-message" class="control-label">Ваше сообщениe</label>
		<div class="controls">
			<textarea name="ad-ajax-form-message" id="ad-ajax-form-message"> </textarea>
		</div>
	</div>
	<div id="ad-ajax-form-info"></div>
	<div class="controls-group">
		<label for="" class="control-label"></label>
		<div class="controls">
			<input type="hidden" id="ad-ajax-form-tosend" name="ad-ajax-form-tosend" value="<? echo $ad_form_mails; ?>">
			<a class="btn btn-success" id="ad-ajax-form-send" ><i class="icon-mail icon-white"></i> Отправить </a>
		</div>
	</div>
	</fieldset>
</form>

</div>
<script>
	jQuery(document).ready(function($) {
		$( "#ad-ajax-form-send" ).click( function(event, ui) {
                var postdata = {
                    	name: $('#ad-ajax-form-name').val(),
                    	contact: $('#ad-ajax-form-contact').val(),
                    	message: $('#ad-ajax-form-message').val(),
                    	to: $('#ad-ajax-form-tosend').val(),
                    	option: 'com_ajax',
                    	module: 'webislifeajaxform',
                    	format: 'json'
                    };
                var alert = $('#ad-ajax-form-info');
                if(postdata.name == '' || postdata.contact == '' || postdata.message == '') {
                	alert.html('<p class="alert alert-error">Все поля обязательны для заполнения <button type="button" class="close" data-dismiss="alert">×</button></p>');
                	return false;
                }
                $.ajax({
                    type: 'POST',
                    url: "/index.php",
                    dataType: 'json',
                    data: postdata,
                    success:function(data){
                    	console.info(data);
                       	if(data.success == true){
                       		$('#ad-ajax-form label, #ad-ajax-form input, #ad-ajax-form a, #ad-ajax-form textarea').hide(200);
                			alert.html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><h4><? echo $ad_form_title; ?></h4><? echo $ad_form_text; ?> </div>');
                       	}
                    },
                    error:function(data){
                    	console.error(data);
                        // $('#errors').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
                    }
                });  
        });
	});
</script>