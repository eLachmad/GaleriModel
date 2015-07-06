<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_user extends arfaModel {
    function __construct() {
        parent::__construct();
		$this->table_name	= "user";
		$this->primary_key	= "ID_USER";
		$this->order_by		= "ID_USER ASC";
    }
}

?>