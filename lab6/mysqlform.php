<!DOCTYPE html>
<html>
<head>
  <title>SQL Practice</title>
  <meta charset='UTF-8'>
  <style>
    .error { color: red; }
    .GamesTable { border: 2px solid black; }
    .output { border: 2px solid black; }
  </style>
  <?php
    if($_POST && $_POST['name'] != "" && $_POST['description'] != "" && isset($_POST['rating']) && isset($_POST['score'])){
      
      $cnx = mysql_connect("db-mysql", "int322_133b40", "cmXA6279") or die("Could not connect: " . mysql_error());
 
      mysql_select_db("int322_133b40", $cnx) or die("Could no select database int322_133b40");
      	
      $insert_values = "INSERT INTO Games (name, description, rating, score) VALUES ( \"" . $_POST['name'] . "\", \"" . $_POST['description'] . "\",  \"" . $_POST['rating'] . "\" , " . $_POST['score'] . ");";


      $result = mysql_query($insert_values) or die(mysql_error(). "The query was: " . $insert_values);

      mysql_close($cnx);
    }
    function PrintErrorText(){
      echo "<span class='error'>***Cannot Be Blank***</span>";
    }
    function PrintErrorRadio(){
      echo "<span class='error'>***No value selected***</span>";
    }
  ?>
</head>
<body>
  <form action='mysqlform.php' method='POST'>
    <table>
      <tr>
        <td colspan='3'>
          <h1>Giant Boom -1.5</h1><br/>
        </td>
      </tr>
      <tr>
        <td>Enter Game Name:</td>
        <td><input type='text' name='name' maxlength='30'>
        <td>
          <?php
            if($_POST && $_POST['name']==""){
              PrintErrorText();
            }
          ?>
        </td>
      </tr>
      <tr>
        <td>Enter Description:</td>
        <td><textarea name='description' rows='5' cols='100'  maxlength='250'></textarea>
        <td>
          <?php
            if($_POST && $_POST['description']==""){
              PrintErrorText();
            }
          ?>
        </td>
      </tr>
      <tr>
        <td>Enter Rating(M, 18+, G):</td>
        <td>
          <input type='radio' name='rating' value='EC' checked='checked'>EC (Early Childhood)<br/>
          <input type='radio' name='rating' value='E'>E (Everyone)<br/>
          <input type='radio' name='rating' value='E10+'>E10+ (Everyone 10+)<br/>
          <input type='radio' name='rating' value='T'>T (Teen)<br/>
          <input type='radio' name='rating' value='M'>M (Mature)<br/>
          <input type='radio' name='rating' value='A'>A (Adults Only)<br/>
          <input type='radio' name='rating' value='RP'>RP (Rating Pending)<br/>
        </td>
        <td>
          <?php
            if($_POST && !isset($_POST['rating'])){
              PrintErrorRadio();
            }
          ?>
        </td>
      </tr>
      <tr>
        <td>
          Enter Score:
        </td>
        <td>
          <input type='radio' name='score' value='1' checked='checked'>1<br/>
          <input type='radio' name='score' value='2'>2<br/>
          <input type='radio' name='score' value='3'>3<br/>
          <input type='radio' name='score' value='4'>4<br/>
          <input type='radio' name='score' value='5'>5<br/>
          <input type='radio' name='score' value='6'>6<br/>
          <input type='radio' name='score' value='7'>7<br/>
          <input type='radio' name='score' value='8'>8<br/>
          <input type='radio' name='score' value='9'>9<br/>
          <input type='radio' name='score' value='10'>10<br/>
        </td>
        <td>
          <?php
            if($_POST && !isset($_POST['score'])){
              PrintErrorRadio();
            }
          ?>
        </td>
      </tr>
      <tr>
        <td colspan='2'>
          <input type='submit' value='Submit'>
        </td>
      </tr>
    </table>
  </form>
  <?php  #need an option to show database
    if($_POST){
      $cnx = mysql_connect("db-mysql", "int322_133b40", "cmXA6279") or die("Could not connect to " . mysql_error());
      mysql_select_db("int322_133b40", $cnx);
 
      mysql_query("use int322_133b40") or die("Could not select database");
    
      $query = "SELECT * from Games";
    
      $result = mysql_query($query);
      echo "<table class='GamesTable'>\n";
      echo "<tr>\n";
      echo "<th>Name</th>\n";
      echo "<th>Description</th>\n";
      echo "<th>Rating</th>\n";
      echo "<th>Score</th>\n";
      echo "</tr>\n";
      
      while($row = mysql_fetch_assoc($result)){
        echo "<tr>\n";
        echo "<td class='output'>" . $row['name']        . "</td>\n";
        echo "<td class='output'>" . $row['description'] . "</td>\n";
        echo "<td class='output'>" . $row['rating']      . "</td>\n";
        echo "<td class='output'>" . $row['score']       . "</td>\n";
        echo "</tr>\n";
      }
      echo "</table>\n";
      mysql_free_result($result);
      mysql_close($cnx);
    }
  ?>
  <a href='mysqlform.php'>Main Form</a>
</body>
</html>
