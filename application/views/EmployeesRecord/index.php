<section class="content">
  
  <a href="<?=site_url('EmployeesRecord');?>" class="btn btn-default btn-xs">Employees Record</a>
  <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addEmployee">Add Employee</button>
  <br>
  <br>
  <?php echo $system_message; ?>
  <table class="table table-hover table-bordered" style="border: 1px solid gray; margin-top: 5px;">
    <thead>
      <tr>
        <th>EMP ID</th>
        <th>FULLNAME</th>
        <th>COMPANY</th>
        <th>POSITION</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($employees as $key => $emp): ?>
        <tr>
          <td><?php echo $emp->emp_id; ?></td>
          <td style="text-transform: uppercase;"><?php echo $emp->l_name; ?>, <?php echo $emp->f_name; ?> <?php echo $emp->m_name; ?></td>
          <td><?php echo $emp->company; ?></td>
          <td><?php echo $emp->position; ?></td>
          <td>
            <a href="<?=site_url('EmployeesRecord/dtr/'.$emp->emp_id);?>" class="btn btn-warning btn-xs">DTR</a>
            <a href="<?=site_url('EmployeesRecord/edit_employee/'.$emp->id);?>" class="btn btn-warning btn-xs"">Edit</a>
            <a href="<?=site_url('EmployeesRecord/delete_employee/'.$emp->id);?>" class="btn btn-danger btn-xs"  onclick="return deleteEmployee()">Delete</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</section>

<!-- Modal -->
<div id="addEmployee" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Employee</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?=current_url();?>" method="POST">

          <div class="form-group">
            <label class="control-label col-sm-3">EMP ID:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="emp_id" required="">
            </div>
          </div>
            
          <div class="form-group">
            <label class="control-label col-sm-3">First Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="f_name" required="">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3">Middle Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="m_name" required="">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3">Last Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="l_name" required="">
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-3">Company:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="company" required="">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3">Position:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="position" required="">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3">Email:</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" name="email" required="">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3">Password:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="password" required="">
            </div>
          </div>
          <input type="submit" class="btn btn-success pull-right btn-flat" name="btnAddEmployee" value="Save">

        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  function editEmployee (empData) {
    console.log(empData);
  }
  function deleteEmployee () {
    return confirm('Are you sure want to delete this schedule?');
  }
</script>