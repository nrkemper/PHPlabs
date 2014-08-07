<?php
  session_start();

  if(isset($_SESSION['CurrentUser'])){//if the user has logged in before
    header('Location: loginStatus.php');//redirect to the login statues page
  }

  $g_username       = "";
  $g_password       = "";
  
  $successful_login = 0;//flag indicating whether or not to print the form again
  $print_inv_login  = 0;//flag indicating whether or not to print the invalid login message
  $first_time_login = 0;

  if($_POST){
    $g_username = $_POST['username'];
    $g_password = $_POST['password'];

    include 'ext_login.php';              //include the php file with the validate login function	
    
    if(!isset($_SESSION['CurrentUser'])){ //if there is no current session for this user
      
      ValidateLogin();                    //will set the successful_login and print_inv_login flags appopriately
      

      if($successful_login){                   
        $_SESSION['CurrentUser'] = $g_username;       //creates a new session if its a valid login 
        $first_time_login = 1;                        //sets the flag to indicate that the user doesnt have a session going right now
      }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Logins</title>
  <meta charset='UTF-8'>
</head>
<body>
  <?php
    if(!$successful_login && !isset($_SESSION['CurrentUser'])){//if this is the first time viewing this page
      echo "  <form action='login.php' method='POST'>\n";      //or if it was an unsuccessful login attempt
      echo "    <table>\n";
      echo "      <tr>\n";
      echo "        <td>Username:<input type='text' name='username' value='$g_username'/></td>\n";
      echo "        <td>";
      
      if($print_inv_login){
        echo "          <span class='error'>Invalid username or password</span>\n"; 
      }
      
      echo "        </td>\n";
      echo "      </tr>\n";
      echo "      <tr>\n";
      echo "        <td>Password:<input type='password' name='password' value='$g_password'/></td>\n";
      echo "        <td></td>\n";
      echo "     </tr>\n";
      echo "     <tr>\n";
      echo "       <td colspan='2'>\n";
      echo "         <input type='submit' name='submit'/>\n";
      echo "       </td>\n";
      echo "     </tr>\n";  
      echo "   </table>\n";
      echo " </form>\n";
      echo "<a href='forgotpassword.php'>Forgotten Password?</a>\n";
    }
    else if($first_time_login){// if this is the users first time logging in
      echo "<h1>Successful Login</h1>\n";
    }
  ?>
</body>
</html>
