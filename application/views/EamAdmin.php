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
        background-image: url('http://onlyfreewallpaper.com/walls/gear-background-wide.jpg');
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
    .uk-login {
      padding: 10px;
      background: #000;
      color: #fff;
      float: left;
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
      <form class="form-horizontal" action="<?=site_url('EamAdmin/login_exec')?>" method="POST">
          <fieldset class="uk-fieldset">
              <legend class="uk-legend">Administrator Login</legend>
              <p id="message" class="uk-text-success"></p>
              <div class="uk-margin">
                  <input class="uk-input" type="text" placeholder="Username:" name="username">
              </div>
              <div class="uk-margin">
                  <input class="uk-input" type="password" placeholder="Password:" name="password">
              </div>
              <div class="uk-margin">
                <input class="uk-login" name="adminLogin" type="submit" value="LOGIN">
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
</html>