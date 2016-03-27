<?php session_start(); 
include "controller/config.php"; 
$usrname=$_POST['usrname']; 
$passwd=$_POST['passwd']; 
$sql = "SELECT id FROM usradmin WHERE username='$usrname' and password='$passwd' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		session_start();
		$_SESSION['id']=$row['id'];
		header("Location:dashboard.php");
    }
}else{
	echo "<script>alert('Login Failed!');history.go(-1);</script>";
}
$conn->close();
?> 