<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodaysAttendance extends MY_PrivateController {

  public function index () {
    $date_to_string = strtotime(NOW);
    $this->view_data['date'] = date('F j, Y', $date_to_string);

    $this->load->model('M_attendance');
    $this->view_data['todays_time_in_attendance'] = $this->M_attendance->_get_todays_time_in_attendance(NOW);
    $this->view_data['todays_time_out_attendance'] = $this->M_attendance->_get_todays_time_out_attendance(NOW);
  }
}
