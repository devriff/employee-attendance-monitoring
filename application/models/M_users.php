<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_users extends CI_Model {
  
  public function __construct(){
    parent::__construct();
  }

  public function _login_exec($data = FALSE){
    $query = $this->db
    ->select('*')
    ->where('username', $data['username'])
    ->where('password', $data['password'])
    ->get('users');
    return $query->row(); 
  }
}