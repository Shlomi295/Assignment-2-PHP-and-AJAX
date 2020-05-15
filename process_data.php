<?php
include 'Db.php';

session_start();
$conn = OpenCon();

        $username;$password;$captcha;
        if(isset($_POST['username'])){
        $username=$_POST['username'];
        }
        if(isset($_POST['password'])){
        $password=$_POST['password'];
        }
        if(isset($_POST['g-recaptcha-response'])){
        $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
        echo '<h2>Please check the the captcha form.</h2>';
        exit;
        }


        $secretKey = "6LdaJ_cUAAAAANx7THOX9A9hMkhJ3EVjzt-R6tSe";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if($responseKeys["success"]) 
        {
            $data = array('success' =>true);
        } 
        else 
        {
            $data = array('success' =>false);
            echo $data; 
        }   
     
        $sql = "SELECT ID  FROM Login WHERE  Username = '$username' and password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0 && $data['success'] == true) {
            echo "<h3>log in successful</h3>";
            $_SESSION['message'] = 'success';

            redirect_to('welcome.php');

        }
        else 
        {
            $_SESSION['message'] = 'failed';
            redirect_to('login.php?message='.$_SESSION['message']);
        }
    
           
?>
