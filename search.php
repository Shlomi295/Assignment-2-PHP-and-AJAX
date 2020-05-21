<?php
include 'Db.php';

$conn = OpenCon();

$q = $_REQUEST['q'];

$jsonString = file_get_contents('employees.json');
$jsonArray = json_decode($jsonString, true);
$values = (array) $jsonArray;
$Array = array();

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    for($x = 0; $x < count($jsonArray); $x++){
        if (stristr($q, substr($jsonArray[$x]['firstname'], 0, $len))) {
           
              $Array[] = $jsonArray[$x];
          }
         else if (stristr($q, substr($jsonArray[$x]['lastname'], 0, $len))) {
            $Array[] = $jsonArray[$x];
        }
    }
  } 
  
if ($q != ""){
$query = "SELECT * FROM Employees WHERE FirstName LIKE '$q%' Or LastName LIKE '$q%'";
$result = ociparse($conn, $query);
   
if (!$result) {
  echo "An error occurred in parsing the SQL string".$result.".$query.\n";
  exit;
}
OCIExecute($result);
}

echo "<table class='table'>
<thead class='thead-dark'>
<tr>
<th>Id</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Source</th>
</tr>";



while(OCIFetch($result)){
    $id = OCIResult($result, 'ID');
    $firstName = OCIResult($result, 'FirstName');
    $lastName = OCIResult($result, 'LastName');
    echo "<tr>";
    echo "<td>" . print $id . "</td>";
    echo "<td>" . print $firstName . "</td>";
    echo "<td>" . print $lastName . "</td>";
    echo "<td>Database</td>";
    echo "</tr>";
} 

for($x = 0; $x < count($Array); $x++){
    echo "<tr>";
    echo "<td>" . $Array[$x]['id'] . "</td>";
    echo "<td>" . $Array[$x]['firstname'] . "</td>";
    echo "<td>" . $Array[$x]['lastname'] . "</td>";
    echo "<td>Json</td>";
    echo "</tr>";}

?>
