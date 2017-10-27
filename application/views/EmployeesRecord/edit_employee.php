<section class="content">
  <a href="<?=site_url('EmployeesRecord');?>" class="btn btn-default btn-xs">Employees Record</a>
  <button class="btn btn-primary btn-xs">Edit Employee</button>
  <br>
  <br>
  <form class="form-horizontal" action="<?=current_url();?>" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2">First Name:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="f_name" required="" value="<?=$get_employee->f_name?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Middle Name:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="m_name" required="" value="<?=$get_employee->m_name?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Last Name:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="l_name" required="" value="<?=$get_employee->l_name?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Company:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="company" required="" value="<?=$get_employee->company?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Position:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="position" required="" value="<?=$get_employee->position?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" name="email" required="" value="<?=$get_employee->email?>">
      </div>
    </div>
    <input type="hidden" class="form-control" name="id" required="" value="<?=$get_employee->id?>">
    <div class="form-group">
      <label class="control-label col-sm-2">&nbsp;</label>
      <div class="col-sm-9">
        <input type="submit" class="btn btn-success pull-right btn-flat" name="btnUpdateEmployee" value="Update Employee">
      </div>
    </div>
  </form>
</section>