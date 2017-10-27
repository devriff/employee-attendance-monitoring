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
    ->where('date', $data['date'])
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
            ->where('attendance.date', $date)
            ->where('attendance.att_type', 'time in')
            ->order_by('attendance.id', 'ASC')
            ->get();
    return $query->result();
  }

  public function _get_todays_time_out_attendance($dateNow) {
     $date = date('m/d/Y', strtotime($dateNow));
    $query = $this->db
            ->select('*')
            ->from('attendance')
            ->join('employees', 'employees.emp_id = attendance.emp_id')
            ->where('attendance.date', $date)
            ->where('attendance.att_type', 'time out')
            ->order_by('attendance.id', 'ASC')
            ->get();
    return $query->result();
  }

  public function _save_time_out($data = FALSE){ 
    $this->db->insert('attendance', $data);
    return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
  }

  public function _dtr($emp_id = FALSE){
    $query = $this->db
            ->select('attendance.emp_id, date, GROUP_CONCAT(DISTINCT time_in SEPARATOR "") as t_in, GROUP_CONCAT(DISTINCT time_out SEPARATOR "") as t_out')
            ->from('attendance')
            ->join('employees', 'employees.emp_id = attendance.emp_id')
            ->where('attendance.emp_id', $emp_id)
            ->order_by('attendance.date', 'ASC')
            ->group_by('attendance.date')
            ->limit(25)
            ->get();
    return $query->result();
  }

  public function _filter_dtr($data = FALSE){
    $query = "SELECT emp_id, date, GROUP_CONCAT(DISTINCT time_in SEPARATOR '') as t_in, GROUP_CONCAT(DISTINCT time_out SEPARATOR '') as t_out
    FROM attendance
    WHERE emp_id = ? 
    AND date
    BETWEEN ? and ?
    GROUP BY date
    ORDER BY date ASC";
    $result = $this->db->query($query,[$data['emp_id'], $data['start_date'], $data['end_date']]);
    return $result->num_rows() >= 1 ? $result->result() : FALSE; 
  }
}