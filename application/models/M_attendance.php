<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_attendance extends CI_Model {
  
  public function __construct(){
    parent::__construct();
  }

  public function _check_employee($data = FALSE) {
    $query = $this->db
    ->select('*')
    ->from('employees')
    ->where('emp_id', $data['emp_id'])
    ->where('password', $data['password'])
    ->get();
    return $query->row();
  }

  public function _validate_time_in($data = FALSE) {
    $query = $this->db
    ->select('*')
    ->from('attendance')
    ->where('emp_id', $data['emp_id'])
    // ->where('date', $data['date'])
    ->where('att_type', 'time in')
    ->get();
    return $query->result(); 
  }

  public function _validate_time_out($data = FALSE) {
    $query = $this->db
    ->select('*')
    ->from('attendance')
    ->where('emp_id', $data['emp_id'])
    ->where('date', $data['date'])
    ->where('att_type', 'time out')
    ->get();
    return $query->result(); 
  }

  public function _save_time_in($data = FALSE){ 
    $this->db->insert('attendance', $data);
    return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
  }

  public function _check_if_time_in ($emp_id = FALSE, $date = FALSE) {
    $query = $this->db
    ->select('*')
    ->from('attendance')
    ->where('emp_id', $emp_id)
    ->where('date', $date)
    ->get();
    return $query->result();
  }

  public function _get_todays_time_in_attendance($dateNow) {
    $date = date('m/d/Y', strtotime($dateNow));
    $query = $this->db
            ->select('*')
            ->from('attendance')
            ->join('employees', 'employees.emp_id = attendance.emp_id')
            // ->where('attendance.date', $date)
            ->where('attendance.att_type', 'time in')
            ->order_by('attendance.id', 'ASC')
            ->get();
    return $query->result();
  }

  public function _get_todays_time_out_attendance($dateNow) {
     $date = date('m/d/Y', strtotime($dateNow));
    $query = $this->db
            ->select('*')
            ->from('final_attendance')
            ->join('employees', 'employees.emp_id = final_attendance.emp_id')
            ->where('final_attendance.date', $date)
            ->where('final_attendance.att_type', 'time out')
            ->order_by('final_attendance.id', 'ASC')
            ->get();
    return $query->result();
  }

  public function _save_time_out($data = FALSE){ 
    $this->db->insert('attendance', $data);
    return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
  }

  public function _dtr($emp_id = FALSE){
    $query = $this->db
            ->select('final_attendance.emp_id, date, time_in, time_out')
            ->from('final_attendance')
            ->join('employees', 'employees.emp_id = final_attendance.emp_id')
            ->where('final_attendance.emp_id', $emp_id)
            ->limit(25)
            ->get();
    return $query->result();
  }

  public function _filter_dtr($data = FALSE){
    $query = "SELECT emp_id, date, time_in, time_out
    FROM final_attendance
    WHERE emp_id = ? 
    AND date
    BETWEEN ? and ?";
    $result = $this->db->query($query,[$data['emp_id'], $data['start_date'], $data['end_date']]);
    return $result->num_rows() >= 1 ? $result->result() : FALSE; 
  }

  public function _get_timein_timeout($data = FALSE) {
    $query = $this->db
    ->select('attendance.emp_id, date, GROUP_CONCAT(DISTINCT time_in SEPARATOR "") as t_in, GROUP_CONCAT(DISTINCT time_out SEPARATOR "") as t_out')
    ->from('attendance')
    ->where('emp_id', $data['emp_id'])
    ->where('date', $data['date'])
    ->get();
    return $query->result();
  }

  public function _save_attendance($data = FALSE) {
    $save_data['emp_id'] = $data->emp_id;
    $save_data['date'] = $data->date;
    $save_data['time_in'] = $data->t_in;
    $save_data['time_out'] = $data->t_out;
    $this->db->insert('final_attendance', $save_data);
    return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
  }

  public function _delete_attendace($emp_id = FALSE) {
    $this->db->delete('attendance', array('emp_id' => $emp_id)); 
    return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
  }
}