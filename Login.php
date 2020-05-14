<?php
session_start();
include 'Db.php';

$conn = OpenCon();
echo "Connected Successfully";
CloseCon($conn);
?>

<!DOCTYPE html>
<html>

<!-- <?php


/* Set oracle user login and password info */
// $dbuser = "smoreh";
// /* xxxxx must be replaced with your actual Deakin    username */
// $dbpass = "M0reh295";
// /* xxxxx must be replaced with your actual Oracle    database password, which is your Deakin    password by default */
// $db = "SSID";
// $connect = OCILogon($dbuser, $dbpass, $db);
// if (!$connect) {
//     echo "An error occurred connecting to the database";
//     exit;
// }



?> -->

<body>
<div class="container">   
<form action="login.php" method="POST">
  <div class="form-group col-md-6 login-input">
    <label class="col-form=lbl col-form-lbl-sm" for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group col-md-6 login-input">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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

if (
    isset($_POST['password'])
    || isset($_POST['password'])
) {
    $name = $_POST['username'];
    $pass = $_POST['password'];
}
oci_bind_by_name($stmt, ':USERNAME', $name);
oci_bind_by_name($stmt, ':PASSWORD', $pass);


$query = "SELECT ID  FROM Login WHERE  Username = :USERNAME and password = :PASSWORD";

$stmt = OCIParse($connect, $query);
if (!$stmt) {
    echo "An error occurred in parsing the SQL string".$stmt.".$query.\n";
    exit;
}


OCIExecute($stmt);


$row = oci_fetch_array($stmt, OCI_ASSOC);

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

</html>