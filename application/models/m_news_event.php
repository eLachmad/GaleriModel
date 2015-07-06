<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_news_event extends arfaModel {
    function __construct() {
        parent::__construct();
		$this->table_name	= "news_event";
		$this->primary_key	= "ID_NEWS_EVENT";
		$this->order_by		= "ID_NEWS_EVENT ASC";
    }
}

?>