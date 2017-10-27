<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $page_title;?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=assets_url('PrivateTemp/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=assets_url('PrivateTemp/fonts/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?=assets_url('PrivateTemp/fonts/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?=assets_url('PrivateTemp/css/AdminLTE.min.css')?>">
  <link rel="stylesheet" href="<?=assets_url('PrivateTemp/css/all-skins.min.css');?>">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=site_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>EAM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $page_title;?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=assets_url('images/images.jpg'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs" style="text-transform: capitalize;">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=assets_url('images/images.jpg'); ?>" class="img-circle" alt="User Image">
                <p>
                  <!-- <?php echo $get_instructor_info->fname; ?> <?php echo $get_instructor_info->mname; ?> <?php echo $get_instructor_info->lname; ?> -->
                  ADMIN
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo site_url('EamAdmin/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">

    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="<?php if($this->uri->segment(1) == 'TodaysAttendance'){ echo 'active'; }?> treeview">
          <a href="<?=site_url('TodaysAttendance');?>">
            <i class="fa fa-check"></i> <span>Today's Attendance</span>
            <span class="pull-right-container"> 
            </span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(1) == 'EmployeesRecord'){ echo 'active'; }?> treeview">
          <a href="<?=site_url('EmployeesRecord');?>">
            <i class="fa fa-list"></i> <span>Employees Record</span>
            <span class="pull-right-container"> 
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <?php echo $yield;?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-home-tab">
        <!-- /.control-sidebar-menu -->       
      </div>
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 2.2.3 -->
<script src="<?=assets_url('PrivateTemp/js/jquery-2.2.3.min.js')?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=assets_url('PrivateTemp/js/bootstrap.min.js')?>"></script>

<!-- SlimScroll -->
<script src="<?=assets_url('PrivateTemp/js/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?=assets_url('PrivateTemp/js/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=assets_url('PrivateTemp/js/app.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=assets_url('PrivateTemp/js/demo.js')?>"></script>
</body>
</html>