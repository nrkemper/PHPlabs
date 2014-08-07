<?php
  session_start();

  if($_POST){          //if the user hit the logout button
    setcookie("PHPSESSID", "", time() - 1, "/");
    session_destroy();
    header('Location: login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome Back</title>
  <meta charset='UTF-8'/>
</head>
<body>
  <?php
    if(isset($_SESSION['CurrentUser'])){
      echo "<h1>Welcome back " . $_SESSION['CurrentUser'] . "</h1><br/>\n";
      echo "<form action='loginStatus.php' method='POST'>\n";
      echo "<input type='submit' name='submit' value='Logout'><br/>\n";
      echo "</form><br/>\n";
    }
    else{
      echo "You are not logged in. Please hit the link below to login<br/>\n";
      echo "<a href='login.php'>Go Back</a><br/>\n";
    }
  ?>
</body>
</html>
