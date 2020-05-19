<?php
   include('Db.php');
   header("Access-Control-Allow-Origin: *");
   header("Content-Type: application/json; charset=UTF-8");


   $conn = OpenCon();
   
   $id = $_POST['id'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $source = $_POST['source'];

   if ($source == 1){

        $data = new \stdClass();
        $data->id = $id;
        $data->firstname = $firstname;
        $data->lastname = $lastname;

        $jsonstring = json_encode($data, true);

        $objarray = json_decode($jsonstring, true);

        $json = file_get_contents('employees.json');
        $jsonarray = json_decode($json,true);
        
        // append the array at the end of the json array
        array_push($jsonarray,$objarray);

        //save json file
        if ($jsonarray != NULL)
        {

            saveToFile(json_encode($jsonarray),'employees.json');
        }
        else{
            $result = "There was something wrong and the Result is empty";
        }

        redirect_to('insert_data.php?name='.$firstname.'&last='.$lastname);
    }

    else if ($source == 2)
    {
        $query = "INSERT INTO Employees VALUES ('$id','$firstname','$lastname')";

        $result = OCIParse($conn, $query);
   
        if (!$result) {
            echo "An error occurred in parsing the SQL string".$result.".$query.\n";
            exit;
        }
        OCIExecute($result);
        
        redirect_to('insert_data.php?name='.$firstname.'&last='.$lastname);

    }

?>
