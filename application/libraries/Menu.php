<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu {
	
	var $_debug_msg	= array();

	/**
	 * Constructor - Sets Menu Preferences
	 *
	 * The constructor can be passed an array of config values
	 */
	public function __construct($config = array())
	{
		if (count($config) > 0)
		{
			$this->initialize($config);
		}
		else
		{
		}

		log_message('debug', "Menu Class Initialized");
	}
	

	// --------------------------------------------------------------------

	/**
	 * Initialize preferences
	 *
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	public function initialize($config = array())
	{
		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$method = 'set_'.$key;

				if (method_exists($this, $method))
				{
					$this->$method($val);
				}
				else
				{
					$this->$key = $val;
				}
			}
		}
		$this->clear();

		//$this->_smtp_auth = ($this->smtp_user == '' AND $this->smtp_pass == '') ? FALSE : TRUE;
		//$this->_safe_mode = ((boolean)@ini_get("safe_mode") === FALSE) ? FALSE : TRUE;

		return $this;
	}
	
	// --------------------------------------------------------------------

	/**
	 * Initialize the Menu Data
	 *
	 * @access	public
	 * @return	void
	 */
	public function clear($clear_attachments = FALSE)
	{
		//$this->_subject		= "";
		//$this->_body		= "";
		//$this->_finalbody	= "";
		
		$this->_debug_msg	= array();
		
		//$this->_set_header('User-Agent', $this->useragent);
		//$this->_set_header('Date', $this->_set_date());

		if ($clear_attachments !== FALSE)
		{
			//$this->_attach_name = array();
			//$this->_attach_type = array();
			//$this->_attach_disp = array();
		}

		return $this;
	}
	
	// --------------------------------------------------------------------

	/**
	 * Get Debug Message
	 *
	 * @access	public
	 * @return	string
	 */
	public function print_debugger()
	{
		$msg = '';

		if (count($this->_debug_msg) > 0)
		{
			foreach ($this->_debug_msg as $val)
			{
				$msg .= $val;
			}
		}

		$msg .= "<pre>".htmlspecialchars($this->_header_str)."\n".htmlspecialchars($this->_subject)."\n".htmlspecialchars($this->_finalbody).'</pre>';
		return $msg;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Message
	 *
	 * @access	protected
	 * @param	string
	 * @return	string
	 */
	protected function _set_error_message($msg, $val = '')
	{
		$CI =& get_instance();
		$CI->lang->load('menu');

		if (substr($msg, 0, 5) != 'lang:' || FALSE === ($line = $CI->lang->line(substr($msg, 5))))
		{
			$this->_debug_msg[] = str_replace('%s', $val, $msg)."<br />";
		}
		else
		{
			$this->_debug_msg[] = str_replace('%s', $val, $line)."<br />";
		}
	}

	// --------------------------------------------------------------------
	
	
}

// END Menu class

/* End of file menu.php */
/* Location: ./application/libraries/Menu.php */
