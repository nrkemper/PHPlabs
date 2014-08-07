<?php
  class Database{
    private $_cnx;
    public function __construct($server, $username, $password, $database){//connects to the database with the username, password, server and database
      $this->_cnx = mysql_connect($server, $username,  $password) or die("Could not connect to server");         //arguments
      mysql_select_db($database, $this->_cnx) or die("Could not select database");
    }

    public function ValidateLogin($username, $password){//validates that the login exists in the database
      $successful_login=0;

      $select_logins="SELECT Username, Password FROM Users";
      $result=mysql_query($select_logins, $this->_cnx) or die(mysql_error() . " the query was: $select_logins");

      while($row=mysql_fetch_assoc($result)){
        if($row['Username'] == $username && $row['Password'] == $password){
          $successful_login=1;
        } 
      }

      return $successful_login;
    }

    public function SendPassword($email){
      $email_found=0;
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
      return $email_found;
    }

    function __destruct(){
      mysql_close($this->_cnx);
    }
  }
?>
