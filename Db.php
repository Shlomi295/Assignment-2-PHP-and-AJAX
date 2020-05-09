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

?>