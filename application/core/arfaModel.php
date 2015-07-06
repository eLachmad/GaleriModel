<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class arfaModel extends CI_Model {
    
     /**
     * The database table to use.
     * @var string
     */
    public $table_name = '';
    
    /**
     * Primary key field
     * @var string
     */
    public $primary_key = '';
    
    /**
     * The filter that is used on the primary key. Since most primary keys are 
     * autoincrement integers, this defaults to intval. On non-integers, you would 
     * typically use something like xss_clean of htmlentities.
     * @var string
     */
    public $primaryFilter = 'intval'; // htmlentities for string keys
    
    /**
     * Order by fields. Default order for this model.
     * @var string
     */
    public $order_by = '';
    
    function __construct() {
        parent::__construct();
    }
    
     /**
     * 
	  * get() => menampilkan semua record (semua kolom) => [number]['nama kolom']['value']
	  * get(1) => menampilkan record berdasarkan id (semua kolom) => ['nama kolom']['value'] 
	  * get(array(1, 2)) => mengambilkan beberapa record berdasarkan id yang dipanggil (semua kolom) => [number]['nama kolom']['value']
	 * Get one record, based on ID, or get all records. You can pass a single 
     * ID, an array of IDs, or no ID (in which case the  method will return 
     * all records)
     * 
     * If you request a single ID the result will be returned as an associative array:
     * array('id' => 1, 'title' => 'Some title')
     * In all other cases the result wil be returned as an array of arrays
     * array(array('id' => 1, 'title' => 'Some title'), array('id' => 2, 'title' => 'Some other title'))
     * 
     * Thanks to Zack Kitzmiller who suggested some improvements.
     * 
     * @param mixed $id An ID or an array of IDs (optional, default = FALSE)
     * @return array
     * @author Joost van Veen
     */
    public function get ($ids = FALSE,$limit = FALSE,$column = FALSE, $order = FALSE){
        
        // Set flag - if we passed a single ID we should return a single record
        $single = $ids == FALSE || is_array($ids) ? FALSE : TRUE;
        
        // Limit results to one or more ids
        if ($ids !== FALSE) {
            
            // $ids should always be an array
            is_array($ids) || $ids = array($ids); 
            
            // Sanitize ids
            $filter = $this->primaryFilter;
            $ids = array_map($filter, $ids); 
            
            $this->db->where_in($this->primary_key, $ids);
        }
        if($order == FALSE)
			count($this->db->ar_orderby) || $this->db->order_by($this->order_by);
		else
			$this->db->order_by($order);
        // Set order by if it was not already set
        count($this->db->ar_orderby) || $this->db->order_by($this->order_by);
        $this->db->select($column == FALSE ? "*" : $column);
        // Return results
        $single == FALSE || $this->db->limit(1);
		$limit	== TRUE ? $single = TRUE : ""; //zulmi 06/07/2013
        $method = $single ? 'row_array' : 'result_array';
        return $this->db->get($this->table_name)->$method();
    }
    
    /**
	 * 
	  * get_by('post_slug', 'first-post', NULL, TRUE) => menampilkan record berdasarkan nama kolom dan valuenya (semua kolom, single data)  => ['nama kolom']['value'] 
	  * get_by(array('post_slug' => 'third-post', 'post_pubdate <' => '2011-10-18')) => menampilkan record berdasarkan  beberapa nama kolom dan valuenya (semua kolom, menggunakan AND) => [number]['nama kolom']['value']
	  * get_by(array('post_slug' => 'third-post', 'post_pubdate <' => '2011-10-18'), NULL, TRUE) => menampilkan record berdasarkan  beberapa nama kolom dan valuenya (semua kolom, menggunakan OR) => [number]['nama kolom']['value']
	 * Get records by one or more keys.
     * 
     * @param mixed $key can be a string, in which case teh value is in $val. Can also ba a key => value pair array.
     * @param mixed $val The value for a set set $key
     * @param boolean $orwhere
     * @param boolean $single
     * @return void
     * @author Joost van Veen
     */
    public function get_by ($key, $val = FALSE, $orwhere = FALSE, $single = FALSE, $column=FALSE, $order = FALSE) {
        
        // Limit results
        if ($val == TRUE) {
            $this->db->where(htmlentities($key), htmlentities($val));
        }
        else {
			if(!is_array($key)){
				$this->db->where($key);
			} else {
				$key = array_map('htmlentities', $key);
				$where_method = $orwhere == TRUE ? 'or_where' : 'where';
				$this->db->$where_method($key);
			}           
        }
		if($order == FALSE)
			count($this->db->ar_orderby) || $this->db->order_by($this->order_by);
		else
			$this->db->order_by($order);
        count($this->db->ar_orderby) || $this->db->order_by($this->order_by);
		$this->db->select($column == FALSE ? "*" : $column)->from($this->table_name);
        // Return results
        $single == FALSE || $this->db->limit(1);
        $method = $single ? 'row_array' : 'result_array';
		return $this->db->get()->$method();
        // return $this->db->get($this->table_name)->$method();
    }
    
     /**
     * 
	  * get_key_value('post_slug', 'post_title') => menampilkan semua record (kolom tertentu) => ['value']['value']
	  * get_key_value('post_slug', 'post_title', 1) => menampilkan record berdasarkan id (kolom tertentu) => ['value']['value']
	  * get_key_value('post_slug', 'post_title', array(1, 2)) => menampilkan beberapa record berdasarkan id yang diinputkan (kolom tertentu) => ['value']['value']
	 * Get one or more records as a key=>value pair array.
     *
     * @param string $key_field The field that holds the key
     * @param string $value_field The field that holds the value
     * @param mixed $id An ID or an array of IDs (optional, default = FALSE)
     * @uses get
     * @return array
     * @author Joost van Veen
     */
    public function get_key_value ($key_field, $value_field, $ids = FALSE){
        
        // Get records
        $this->db->select($key_field . ', ' . $value_field);
        $result = $this->get($ids);
        
        // Turn results into key=>value pair array.
        $data = array();
        if (count($result) > 0) {
            
            if ($ids != FALSE && !is_array($ids)) {
                $result = array($result);
            }
            
            foreach ($result as $row) {
                $data[$row[$key_field]] = $row[$value_field];
            }
        }
        
        return $data;
    }
    
    /**
     * 
	  * get_assoc() => menampilkan semua record (semua kolom) (berbeda dengan get, induk array berupa id) => [id]['nama kolom']['value']
	  * $this->db->select('post_slug, post_id, post_title'); $posts1 = $this->posts->get_assoc(); => menampilkan semua record (kolom tertentu)  => [nama kolom pertama dari select]['nama kolom']['value']
	  * get_assoc(1) => menampilkan record berdasarkan id (semua kolom) => [id]['nama kolom']['value']
	  * get_assoc(array(1, 2, 5)) => menampilkan beberapa record berdasarkan id yang diinputkan => [id]['nama kolom']['value']  
	 * Return records as an associative array, where the key is the value of the 
     * first key for that record. Typical return array:
     * $return[18] = array(18 => array('id' => 18,'title' => 'Example record')
     * 
     * @param integer $id An ID or an array of IDs (optional, default = 0)
     * @uses get
     * @return array
     * @author Joost van Veen
     */
    public function get_assoc ($ids = FALSE){
        // Get records
        $result = $this->get($ids);
        
        // Turn results into an associative array.
        if ($ids != FALSE && !is_array($ids)) {
            $result = array($result);
        }
        $data = $this->to_assoc($result);
        
        return $data;
    }
    
    /**
      * $posts = $this->posts->get_by(array('post_slug' => 'third-post', 'post_pubdate <' => '2011-10-18'), NULL, TRUE); $posts = $this->posts->to_assoc($posts); => menampilkan beberapa record berdasarkan query pada get_by => [id]['nama kolom']['value']  
	 * Turn a multidimensional array into an associative array, where the index 
     * equals the value of the first index. 
     * 
     * Example output:
     * array(0 => array('pag_id' => 23, 'pag_title' => 'foo'))
     * becomes
     * array(23 => array('pag_id' => 23, 'pag_title' => 'foo'))
     * @param $array
     * @return array
     * @author Joost van Veen
     */
    public function to_assoc($result = array()){
        
        $data = array();
        if (count($result) > 0) {
            
            foreach ($result as $row) {
                $tmp = array_values(array_slice($row, 0, 1));
                $data[$tmp[0]] = $row;
            }
        }  

        return $data;
    }
    
    /**
     * Save or update a record.
     * 
     * @param array $data
     * @param mixed $id Optional
     * @return mixed The ID of the saved record
     * @author Joost van Veen
     */
    public function save($data, $id = FALSE) {
        
        if ($id == FALSE) {
            
            // This is an insert
            $this->db->set($data)->insert($this->table_name);
        }
        else {
            if(!is_array($id)){
				$filter = $this->primaryFilter;
				$this->db->set($data)->where($this->primary_key, $filter($id))->update($this->table_name);
			} else {
				$filter = $this->primaryFilter;
				$this->db->set($data)->where($id)->update($this->table_name);
				/*
				update tidak berdasarkan primary key tetapi, menggunakan kolom lain contoh : save($data,array("NAMA_KOLOM"=>"coba"));
				*/
				//Zulmi Adi Rizki 19 Juli 2013
			}
            // This is an update
        }
        
        // Return the ID
        return $id == FALSE ? $this->db->insert_id() : $id;
    }
    
    /**
     * Delete one or more records by ID
     * @param mixed $ids
     * @return void
     * @author Joost van Veen
     */
    public function delete($ids){
        
        $filter = $this->primaryFilter; 
        $ids = ! is_array($ids) ? array($ids) : $ids;
        
        foreach ($ids as $id) {
            $id = $filter($id);
            if ($id) {
                $this->db->where($this->primary_key, $id)->limit(1)->delete($this->table_name);
            }
        }
    }

    /**
     * Delete one or more records by another key than the ID
     * @param string $key
     * @param mixed $value
     * @return void
     * @author Joost van Veen
     */
    public function delete_by($key, $value){
        
        if (empty($key)) {
            return FALSE;
        }
        
        $this->db->where(htmlentities($key), htmlentities($value))->delete($this->table_name);
    }
	
	//Start Jqgrid
	function getAllGrid($where, $sidx, $sord, $limit, $start){
        $this->db->select('*');
        $this->db->limit($limit);
        if($where != NULL)$this->db->like($where,NULL,FALSE);
        $this->db->order_by($sidx,$sord);
      	$query = $this->db->get($this->table_name,$limit,$start);
      	return $query->result(); 
	}
	
	//jqgrid join 2 table
	function getAllGridJoin($where, $sidx, $sord, $limit, $start,$join,$pkJoin){
        $this->db->select('*');
        $this->db->limit($limit);
        if($where != NULL)$this->db->like($where,NULL,FALSE);
        $this->db->order_by($sidx,$sord);
		$this->db->join($join,$this->table_name.'.'.$pkJoin .'='. $join.'.'.$pkJoin);
      	$query = $this->db->get($this->table_name,$limit,$start);
      	return $query->result(); 
	}
	//End Jqgrid
	
	//Flexigrid
	function getFG($key=FALSE,$column=FALSE){ //Zulmi Adi Rizki 20 Juli 2013
		if($key == TRUE){
			$key = array_map('htmlentities', $key); 
			$this->db->where($key);
		}
		$this->db->select($column == FALSE ? "*" : $column);
		$this->flexigrid->build_query();
		$return['records'] = $this->db->get($this->table_name);
		
		$this->db->select($column == FALSE ? "*" : $column);
		$this->flexigrid->build_query(FALSE);
		$return['record_count'] = $this->db->count_all_results($this->table_name);
		
		return $return;
	}
	//End Flexigrid
	
	//Flexigrid Join
	function get_joinFG($data,$key=FALSE,$column=FALSE){ //Zulmi Adi Rizki 23 Juli 2013
		
		if($key == TRUE){
			if(!is_array($key)){
				$this->db->where($key);
			} else {
				$key = array_map('htmlentities', $key);
				$this->db->where($key);
			}
		}
		$this->db->select($column == FALSE ? "*" : $column)->from($this->table_name);
		foreach($data as $row){
			if($row["join_type"] != NULL){
				$this->db->join($row["join_table"],$row["table"].".".$row["join_key"]."=".$row["join_table"].".".$row["join_key"], $row["join_type"]);
			} else {
				$this->db->join($row["join_table"],$row["table"].".".$row["join_key"]."=".$row["join_table"].".".$row["join_key"]);
			}
		}
		$this->flexigrid->build_query();
		$return['records'] = $this->db->get();
		
		if($key == TRUE){
			if(!is_array($key)){
				$this->db->where($key);
			} else {
				$key = array_map('htmlentities', $key);
				$this->db->where($key);
			}
		}
		$this->db->select($column == FALSE ? "*" : $column)->from($this->table_name);
		foreach($data as $row){
			if($row["join_type"] != NULL){
				$this->db->join($row["join_table"],$row["table"].".".$row["join_key"]."=".$row["join_table"].".".$row["join_key"], $row["join_type"]);
			} else {
				$this->db->join($row["join_table"],$row["table"].".".$row["join_key"]."=".$row["join_table"].".".$row["join_key"]);
			}
		}
		$this->flexigrid->build_query(FALSE);
		$return['record_count'] = $this->db->count_all_results();
		
		return $return;
	}
	//End Flexigrid
	
	/*
	<!-- join table -->
	$data	= array(
		array("table"=>"nama_tabel","join_key"=>"relasi","join_table"=>"tabel_tujuan")
	);
	<!-- end -->
	$ids = primary_key;
	
	get_join($data,$ids,FALSE);
	*/
	function get_join($data,$key=FALSE,$single=FALSE,$column=FALSE){ //Zulmi Adi Rizki 23 Juli 2013
		foreach($data as $row){
			$this->db->join($row["join_table"],$row["table"].".".$row["join_key"]."=".$row["join_table"].".".$row["join_key"]);
		}
		if($key == TRUE){
			if(!is_array($key)){
				$this->db->where($key);
			} else {
				$key = array_map('htmlentities', $key);
				$this->db->where($key);
			}
		}
		count($this->db->ar_orderby) || $this->db->order_by($this->order_by);
		$this->db->select($column == FALSE ? "*" : $column)->from($this->table_name);
		$single == FALSE || $this->db->limit(1);
		$method = $single ? 'row_array' : 'result_array';
		return $this->db->get()->$method();
	}
	/*
	<!-- join table -->
	$data	= array(
		array("table"=>"nama_tabel","join_key"=>"relasi","join_table"=>"tabel_tujuan")
	);
	<!-- end -->
	
	<!-- kondisi -->
	$key	= array("NAMA_KOLOM"=>1,"NAMA_KOLOM2"=>2,"NAMA_KOLOM3"=>3); atau
	$key	= "NAMA_KOLOM = 3 AND NAMA_KOLOM2 IS NULL";
	<!-- end -->
	
	<!-- nama kolom -->
	$column	= array("NAMA_KOLOM","NAMA_KOLOM2","NAMA_KOLOM3");
	<!-- end -->
	get_join_by($data,$key,TRUE,$column);
	*/
	function get_join_by($data,$key=FALSE,$single=FALSE,$column=FALSE){ //Zulmi Adi Rizki 23 Juli 2013
		foreach($data as $row){
			$this->db->join($row["join_table"],$row["table"].".".$row["join_key"]."=".$row["join_table"].".".$row["join_key"]);
		}
		if($key == TRUE){
			if(!is_array($key)){
				$this->db->where($key);
			} else {
				$key = array_map('htmlentities', $key);
				$this->db->where($key);
			}
		}
		count($this->db->ar_orderby) || $this->db->order_by($this->order_by);
		$this->db->select($column == FALSE ? "*" : $column)->from($this->table_name);
		$single == FALSE || $this->db->limit(1);
		$method = $single ? 'row_array' : 'result_array';
		return $this->db->get()->$method();
	}
}
/*
created by : 1.yupit sudianto (6/12/2012 - ...)
get_join_by zulmi 12/07/2012
*/