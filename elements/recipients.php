<?php defined('_JEXEC') or die;

/**
 * File       recipients.php
 * Created    8/1/14 11:38 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

JFormHelper::loadFieldClass('list');

class JFormFieldRecipients extends JFormFieldList
{

	protected $type = 'Recipients';

	public function getOptions()
	{

		$plugin = JPluginHelper::getPlugin('content', 'customcontactform');
		$params = new JRegistry($plugin->params);

		foreach ($params->get('contacts') as $contact) :
			$parts     = explode(':', $contact);
			$name      = ucwords(str_replace('-', ' ', $parts[1]));
			$options[] = JHTML::_('select.option', $contact, $name);
		endforeach;

		return $options;
	}
}
