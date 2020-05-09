<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>

    <php 
   include('Db.php');

   $result = callDb('SELECT * FROM Login');

   

?>
</head>

<body> 
    <p>Login page</p>
    <p> 
    <php
    while(OCIFetch($result))
   {
       echo $result;
   }
     ?>
    </p>
</body>
