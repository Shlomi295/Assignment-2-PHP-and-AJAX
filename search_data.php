<?php
include 'Db.php';

$json  = file_get_contents("employees.json"); 
$obj = json_decode($json, true); 
?>
<html>
<head>
<script src="https://kit.fontawesome.com/23a42a63cf.js" crossorigin="anonymous"></script>
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
            <div>
                <nav class="nav">
                    <a class="nav-link home" href="welcome.php">Home</a>
                    <a class="nav-link active" href="display_data.php">Display Employee Data</a>
                    <a class="nav-link" href="search_data.php">Search Employee Data</a>
                    <a class="nav-link" href="insert_data.php">Insert employee data</a>
                    <a class="logout nav-link right" href="login.php">Logout</a>
                </nav>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <form class="form-inline">
            <i class="fas fa-search"></i>
            <div class="form-group mb-2">
                        </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="search" class="sr-only">Search</label>
                <input type="text" class="form-control" id="search" placeholder="First or Last name" required = "required" onkeyup="showHint(this.value)">
            </div>

            <!-- <button onsubmit="search()" type="submit" class="btn btn-primary mb-2">Search</button> -->
        </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
            <thead class="thead-dark">
                    <tr>
                     <th scope="col">ID</th>
                     <th scope="col">First</th>
                     <th scope="col">Last</th>
                  </tr>
                <tr>
                <td id="searchid"></td><td id="searchfirstname"></td><td id="searchlastname"></td>


                </tr>
            </table>
        </div>
    </div>
</div>
<footer class="footer">
    <p id="footer-text">Shlomi Moreh</p>
</footer>
</body>

<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("searchid").innerHTML = "";
    document.getElementById("searchfirstname").innerHTML = "";
    document.getElementById("searchlastname").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var obj = JSON.parse(this.responseText);

        for (i = 0; i < obj.length; i++) {
            document.getElementById("searchid").innerHTML = obj[i].id;
            document.getElementById("searchfirstname").innerHTML = obj[i].firstname;
            document.getElementById("searchlastname").innerHTML = obj[i].lastname;
            }
        }
        
      }
    };
    xmlhttp.open("GET", "search.php?q=" + str, true);
    xmlhttp.send();
  }

</script>
</html>