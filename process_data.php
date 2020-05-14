<?php 

$secret= $_POST["secret"];
$response = $_POST["response"];
$url = "https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$response";
$verify = file_get_contents($url);
echo $verify;
// if (isset($_POST['username'])) 
// {
//     $username = '';
//     $password = '';

//     $username_error = '';
//     $password_error = '';
//     $captcha_error = '';
// }

// if (empty($_POST['username'])) {
//     $username_error = 'Username is required';
// }
// else
// {
//     $name = $_POST['username'];
// }

// if (empty($_POST['password'])) 
// {
//     $password_error = 'Password is required';
// }
// else
// {
//     $pass = $_POST['password'];
// }

// if (empty($_POST['g-recaptcha-response'])) 
// {
//     $captcha_error = 'Captcha is required';
// }
// else
// {
//     $secret_key = '6LdaJ_cUAAAAANx7THOX9A9hMkhJ3EVjzt-R6tSe';
//     $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);

//     $response_data = json_decode($response);

//     if (!$response_data->success) {
//         $captcha_error = 'Captcha verification failed';  
//     }
// }

// if($username_error == '' && $password_error == '' && $captcha_error == ''){
//     $data = array(
//         'success' =>true
//     );
// }
// else
// {
//     $data = array(
//         'username_error' => $username_error,
//         'password_error' => $password_error,
//         'captcha_error' => $captcha_error
//     );
// }
// echo json_encode($data);

?>