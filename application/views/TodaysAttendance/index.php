<section class="content">
  <strong>Today's Attendance</strong>
  <p><?php echo $date ?></p>
  <div class="row">
    <div class="col-md-6">
      <h4 class="time-in">TIME IN</h4>
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>EMP ID</th>
            <th>FULLNAME</th>
            <th>TIME IN</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($todays_time_in_attendance): ?>
            <?php foreach ($todays_time_in_attendance as $key => $ta): ?>
              <tr>
                <td><?php echo $ta->emp_id; ?></td>
                <td style="text-transform: uppercase;"><?php echo $ta->l_name; ?>, <?php echo $ta->f_name; ?> <?php echo $ta->m_name; ?></td>
                <td><?php echo $ta->time_in; ?></td>
              </tr>   
            <?php endforeach ?>
          <?php else: ?>
              <tr>
                <td colspan="4">No Time In!</td>
              </tr>
          <?php endif ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <h4 class="time-out">TIME OUT</h4>
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>EMP ID</th>
            <th>FULLNAME</th>
            <th>TIME OUT</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($todays_time_out_attendance): ?>
            <?php foreach ($todays_time_out_attendance as $key => $ta): ?>
              <tr>
                <td><?php echo $ta->emp_id; ?></td>
                <td style="text-transform: uppercase;"><?php echo $ta->l_name; ?>, <?php echo $ta->f_name; ?> <?php echo $ta->m_name; ?></td>
                <td><?php echo $ta->time_out; ?></td>
              </tr>   
            <?php endforeach ?>
          <?php else: ?>
              <tr>
                <td colspan="4">No Time Out!</td>
              </tr>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<style>
  .time-in {
    background: #000;
    padding: 5px;
    color: #fff;
  }
  .time-out {
    background: #FF0000;
    padding: 5px;
    color: #fff;
  }
</style>