<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DailyAttendance extends CI_Controller {

  public function index () {
    $this->load->view('DailyAttendance');
  }

  public function time_in () {
  	$this->load->model('M_attendance');
  	$data1['emp_id'] = $this->input->post('emp_id');
  	$data1['password'] = md5($this->input->post('password'));
  	$result = $this->M_attendance->_check_employee($data1);
  	if ($result) {
  		$data2['emp_id'] = $this->input->post('emp_id');
	  	$data2['date'] = date('m/d/Y',strtotime(NOW));
      $data2['time_in'] = date('h:i A',strtotime(NOW));
	  	$data2['att_type'] = 'time in';
	  	$validate = $this->M_attendance->_validate_time_in($data2);
	  	if ($validate) {
	  		$message =  array('message' => 'You are already timed in!');
        echo json_encode($message);
	  	} else {
		  	$save_time_in = $this->M_attendance->_save_time_in($data2);
		  	if ($save_time_in) {
		  		$message =  array('message' => 'Success! Your time in!' );
          echo json_encode($message);
		  	}
	  	}
  	} else {
  		$message =  array('message' => 'Invalid Credential!' );
      echo json_encode($message);
  	}
  }
  public function time_out () {
    $this->load->model('M_attendance');
    $data1['emp_id'] = $this->input->post('emp_id');
    $data1['password'] = md5($this->input->post('password'));
    $result = $this->M_attendance->_check_employee($data1);
    if ($result) {
      $data2['emp_id'] = $this->input->post('emp_id');
      $data2['date'] = date('m/d/Y',strtotime(NOW));
      $data2['time_out'] = date('h:i A',strtotime(NOW));
      $data2['att_type'] = 'time out';
      $validate_time_in = $this->M_attendance->_validate_time_in($data2);
      if ($validate_time_in) {
        $validate_time_out = $this->M_attendance->_validate_time_out($data2);
        if ($validate_time_out) {
          $message =  array('message' => 'You are already timed out!');
          echo json_encode($message);
        } else {
          $save_time_in = $this->M_attendance->_save_time_out($data2);
          if ($save_time_in) {
            $get_timein_timeout = $this->M_attendance->_get_timein_timeout($data2);
            foreach ($get_timein_timeout as $key => $value) {
              $this->M_attendance->_save_attendance($value);
            }
            $delete_attendace = $this->M_attendance->_delete_attendace($data2['emp_id']);
            if ($delete_attendace) {
              $message =  array('message' => 'Success! Your time out!' );
              echo json_encode($message);
            }
          }
        }
      } else {
        $message =  array('message' => 'Please time in first!' );
        echo json_encode($message);
      }
    } else {
      $message =  array('message' => 'Invalid Credential!' );
      echo json_encode($message);
    }
  }

  public function migrate () {
    $this->load->model('M_attendance');
    $data['get_data'] =  $this->M_attendance->_get_data();
    foreach ($data['get_data'] as $key => $value) {
      $this->M_attendance->_save_dtr($value);
    }
  }
}