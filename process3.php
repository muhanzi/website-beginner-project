<?php
session_start(); 
  if (!isset($_SESSION['username'])) {
    header('location: signin.html');
}else{
}
$cone=mysqli_connect("localhost","root","") or die("failed to connect to the server".mysqli_error());
  mysqli_select_db($cone,"mobile")or die("failed to select database".mysqli_error());

$amount=$_POST['amount'];
$agent=$_POST['agent'];

$pass=$_POST['codepin'];
$codepin=md5($pass);


$amount1=0;
$amount2=0;
$amount3=0;
$bal=0;


// $sender=$_SESSION['username'];

echo "<br/>$amount" ;

// verify agent's ID
$select1=mysqli_query($cone,"SELECT * FROM agents WHERE agents_id='".$agent."'") or die("fail to retrieve data".mysql_error());
 if($select1){
 
  while($row = $select1->fetch_assoc()) {     
      if($row['agents_id'] === ""){
        echo "invalid agent id<br/>";
        echo "<a href='services.php'>retry</a>";
      $amount1=0;
 } else{
  $amount1=$amount;
 }
  }
} 

echo "<br/> $amount1" ;        

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

// verify balance of Agent

$select3=mysqli_query($cone,"SELECT * FROM services WHERE phoneNumber='".$_SESSION['username']."'") or die("fail to retrieve data".mysql_error());
  if($select3){
 
  while($row = $select3->fetch_assoc()) {     
    $bal=$row['balance'];
      
  }
}

echo "<br/> $amount2";
echo "<br/> $bal";

if($bal>0 && $bal>$amount2){
        $amount3=$amount2;

        // alert user   !!!        
 } else{
  echo "can't withdraw money with 0 balance";
  $amount3=0;
 }



// if the is wrong informations (agent_id,codepin or receiver's number) --->amount is 0

 /* 

if($amount3==0){
  use include -->for a notification
  then redirect to services.php
}

 */


$message1="The Withdraw Operation was Successfull!";
$message2="you have withdrawn $amount3 $ through agent $agent";
$message="notification";


// update values

$update=mysqli_query($cone,"UPDATE services set balance=balance-$amount3 WHERE phoneNumber='".$_SESSION['username']."'") or die("unable to update".mysql_error());
if($update){
  echo "the accounts are updated";
}
 
$update1=mysqli_query($cone,"UPDATE agents set balance=balance-$amount3 WHERE agents_id='".$agent."'") or die("unable to update".mysql_error());
if($update1){
  $_SESSION['messageB']=$message;
  $_SESSION['message11']=$message1;
  $_SESSION['message22']=$message2;
  header('location: services.php');
  //echo var_dump($select1);
  //echo "<br/>the value is : $amount3";
}
       
    //   ATTENTION  !!!!!!


// use include php with alert to notify the user in case of invalid informations in a process.
//a ajouter une page pour agents ,
//une page contact,
//une page pour leurs(eg.airtel) publicites.
//valider la registration des utilisateurs eg. le num de telephone.

?>