<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_products extends CI_Model {
    public function all(){
        $hasil = $this->db->get('products');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return array();
        }
    }
    
    public function find($id){
        //Query mencari record berdasarkan ID-nya
        $hasil = $this->db->where('id', $id)
                          ->limit(1)
                          ->get('products');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }    
}