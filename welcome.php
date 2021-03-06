<?php
include 'Db.php';

$json  = file_get_contents("employees.json"); 
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
    <a class="nav-link home" href="welcome.php">Home</a>
    <a class="nav-link active" href="display_data.php">Display Employee Data</a>
    <a class="nav-link" href="search_data.php">Search Employee Data</a>
    <a class="nav-link" href="insert_data.php">Insert employee data</a>
    <a class="logout nav-link right" href="login.php">Logout</a>
</nav>
  </div>

</div>
<div class="container">
<div class="jumbotron">
  <h1 class="display-4">Hello, SIT780!</h1>
  <p class="lead">This is the website for Assignment 2, due on the 29/05/2020</p>
  <hr class="my-4">
  <p>It uses PHP and Ajax calls and also combine different data sources from Json files and Database tables.</p>
  <a class="btn btn-primary btn-lg" href="https://d2l.deakin.edu.au/d2l/le/content/880701/viewContent/4983563/View" role="button">Learn more</a>
</div>
</div>
<footer class="footer">
    <p id="footer-text">Shlomi Moreh</p>
</footer>
</body>
</html>