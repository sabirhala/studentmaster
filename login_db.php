<?php 
include("include/config.php");
error_reporting(1);
$username=$_POST['uname'];
$password=$_POST['password'];

$query = "SELECT * FROM usermaster WHERE email ='$username' and password ='$password'";
$result = $dbc->query($query);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "value found";
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. "<br>";
        session_start();
       echo  $_SESSION['uID']=$row["id"];
        echo $_SESSION['unm']=$row["username"];

        header("location:welcome.php");
    }
} else {    
    header("location:index.php");
}
?>