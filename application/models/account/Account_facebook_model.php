<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_facebook_model extends CI_Model {

	/**
	 * Get account facebook
	 *
	 * @access public
	 * @param string $account_id
	 * @return object account facebook
	 */
	function get_by_account_id($account_id)
	{
		return $this->db->get_where('a3m_account_facebook', array('account_id' => $account_id))->result();
	}

	// --------------------------------------------------------------------

	/**
	 * Get account facebook
	 *
	 * @access public
	 * @param string $facebook_id
	 * @return object account facebook
	 */
	function get_by_facebook_id($facebook_id)
	{
		return $this->db->get_where('a3m_account_facebook', array('facebook_id' => $facebook_id))->row();
	}

	// --------------------------------------------------------------------

	/**
	 * Insert account facebook
	 *
	 * @access public
	 * @param int $account_id
	 * @param int $facebook_id
	 * @return void
	 */
	function insert($account_id, $facebook_id)
	{
		if ( ! $this->get_by_facebook_id($facebook_id)) // ignore insert
		{
			$this->load->helper('date');
			$this->db->insert('a3m_account_facebook', array('account_id' => $account_id, 'facebook_id' => $facebook_id, 'linkedon' => mdate('%Y-%m-%d %H:%i:%s', now())));
			return TRUE;
		}
		return FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Delete account facebook
	 *
	 * @access public
	 * @param int $facebook_id
	 * @return void
	 */
	function delete($facebook_id)
	{
		$this->db->delete('a3m_account_facebook', array('facebook_id' => $facebook_id));
	}

}


/* End of file Account_facebook_model.php */
/* Location: ./application/models/account/Account_facebook_model.php */