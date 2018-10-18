<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Assignment8</title>
        <link rel="stylesheet" type="text/css" href="a8.css">
    </head>
    <body>
        <h1>PHP & MySQL</h1>
        <p> Your data </p>
        <?php
           require ('assignment8connect.php');

          $db = mysqli_connect($dbserver, $dbuser, $dbpass)
                               or die("Coudn't connect to MySQL");
                mysqli_select_db($db, $dbname) 
                               or die("Couldn't select database");
          $query="select * from bank";
          $result= mysqli_query($db, $query);

          while($row = mysqli_fetch_array($result))
          {
            print "<div id='data'>".$row['Name']." : ".$row['Age']." : ".$row['Address']
            ." : ".$row['Balance']."<br></div>";
          }
          
          mysqli_close($db);

        ?>
        <form action="assignment8show.php" method="post">
            <fieldset>
                <legend>Bank </legend>
                <table>
                    <tr>
                      <td>Name: </td><td><input type="text" name="myName"  maxlength="40"  required></td>
                 </tr>
                 <tr>
                      <td>Age: </td><td><input type="number" name="myAge"  maxlength="3" required></td>
                 </tr>
                 <tr>
                      <td>Address: </td><td><input type="text" name="myAddress"  maxlength="200"  required></td>
                 </tr>
                 <tr>
                      <td>Balance: </td><td><input type="number" step="any" name="myBalance" required></td>
                 </tr>
                 </table>
            </fieldset>
            <input type="submit" name="submit" value="Submit">
        </form>
        

    </body>
</html>
