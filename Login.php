<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css">

<php 
   include("Db.php");



   

?>
</head>

<body>

<php 
$result = callDb('SELECT * FROM Login');

$dbuser = "smoreh";
$dbpass = "M0reh295";
$db = "SSID";
$connect = OCILogon($dbuser, $dbpass, $db);
if (!$connect) {
    echo "An error occurred connecting to the database";
    exit;
}

?>

<div class="container">   
<form action="login.php" method="POST">
  <div class="form-group col-md-6 login-input">
    <label class="col-form=lbl col-form-lbl-sm" for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group col-md-6 login-input">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
<div class="form-group" col-md-6>
<button type="submit" class="btn btn-primary">Submit</button>

</div>
</form>
</div>
</body>

<?php

if (empty($_POST['username'])) {
    echo "UserName/Password is empty!";
    return false;
}
if (empty($_POST['password'])) {
    echo "Password is empty!";
    return false;
}

$query = "SELECT ID  FROM Login WHERE  Username = :USERNAME and password = :PASSWORD";

$stmt = OCIParse($connect, $query);
if (!$stmt) {
    echo "An error occurred in parsing the SQL string.\n";
    exit;
}

if (
  isset($_POST['password'])
  || isset($_POST['password'])
) {
  $name = $_POST['username'];
  $pass = $_POST['password'];
}
oci_bind_by_name($stmt, ':USERNAME', $name);
oci_bind_by_name($stmt, ':PASSWORD', $pass);

OCIExecute($stmt);

if ($row) {
  $_SESSION['user'] = $_POST['user'];
  echo "log in successful";
} else {
  echo ("The person " . $name . " is not found .
      Please check the spelling and try again or check password");
  exit;
}

$ID = $row['ID'];
oci_free_statement($stmt);
oci_close($connect);
echo $_GET['redirect'];


$_SESSION["username"] = $name;
?><script>
    <?php echo ("location.href = 'https://personal-sites.deakin.edu.au/~smoreh/sit780/Week03/welcome.php'"); ?>
</script><?php

?>

