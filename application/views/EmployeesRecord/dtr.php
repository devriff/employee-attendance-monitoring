<section class="content">
  
  <a href="<?=site_url('EmployeesRecord');?>" class="btn btn-default btn-xs">Employees Record</a>
  <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addEmployee">DTR</button>
  <br>
  <br>
  <form action="<?=site_url('EmployeesRecord/dtr/'.$this->uri->segment(3));?>" method="POST">
    <label>Start Date:</label>
    <input type="date" name="start_date" required="">
    <label>End Date:</label>
    <input type="date" name="end_date" required="">
    <input style="background: gray; color: #fff; border: 2px solid gray;" name="filterDTR" type="submit" value="Filter DTR">
  </form>
  <table class="table table-hover table-bordered" style="border: 1px solid gray; margin-top: 5px;">
    <thead>
      <tr style="background: #3c8dbc;">
        <th>EMP ID</th>
        <th>DATE</th>
        <th>TIME IN</th>
        <th>TIME OUT</th>
        <th>TOTAL HOURS</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($dtr): ?>
        <?php $sum_hours = 0; ?>
        <?php $sum_minutes = 0; ?>
        <?php foreach ($dtr as $key => $d): ?>
          <tr>
            <td style="background: #222d32; color: #fff;"><?php echo $d->emp_id; ?></td>
            <td style="background: #222d32; color: #fff;"><?php echo date('M j, Y',strtotime($d->date)); ?></td>
            <td style="background: #000; color: #fff;"><?php echo $d->t_in; ?></td>
            <td style="background: red; color: #fff;"><?php echo $d->t_out; ?></td>
            <td style="background: green; color: #fff;">
            <?php
              $time_in = date('H:i',strtotime($d->t_in));
              $time_out = date('H:i',strtotime($d->t_out));
              $in = new DateTime($time_in);
              $out = new DateTime($time_out);
              $hours = $in->diff($out)->format('%h');
              $minutes = $in->diff($out)->format('%i');
              if ($d->t_out) {
                if ($hours >= 5) {
                  $minus_one_hour = $hours - 1;
                  echo $minus_one_hour.':'.$minutes;
                  $sum_hours+= $minus_one_hour;
                  $sum_minutes+= $minutes;
                } else {
                  echo $hours.':'.$minutes;
                  $sum_hours+= $hours;
                  $sum_minutes+= $minutes;
                }
              }
            ?> 
            </td>
          </tr>
        <?php endforeach ?>
      <?php else: ?>
        <tr>
          <td colspan="5" style="text-align: center;">No Records Found!</td>
        </tr>
      <?php endif ?>
    </tbody>
  </table>
  <?php 
    $hours = intval($sum_minutes/60);
    $minutes = $sum_minutes - ($hours * 60);
  ?>
  <h1>Total: <strong><?php echo $sum_hours + $hours; ?> hrs. and <?php echo $minutes; ?> mins.</strong></h1>
</section>