<?php
session_start(); 
//$_SESSION['username'];

if (isset($_SESSION['username'])) {
    header('location: services.php');
}else{



if(isset($_POST["send"])){
	$cone=mysqli_connect("localhost","root","") or die("failed to connect to the server".mysqli_error());
	mysqli_select_db($cone,"mobile")or die("failed to select database".mysqli_error());

$tel=$_POST['PhoneNumber'];
$pass=$_POST['codepin'];
$codepin=md5($pass);



$login=mysqli_query($cone,"SELECT * FROM mone WHERE tel='$tel' AND codePin = '$codepin'") or die("unable to select".mysql_error());

if($login->num_rows >0){
	$_SESSION['username']=$_POST['PhoneNumber'];
while($rows=$login->fetch_assoc()){
	// echo $rows['name']." ,you are logged in";
	header('location: services.php');
}
}else{
	// echo "this user does no exist";
	 header('location: signin.html');
}
}

}//closes else --> there is no session 
?>