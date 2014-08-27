<?php
class modWebislifeajaxformHelper
{
	public static function getAjax()
	{
		jimport('joomla.application.module.helper');
		$input = JFactory::getApplication()->input;

		$name = $input->getString('name', '');
		$contact = $input->getString('contact', '');
		$message = $input->getString('message', '');
		$to = $input->getString('to', '');

		$to = explode(';', $to);

		$mailer = JFactory::getMailer();
        $config = JFactory::getConfig();
        $sender = array(
                $config->get( 'mailfrom' ),
                $config->get( 'fromname' ) );
        $mail = '<p>Сообщение от: <b>'.$name.'</b> <br> Контакт: <b>'.$contact.'</b> <br> Сообщение: <br> '.$message.'</p>';     
        $mailer->setSender($sender);
        $mailer->addRecipient($to);
        $mailer->setSubject('Сообщение с сайта');
        $mailer->isHTML(true);
        $mailer->Encoding = 'base64';
        $mailer->setBody($mail);
        $send = $mailer->Send();

        if($send) {
        	return json_encode(array('ok'));
        } else {
        	return json_encode(array('error'));
        }
	}
}