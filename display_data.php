<?php
include 'Db.php';
//include 'employees.json';

$json  = file_get_contents("employees.json"); //read json from URL
$obj = json_decode($json, true); 
?>
<html>
<head>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script src="website.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
  <nav class="nav">
  <a class="nav-link active" href="display_data.php">Display Employee Data</a>
  <a class="nav-link" href="#">Search Employee Data</a>
  <a class="nav-link" href="#">Insert employee data</a>
  <a class="logout nav-link right" href="login.php">Logout</a>

</nav>
  </div>
  </div>
<div class="container">
<div class="row">
<table class="table">
<thead class="thead-dark">
<tr>
            <th scope="col">ID</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
          </tr>
        </thead>
        <tbody>
     <?php
      if($obj != null)
      { 
        for ($i=0;$i<count($obj);$i++){
            $vals= $obj[$i];
            ?>
            <tr>
            <td><?php print $vals["id"] ?></td>
            <td><?php print $vals["firstname"] ?></td>
            <td><?php print $vals["lastname"] ?></td>
          </tr>
          <?php
        }
    }
    ?>


        
        
         
          
        </tbody>
      </table>

</div>
</div>


</body>
</html>