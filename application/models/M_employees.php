<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_employees extends CI_Model {
  
  public function __construct(){
    parent::__construct();
  }

  public function _save_employee($data = FALSE){
    $data['created_at'] = NOW;
    $data['updated_at'] = NOW;  
    $this->db
    ->insert('employees', $data);
    return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
  }

  public function _get_employees(){
    $query = $this->db
    ->select('*')
    ->from('employees')
    ->get();
    return $query->result();
  }

  public function _delete_employee($id = FALSE){
    $this->db
    ->where('id', $id)
    ->delete('employees');
    return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
  }

  public function _get_employee($id = FALSE){
    $query = $this->db
    ->select('*')
    ->where('id', $id)
    ->get('employees');
    return $query->row();
  }

  public function _update_employee($data = FALSE){
    $data['updated_at'] = NOW;
    $this->db->where('id', $data['id']);
    $this->db->update('employees', $data);
    return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
  }
}