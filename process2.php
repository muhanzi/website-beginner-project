<?php
session_start(); 
  if (!isset($_SESSION['username'])) {
    header('location: signin.html');
}else{
}
$cone=mysqli_connect("localhost","root","") or die("failed to connect to the server".mysqli_error());
  mysqli_select_db($cone,"mobile")or die("failed to select database".mysqli_error());

$receiver=$_POST['tel'];
$amount=$_POST['amount'];
// $agent=$_POST['agent'];

$pass=$_POST['codepin'];
$codepin=md5($pass);

$amount1=0;
$amount2=0;
//$amount3=0;
$amount4=0;
$bal=0;
 


$sender=$_SESSION['username'];

// verify receiver's number 
$select=mysqli_query($cone,"SELECT * FROM services WHERE phoneNumber='".$receiver."'") or die("fail to retrieve data".mysql_error());
  if($select){
 
  while($row = $select->fetch_assoc()) {     
      if($row['phoneNumber'] === ""){
        echo "invalid number or this number does not have a mobile money account<br/>";
        echo "<a href='services.php'>retry</a>";
        $amount1=0;
 } else{
  $amount1=$amount;
 }
  }
}

echo "</br> $amount1";

/*
// verify agent's ID
$select1=mysqli_query($cone,"SELECT * FROM agents WHERE agents_id='".$agent."'") or die("fail to retrieve data".mysql_error());
 if($select){
 
  while($row = $select1->fetch_assoc()) {     
      if($row['agents_id'] === ""){
        echo "invalid agent id<br/>";
        echo "<a href='services.php'>retry</a>";
      $amount2=0;
 } else{
  $amount2=$amount1;
 }
  }
}    */

//verify codepIN 
$select2=mysqli_query($cone,"SELECT * FROM mone WHERE codePin='".$codepin."'") or die("fail to retrieve data".mysql_error());
 if($select2){
 
  while($row = $select2->fetch_assoc()) {     
      if($row['codePin'] ===""){
        echo "invalid code pin<br/>";
        echo "<a href='services.php'>retry</a>";
       $amount2=0;
 } else{
  $amount2=$amount1;
 }  
  }
}

echo "</br> $amount2";

// verify balance of sender
$select3=mysqli_query($cone,"SELECT * FROM services WHERE phoneNumber='".$_SESSION['username']."'") or die("fail to retrieve data".mysql_error());
  if($select3){
 
  while($row = $select3->fetch_assoc()) {     
    $bal=$row['balance'];
      
  }
}


echo "<br/>$bal";

if($bal>0 && $bal>$amount){
        $amount4=$amount2;

        // alert user   !!!        
 } else{
  echo "can't send money with 0 balance";
  $amount4=0;
 }



echo "</br> $amount4 </br>";

// if the is wrong informations (agent_id,codepin or receiver's number) --->amount is 0
if($amount4===0){

  //alert the user   !!!

}



$message1="Money Sent successfully!";
$message2="you have transfered $amount4 $ to $receiver";
$message="notification";



// update values

$update=mysqli_query($cone,"UPDATE services set balance=balance-$amount4 WHERE phoneNumber='".$_SESSION['username']."'") or die("unable to update".mysql_error());
if($update){
  echo "the accounts are updated";
}
 
$update1=mysqli_query($cone,"UPDATE services set balance=balance+$amount4 WHERE phoneNumber='".$receiver."'") or die("unable to update".mysql_error());
if($update1){
  $_SESSION['messageA']=$message;
  $_SESSION['message1']=$message1;
  $_SESSION['message2']=$message2;
  header('location: services.php');
 // echo var_dump($select);
 // echo "success and amount is : $amount4";
}


?>