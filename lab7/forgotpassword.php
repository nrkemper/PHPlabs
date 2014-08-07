<?php
  /*---------   function declarations ---------*/
  
  function FindEmail(){
    global $g_email;
    $email_found=0;

    $cnx = mysql_connect("db-mysql", "int322_133b40", "cmXA6279") or die(mysql_error() . " could not connect to server");
    mysql_select_db("int322_133b40") or die(mysql_error() . " could not select database");
    $result = mysql_query("SELECT Username, Password, Email FROM Users WHERE Email='$g_email'")
                       or die(mysql_error() . " could not select email");

    while($row = mysql_fetch_assoc($result)){
      if($row['Email'] == $g_email){//they WILL be the same if the email exists in the database
        $msg  = "Someone has requested their email and password\n"; 
        $msg .= "Username: " . $row['Username'] . "\n";
        $msg .= "Password: " . $row['Password'] . "\n";
   
        mail($g_email, "Forgotten Password", $msg); #mails the email if the email is found
        $email_found=1;
      }
    }
    /*if($email_found){
      echo "<script>alert('found email')</script>";
    }
    else{
      echo "<script>alert('didnt find email')</script>";
    }*/
    return $email_found; 
  }

  //-------  program begins ----------
 

  if($_POST){                   #if the user has entered an email
    $g_email = $_POST['email'];
 
    FindEmail();                #scan the database for a valid email
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
