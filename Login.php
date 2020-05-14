<?php
session_start();
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
<form method="post" id="captcha_form">
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
</div>
<div id="snackbar">Some text some message..</div>
</body>

<?php

if (empty($_POST['username'])) {
    return false;
}
if (empty($_POST['password'])) {
    return false;
}

if (
    isset($_POST['password'])
    || isset($_POST['password'])
) {
    $name = $_POST['username'];
    $pass = $_POST['password'];
}

$sql = "SELECT ID  FROM Login WHERE  Username = '$name' and password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "log in successful";

    ?><script>
    <?php echo ("location.href = 'welcome.php'"); ?>
    </script><?php

  } else {

    ?><script>
    <?php echo ('<script type="text/javascript"> myFunction(); </script>'); ?>
    </script><?php
  }

$_SESSION["username"] = $name;
CloseCon($conn);

 ?>


</html>
<script>
$(document).ready(function(){


    $("#captcha_form").on('submit', function(event){
        var recaptcha = $('#g-recaptcha-response').val();
        if (recaptcha =="") {
            event.preventDefault();
            $('#captcha_error').text("Captcha is required");
        }
        event.preventDefault();
        $.post("process_data.php",{
            "secret":"6LdaJ_cUAAAAANiq5Csqa6OWJHv7LrHcVjP1YIsy", 
            "response": recaptcha 
        }, function(ajaxResposne){
            console.log(ajaxResposne);
        }
        });
        // event.preventDefault();
        // $.ajax({
        //     url:"process_data.php",
        //     method:"POST", 
        //     data:$(this).serialize(),
        //     dataType:"json",
        //     beforeSend:function()
        //     {
        //         $('#register').attr('disabled', 'disabled');
        //     },
        //     success:function(data)
        //     {
        //         $('#register').attr('disabled', false);
        //         if (data.success) {
        //             {
        //                 $('#captcha_form')[0].reset();
        //                 $('#username_error').text('');
        //                 $('#password_error').text('');
        //                 $('#captcha_error').text('');
        //                 grecaptcha.reset();
        //                 alert('Form validated');
        //             }
        //             else
        //             {
        //                 $('#username_error').text(data.username_error);
        //                 $('#password_error').text(data.password_error);
        //                 $('#captcha_error').text(data.captcha_error);

        //             }
                }
            }
        })
    });
});
</script>