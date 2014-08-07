<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'/>
  <title>Lab 05</title>
  <style>
    td.Header   {  font-size: 24px;
                   font-weight: bold;
                   text-align: center;
                }
    td.leftcol  {  font-size: 16px;
                   text-align: right;
                }
    td.rightcol {  font-size: 16px;
                   text-align: left;
                }
    td.submit   {  text-align: center;
  </style> 
</head>
<body>
  <form action='' method='post'>
    <table>
      <tr>
        <td class='Header' colspan='2'>FSOSS Registration</td>
      </tr>
      <tr>
        <td class='leftcol'>First Name:</td>
        <td class='rightcol'><input type='text' name='FName'></td>
      </tr>
      <tr>
        <td class='leftcol'>Last Name:</td>
        <td class='rightcol'><input type='text' name='LName'></td>
      </tr>
      <tr>
        <td class='leftcol'>Organization:</td>
        <td class='rightcol'><input type='text' name='Organization'></td>
      </tr>
      <tr>
        <td class='leftcol'>Email Address:</td>
        <td class='rightcol'><input type='text' name='Email'></td>
      </tr>
      <tr>
        <td class='leftcol'>Phone Number:</td>
        <td class='rightcol'><input type='text' name='Phone'></td>
      </tr>
      <tr>
        <td class='leftcol'>T-shirt Size:</td>
        <td class='rightcol'>
          <select name='Tshirt'>
            <option value='NoneSelected'>--Please Choose--</option>
            <option value='Small'>Small</option>
            <option value='Medium'>Medium</option>
            <option value='Large'>Large</option>
            <option value='X-Large'>X-Large</option>
          </select>
        </td>
      </tr>
      <tr>
        <td class='submit' colspan='2'><input type='submit' value='Register'></td>
      </tr>
    </table>
  </form>
  <?php
    date_default_timezone_set('America/Toronto');
    echo date('l F jS\, Y h:i:s A');
  ?>
</body>
</html>
