<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeesRecord extends MY_PrivateController {

  public function index(){
    $this->load->model('M_employees');
    $this->view_data['employees'] = $this->M_employees->_get_employees();
    
    if ($this->input->post('btnAddEmployee')) {
      $data['emp_id'] = $this->input->post('emp_id');
      $data['f_name'] = $this->input->post('f_name');
      $data['m_name'] = $this->input->post('m_name');
      $data['l_name'] = $this->input->post('l_name');
      $data['company'] = $this->input->post('company');
      $data['position'] = $this->input->post('position');
      $data['email'] = $this->input->post('email');
      $data['password'] = md5($this->input->post('password'));
      $result = $this->M_employees->_save_employee($data);
      if ($result) {
        $this->_msg('s','Employee Added!', current_url());
      } else {
        $this->_msg('e','Error!', current_url());
      }
    }
  }

  public function delete_employee($id){
    $this->load->model('M_employees');
    $result = $this->M_employees->_delete_employee($id);
    if ($result) {
      $this->_msg('s', 'Employee Deleted!', site_url('EmployeesRecord'));
    } else {
      $this->_msg('e', 'Error!', site_url('EmployeesRecord'));
    }
  }

  public function edit_employee($id){
    $this->load->model('M_employees');
    $this->view_data['get_employee'] = $this->M_employees->_get_employee($id);

    if ($this->input->post('btnUpdateEmployee')) {
      $data['id'] = $this->input->post('id');
      $data['f_name'] = $this->input->post('f_name');
      $data['m_name'] = $this->input->post('m_name');
      $data['l_name'] = $this->input->post('l_name');
      $data['company'] = $this->input->post('company');
      $data['position'] = $this->input->post('position');
      $data['email'] = $this->input->post('email');
      $result = $this->M_employees->_update_employee($data);
      if ($result) {
        $this->_msg('s','Employee Updated!', site_url('EmployeesRecord'));
      } else {
        $this->_msg('e','Error!', site_url('EmployeesRecord'));
      }
    }
  }

  public function dtr($emp_id = FALSE){
    $this->load->model('M_attendance');

    if ($this->input->post('filterDTR')) {
      $data['emp_id'] = $emp_id;
      $data['start_date'] = date('m/d/Y',strtotime($this->input->post('start_date')));
      $data['end_date'] = date('m/d/Y',strtotime($this->input->post('end_date')));
      $this->view_data['dtr'] = $this->M_attendance->_filter_dtr($data);
    } else {
      $this->view_data['dtr'] = $this->M_attendance->_dtr($emp_id);
    }
  }
}
