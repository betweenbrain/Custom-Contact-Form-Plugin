<?php defined('_JEXEC') or die;

/**
 * File       recepients.php
 * Created    8/1/14 11:38 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

jimport('joomla.form.formfield');

class JFormFieldRecepients extends JFormField
{

	protected $type = 'Recepients';

	public function getInput()
	{

		$data = array(
			array(
				'value' => 'redapple',
				'text'  => 'Red apple',
				'attr'  => array('data-price' => '5'),
			),
			array(
				'value' => 'greenapple',
				'text'  => 'Green apple',
				'attr'  => array('data-price' => '3'),
			),
		);

		$options = array(
			'id'             => 'applesfield', // HTML id for select field
			'list.attr'      => array( // additional HTML attributes for select field
				'class' => 'field-apples',
			),
			'list.translate' => false, // true to translate
			'option.key'     => 'value', // key name for value in data array
			'option.text'    => 'text', // key name for text in data array
			'option.attr'    => 'attr', // key name for attr in data array
			'list.select'    => 'greenapple', // value of the SELECTED field
		);

		return JHtmlSelect::genericlist($data, 'apples', $options);
	}
}