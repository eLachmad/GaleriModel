<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_model extends arfaModel {
    function __construct() {
        parent::__construct();
		$this->table_name	= "model";
		$this->primary_key	= "ID_MODEL";
		$this->order_by		= "ID_MODEL ASC";
    }
}

?>