<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daily Attendance</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/css/uikit.min.css" />
  <style>
    html, body {
        background-image: url('https://s-media-cache-ak0.pinimg.com/originals/31/89/5c/31895c6d98d191a2b77c40dda4ab9d2a.jpg');
        background-color: #cccccc;
        background-repeat: no-repeat;
        background-position: right top;
    }
    h1 {
      color: #fff;
    }
    .uk-legend {
      color: #fff;
    }
    .uk-time-in {
      padding: 10px;
      background: #000;
      color: #fff;
    }
    .uk-time-out {
      padding: 10px;
      background: red;
      color: #fff;
    }
    .uk-form {
      padding-top: 200px;
    }
    .uk-form-div {
      background: rgba(73, 77, 80, 0.8);
      border-radius: 20px;
    }
  </style>
</head>
<body>
<div class="uk-container">
  <div class="uk-form">
    <div class="uk-width-1-2 uk-align-center uk-padding-small uk-form-div">
      <h1>Facebook</h1>
      <form class="form-horizontal" method="POST">
          <fieldset class="uk-fieldset">
              <legend class="uk-legend">Daily Attendance</legend>
              <p id="message" class="uk-text-success"></p>
              <div class="uk-margin">
                  <input class="uk-input" type="text" placeholder="Empoyee ID:" name="emp_id" id="emp_id">
              </div>
              <div class="uk-margin">
                  <input class="uk-input" type="password" placeholder="Password:" name="password" id="password">
              </div>
              <div class="uk-margin">
                <button class="uk-time-in" name="time_in" id="time_in">TIME IN</button>
                <button class="uk-time-out" name="time_out" id="time_out">TIME OUT</button>
              </div>
          </fieldset>
      </form>
    </div>
  </div>
</div>
</body>
<!-- <script src="<?=assets_url('PrivateTemp/js/jquery-2.2.3.min.js')?>"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/js/uikit-icons.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#time_in').on('click', function(e) {
    e.preventDefault();
    let data = {
      emp_id: $('#emp_id').val(),
      password: $('#password').val()
    }
    $.ajax({
      type: 'POST',
      url: '<?=site_url('DailyAttendance/time_in')?>',
      data: data,
      success: function(res) {
        let dataRes = JSON.parse(res);
        $('#message').text(dataRes.message);
      }
    })
  })
  $('#time_out').on('click', function(e) {
    e.preventDefault();
    let data = {
      emp_id: $('#emp_id').val(),
      password: $('#password').val()
    }
    $.ajax({
      type: 'POST',
      url: '<?=site_url('DailyAttendance/time_out')?>',
      data: data,
      success: function(res) {
        let dataRes = JSON.parse(res);
        $('#message').text(dataRes.message);
      }
    })
  })
})
</script>
</html>