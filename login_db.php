<?php 
include("include/config.php");
error_reporting(1);
$username=$_POST['uname'];
$password=$_POST['password'];

$query = "SELECT * FROM userdetails WHERE Email ='$username' and password ='$password'";
$result = $dbc->query($query);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "value found";
        echo "id: " . $row["userID"]. " - Name: " . $row["userName"]. " " . $row["Email"]. "<br>";
        session_start();
        $_SESSION['uID']=$row["userID"];
        $_SESSION['unm']=$row["userName"];

        header("location:welcome.php");
    }
} else {    
    header("location:index.php");
}
?>