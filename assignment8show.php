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
$mName = $_POST["myName"];
$mAge = $_POST["myAge"];
$mAddress = $_POST["myAddress"];
$mBalance = $_POST["myBalance"];

require ('assignment8connect.php');

$db = mysqli_connect($dbserver, $dbuser, $dbpass)
        or die("Coudn't connect to MySQL");

mysqli_select_db($db, $dbname) 
        or die("Couldn't select database");

 $rowInsert="insert into bank values('$mName', '$mAge', '$mAddress', '$mBalance')"; 

if (mysqli_query($db, $rowInsert))
{
    print "Insert successful <br>";
}
        
else
{
    print "Insert failed".mysqli_error($db)."<br>";
}

   $query="select * from bank";

   $result= mysqli_query($db, $query);

   while($row = mysqli_fetch_array($result))
   {
    print "<div id='data'>".$row['Name']." : ".$row['Age']." : ".$row['Address']
            ." : ".$row['Balance']."<br></div>";
   }

mysqli_close($db);

?>
</body>
</html>

