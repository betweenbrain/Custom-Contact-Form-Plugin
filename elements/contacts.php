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

class JFormFieldContacts extends JFormFieldList
{

	protected $type = 'Contacts';

	function __construct()
	{
		parent::__construct();
		$this->app = JFactory::getApplication();
		$this->db  = JFactory::getDbo();
	}

	public function getOptions()
	{
		$notUsersQuery = $this->db->getQuery(true);
		$usersQuery    = $this->db->getQuery(true);

		$notUsersQuery
			->select($this->db->quoteName(array(
						'alias',
						'name',
						'id',
						'email_to')
				)
			)
			->from($this->db->quoteName('#__contact_details'))
			->where($this->db->quoteName('user_id') . ' = ' . $this->db->quote('0'));

		$this->db->setQuery($notUsersQuery);
		$notUsers = $this->db->loadObjectList();

		$usersQuery
			->select($this->db->quoteName('a.alias', 'alias'))
			->select($this->db->quoteName('a.name', 'name'))
			->select($this->db->quoteName('a.id', 'id'))
			->select($this->db->quoteName('b.email', 'email_to'))
			->from($this->db->quoteName('#__contact_details', 'a'))
			->join('LEFT', $this->db->quoteName('#__users', 'b') . ' ON (' . $this->db->quoteName('a.user_id') . ' = ' . $this->db->quoteName('b.id') . ')')
			->where($this->db->quoteName('a.user_id') . ' > ' . $this->db->quote('0'));

		$this->db->setQuery($usersQuery);
		$users = $this->db->loadObjectList();

		$contacts = array_merge($notUsers, $users);

		$options[] = JHTML::_('select.option', '', 'Please select');

		foreach ($contacts as $contact) :
			$options[] = JHTML::_('select.option', $contact->id . ':' . $contact->alias, $contact->name);
		endforeach;

		return $options;
	}
}
