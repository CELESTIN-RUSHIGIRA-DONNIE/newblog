 <?php

$host = "localhost";
$username = "root";
$password = "";
$database = "blog";

$con = mysqli_connect("$host", "$username", "$password","$database");
if(!$con)
{
    header("location: ../errors/dberror.php"); 
    die();
}

?>