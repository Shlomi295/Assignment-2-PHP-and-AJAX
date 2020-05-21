<?php
include 'Db.php';

$conn = OpenCon();

$q = $_REQUEST['q'];
$hint = "";

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
//  $response = json_decode($Array, true);

echo "<table>
<tr>
<th>Id</th>
<th>Firstname</th>
<th>Lastname</th>
</tr>";
$a = 0;
for($x = 0; $x < count($Array); $x++){
    echo "<tr>";
    echo "<td>" . $Array[$x]['id'] . "</td>";
    echo "<td>" . $Array[$x]['firstname'] . "</td>";
    echo "<td>" . $Array[$x]['lastname'] . "</td>";
    echo "</tr>";}
  //echo $response === "" ? "no suggestion" : $response;

?>