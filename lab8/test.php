<?php
session_start();
  $username            = "nick";
  $password            = "bob";
  $valid_login         = 0;
  $print_error_message = 0;
  if($_POST){
    if($username == $_POST['username'] && $password == $_POST['password']){//if the username and password are valid
      echo "<script>alert('Passwords match');</script>";
      $_SESSION['CurrentUser'] = $_POST['username'];
      $valid_login = 1;
    } 
    else{
      echo "<script>alert('Password dont match');</script>";
      $print_error_message = 1;
    }
  }   
?>
<!DOCTYPE html>
<html>
<head>
  <title>Test</title>
  <meta charset='UTF-8'>
</head>
<body>
  <?php
    if(!$valid_login && !isset($_SESSION['CurrentUser'])){//if this is the first time logging in
      echo "<form action='test.php' method='POST'>";
      echo "Username:<input type='text' name='username'>";
      if($print_error_message){
        echo "Invalid Loggin"; 
      }
      echo "<br/>";
      echo "Password:<input type='text' name='password'><br/>";
      echo "<input type='submit' name='submit'><br/>";
      echo "</form>"; 
    }
    else if($valid_login && !isset($_SESSION['CurrentUser'])){ //it is a successful login
      echo "Successful login<br/>";
    }
    else if(!$valid_login && isset($_SESSION['CurrentUser'])){ //the user has logged in before
      echo "Welcome back<br/>"; 
    }


    ##testing criteria. 
    echo "The current user is: " . $_SESSION['CurrentUser'] . "<br/>";
    echo "Valid_login: $valid_login<br/>";
    echo "Is set \$_SESSION['CurrentUser']: ";
     if(isset($_SESSION['CurrentUser'])){
      echo "true";
     }
     else{
      echo "false";
     } 
     echo "<br/>";
    echo "print error message: " . $print_error_message . "<br/>";
    echo "username: $username<br/>";
    echo "password: $password<br/>";
    echo "username entered: " . $_POST['username'] . "<br/>";
    echo "password entered: " . $_POST['password'] . "<br/>";
  ?>
</body>
</html>
