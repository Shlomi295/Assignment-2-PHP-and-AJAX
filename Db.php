<?php

function callDb($query){
   $dbuser = "smoreh";
   $dbpass = "M0reh295";
   $db = "SSID";

   $connect = OCILogon($dbuser, $dbpass, $db);
   if(!$connect) {
       echo "An error occurred connecting to the database";
   }

   $stmt = OCIParse($connect, $query);
   if(!$stmt) {
       echo "An error occurred in parsing the SQL string.\n";
       exit;
   } OCIExecute($stmt);
}


function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "1234";
 $db = "example";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }

 function CloseCon($conn)
 {
 $conn -> close();
 }
?>