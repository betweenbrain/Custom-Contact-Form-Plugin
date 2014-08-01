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

	protected function getOptions()
	{
		// Create an array for our options
		$options = array();

		// Add our options to the array
		$options[] = array("value" => 1, "text" => "1");
		$options[] = array("value" => 2, "text" => "2");

		return $options;
	}
}
