<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EamAdmin extends CI_Controller {

  public function index(){
    $this->load->view('EamAdmin');
    if ($this->session->userdata('_t')) {
      redirect('/TodaysAttendance');
    }
  }

  public function login_exec(){
    if ($this->input->post('adminLogin')) {
      $data['username'] = md5($this->input->post('username'));
      $data['password'] = md5($this->input->post('password'));
      $this->load->model('M_users');
      $result = $this->M_users->_login_exec($data);
      if ($result) {
        $this->session->set_userdata(array(
            '_t'  => $data['username'].$data['password'],
            'status'   => TRUE
        ));
        if ($this->session->userdata('_t')) {
          redirect('/TodaysAttendance');
        }
      } else {
        var_dump('hindi admin');
        die();
      }
    }
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect('/EamAdmin');
  }
}
