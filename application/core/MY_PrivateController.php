<?php
class MY_PrivateController Extends CI_Controller
{
  protected $layout_view = 'PrivateTemp';
    protected $content_view ='';
    protected $view_data = [];

  public function __construct(){
    parent::__construct();
    $this->view_data['page_title'] = 'EA MONITORING';
    $this->view_data['system_message'] =$this->_msg();
    if (!$this->session->userdata('_t')) {
      redirect('/EamAdmin');
    }
  }
  
  public function _output($output){
    if($this->content_view !== FALSE && empty($this->content_view)) $this->content_view = $this->router->class . '/' . $this->router->method;
    
      $yield = file_exists(APPPATH . 'views/' . $this->content_view . '.php') ? $this->load->view($this->content_view, $this->view_data, TRUE) : FALSE ;
    
    if($this->layout_view){ 
      echo $this->load->view('Templates/' . $this->layout_view, array('yield' => $yield), TRUE);
      echo $output;
    }
  }
  
  public function _msg($type = FALSE,$message = FALSE,$redirect = FALSE,$var_name = 'system_message'){
    $type = strtolower($type);
    switch($type){
      case $type === 'e':
        $template = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong><i class='icon fa fa-exclamation'></i> ".$message."</strong></div>";
      break;
      case $type === 's':
        $template = "<div class='alert alert-success'><strong>Success!</strong> ".$message."</div>";
      break;
      case $type === 'n':
        $template = "<span class='word-break' style='color:#FFA500 !important; font-weight:bold !important;'><i class='callout callout-warning'></i> ".$message."</span>";
      break;
      case $type === 'p':
        $template = "<span class='word-break' style='color: green !important; font-weight:bold !important;'><i class='callout callout-success'></i> ".$message."</span>";

      break;
      case $type === FALSE;
        $template = $message;
      break;
    }
    
    if($type AND $message AND $redirect){
      $this->session->set_flashdata($var_name,$template);
      redirect($redirect);

    }elseif($type AND $message AND $redirect == FALSE){
      return $template;
    }
    
    if($redirect == FALSE AND $message == FALSE AND $redirect == FALSE){
      return $this->session->flashdata($var_name);
    }
  }
}