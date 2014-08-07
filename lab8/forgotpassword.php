<?php
  if($_POST){                   #if the user has entered an email
    $g_email = $_POST['email'];
 
    include 'ext_login.php';
    $database = new Database("db-mysql", "int322_133b40", "cmXA6279", "int322_133b40");

    $database->SendPassword($g_email);                #scan the database for a valid email
  
    header("Location: login.php"); # regardless of whether or not the user entered a valid email return to the login page
  }  
?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <meta charset='UTF-8'>
</head>
<body>
  <form action='forgotpassword.php' method='POST'>
    Email:<input type='text' name='email'/><br/>
    <input type='submit' name='submit'/>
  </form> 
</body>
</html>
