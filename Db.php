<?php

function connectToDb(){
   $dbuser = "smoreh";
   $dbpass = "M0reh295";
   $db = "SSID";

   $connect = OCILogon($dbuser, $dbpass, $db);
   if(!$connect) {
       echo "An error occurred connecting to the database";
   }


}

?>