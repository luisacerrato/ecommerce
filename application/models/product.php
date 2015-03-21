<?php

    class Product extends CI_Model {

    	function get_all_products() 
    	{
    		return $this->db->query("SELECT * FROM products")->result_array();
    	}

    	function get_info($id)
    	{
    		return $this->db->query("SELECT * FROM products where id = ?",
    								 array($id))->result_array();
    	}
    	   
}