<?php defined('_JEXEC') or die;

/**
 * File       contactform.php
 * Created    7/31/14 4:42 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

/**
 * An example custom contact plugin.
 *
 * @package    Joomla.Plugin
 * @subpackage Contact
 * @version    1.6
 */
class plgContentCustomcontactform extends JPlugin
{

	protected $autoloadLanguage = true;

	function __construct(&$subject, $params)
	{
		parent::__construct($subject, $params);
		$this->app = JFactory::getApplication();
		$this->db  = JFactory::getDbo();
		$this->doc = JFactory::getDocument();
	}

	/**
	 * @param JForm $form The form to be altered.
	 * @param array $data The associated data for the form.
	 *
	 * @return boolean
	 * @since 1.6
	 */
	function onContentPrepareForm($form, $data)
	{
		// Exit if an admin form
		if ($this->app->isAdmin())
		{
			return;
		}

		$this->addScripts();

		if (!($form instanceof JForm))
		{
			$this->_subject->setError('JERROR_NOT_A_FORM');

			return false;
		}

		// Check we are manipulating a valid form.
		if (!in_array($form->getName(), array('com_contact.contact')))
		{
			return true;
		}

		// Add the fields to the form.
		JForm::addFormPath(dirname(__FILE__) . '/forms');

		$form->loadFile('customform', false);

		return true;
	}

	/**
	 * Adds scripts to the page
	 *
	 * @return null
	 */
	private function addScripts()
	{

		$js = "<script type=\"text/javascript\">
	(function ($) {
		$(document).ready(function() {
			$('#recipients-input').change( function () {
				var recipient = $('#recipients-input option:selected').val();
				$('input[name=id]').val(recipient);
			});
		});
	})(jQuery)
</script>";

		$this->doc->addCustomTag($js);
	}
}
