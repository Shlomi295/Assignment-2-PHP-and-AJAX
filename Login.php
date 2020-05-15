<?php
session_start();
if(!empty($_SESSION['message'])) {
   $message = $_SESSION['message'];
}
include 'Db.php';

$conn = OpenCon();
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script src="website.js"></script>


<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6LdaJ_cUAAAAANiq5Csqa6OWJHv7LrHcVjP1YIsy'
        });
      };
    </script>
</head>

<body>
<div class="container">   
<form method="post" id="captcha_form" action="process_data.php">
  <div class="form-group col-md-6 login-input">
    <label class="col-form=lbl col-form-lbl-sm" for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter UserName" required="required" >
    <span id="username_error" class="text-danger"></span>
  </div>
  <div class="form-group col-md-6 login-input">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required" minlength="5">
    <span id="password_error" class="text-danger"></span>
  </div>
  <div class="g-recaptcha" data-sitekey="6LdaJ_cUAAAAANiq5Csqa6OWJHv7LrHcVjP1YIsy"></div>
      <span id="captcha_error" class="text-danger"></span>
<div class="form-group" col-md-6>
<button id="register" type="submit" class="btn btn-primary btn-submit">Submit</button>
</div>
</form>
      <?php 
      if($_GET != null && $_GET['message'] == 'failed')
      {
        echo '<h3>Username or Password are incorrect</h3>';
      }

      ?>
</div>
<div id="snackbar">Some text some message..</div>
</body>

<?php
session_destroy();