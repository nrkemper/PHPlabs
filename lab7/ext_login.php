<?php
  function ValidateLogin(){  #verifies that the username and password that the user has entered is in the database
    global $g_username;
    global $g_password;
    global $successful_login;
    global $print_inv_login;

    $cnx = mysql_connect("db-mysql", "int322_133b40", "cmXA6279") or die(mysql_error() . " Could not connect to database");
    mysql_select_db("int322_133b40") or die(mysql_error() . " could not select database");

    $select_logins="SELECT Username, Password FROM Users";
    $result=mysql_query($select_logins) or die(mysql_error() . " the query was: $select_logins");

    while($row=mysql_fetch_assoc($result)){
      if($row['Username'] == $g_username && $row['Password'] == $g_password){
        $successful_login=1;
      } 
    }
    
    mysql_close($cnx);

    $print_inv_login=!$successful_login;//prints the invalid login error message if its an unsuccessful attempt to login
  }

  class Logins{
    private $_cnx;
    function __constructor($server, $username, $password, $database){
      $_cnx = mysql_connect($server, $username,  $password);
      //try prompting for password
      $mysql_select_db($database, $_cnx);
    }

    function __destructor(){
      mysql_close($_cnx);
    }
  }
?>
