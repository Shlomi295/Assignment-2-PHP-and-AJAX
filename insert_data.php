<?php
   include 'Db.php';
   
   $json  = file_get_contents("employees.json"); 
   $obj = json_decode($json, true); 

   $name = $_GET['name'];
   $last = $_GET['last'];

   
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
         <div class="row">

         <form action="add_data.php" method="post">             
            <div class="form-group">
              <div class="select-source input-group" >
                  <div class="input-group-prepend">
                     <span class="input-group-text">Id</span>
                  </div>
                  <input name="id" type="number" aria-label="Id" class="form-control" required="required">
               </div>
               <div class="select-source input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text">First and last name</span>
                  </div>
                  <input name="firstname" type="text" aria-label="First name" class="form-control" required="required">
                  <input name="lastname" type="text" aria-label="Last name" class="form-control" required="required">
               </div>
               <div class="select-source input-group mb-3">
                  <div class="input-group-prepend">
                     <label class="input-group-text" for="inputGroupSelect01">Source</label>
                  </div>
                  <select name="source" class="custom-select" id="inputGroupSelect01">
                     <option required="required" selected>Choose Source To Insert Data</option>
                     <option value="1">Json File</option>
                     <option value="2">Database</option>
                  </select>
               </div>
             </div>
             <input class="btn btn-primary btn-insert" type="submit" value="Submit"/>

            </form>
          
         
         </div>
         <div class="row">
         <?php
              if ($name != null && $last != null) {              
                ?>
                <h5><?php print $name. " " . $last?> added successfully</h5>
                <?php
              }
            ?>
         </div>
      </div>
      
      <footer class="footer">
         <p id="footer-text">Shlomi Moreh</p>
      </footer>
   </body>
</html>