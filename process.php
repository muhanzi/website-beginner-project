<?php




//      !!!!!! DRAFT FILE !!!!!!!



session_start(); 
  if (!isset($_SESSION['username'])) {
    header('location: signin.html');
}else{
}
$cone=mysqli_connect("localhost","root","") or die("failed to connect to the server".mysqli_error());
  mysqli_select_db($cone,"mobile")or die("failed to select database".mysqli_error());

$receiver=$_POST['tel'];
$amount=$_POST['amount'];
$agent=$_POST['agent'];
$codepin=$_POST['codepin'];

$sender=$_SESSION['username'];

// verify receiver's number
$select=mysqli_query($cone,"SELECT * FROM services WHERE phoneNumber='".$receiver."'") or die("fail to retrieve data".mysql_error());
if($select->num_rows > 0){ // mm  if($select){
 
  while($row = $select->fetch_assoc()) {     
      if($row['phoneNumber'] == ""){
        echo "invalid number or this number does not have a mobile money account<br/>";
        echo "<a href='services.php'>retry</a>";
   exit();
 } 
  }
}

// verify agent's ID
$select1=mysqli_query($cone,"SELECT * FROM agents WHERE agents_id='".$agent."'") or die("fail to retrieve data".mysql_error());
if($select1->num_rows > 0){ // mm  if($select){
 
  while($row = $select1->fetch_assoc()) {     
      if($row['agents_id'] == ""){
        echo "invalid agent id<br/>";
        echo "<a href='services.php'>retry</a>";
        exit();
 }
  }
}

//verify codepIN
$select2=mysqli_query($cone,"SELECT * FROM mone WHERE codePin='".$codepin."'") or die("fail to retrieve data".mysql_error());
if($select2->num_rows > 0){ // mm  if($select){
 
  while($row = $select2->fetch_assoc()) {     
      if($row['codePin'] == ""){
        echo "invalid code pin<br/>";
        echo "<a href='services.php'>retry</a>";
       exit();
 }  
  }
}

// update values
// update functions set total=(select sum(test1+test2+test3));

$update=mysqli_query($cone,"UPDATE services set balance=balance-$amount WHERE phoneNumber='".$_SESSION['username']."'") or die("unable to update".mysql_error());
if($update){
  echo "the accounts are updated";
}
 
$update1=mysqli_query($cone,"UPDATE services set balance=balance+$amount WHERE phoneNumber='".$receiver."'") or die("unable to update".mysql_error());
if($update1){
  header('location: services.php');
}


?>









// deuxieme procedure










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
$agent=$_POST['agent'];
$codepin=$_POST['codepin'];

$sender=$_SESSION['username'];

$check ="SELECT * FROM services WHERE phoneNumber='".$receiver."'; ";
$check .="SELECT * FROM agents WHERE agents_id='".$agent."'; ";
$check .="SELECT * FROM mone WHERE codePin='".$codepin."' ";


if ($cone->multi_query($check)) {
    do {
        /* store first result set */
        if ($result = $cone->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s\n", $row[0]);
            }
            $result->free();
        }
        /* print divider */
        if ($cone->more_results()) {
            //
          return;
        }
    } while ($cone->more_results());
} else {
    echo "invalid inputs";
    $amount=0;
}

// update values
  
$update=mysqli_query($cone,"UPDATE services set balance=balance-$amount WHERE phoneNumber='".$_SESSION['username']."'") or die("unable to update".mysql_error());
if($update){
  echo "the accounts are updated";
}
 
$update1=mysqli_query($cone,"UPDATE services set balance=balance+$amount WHERE phoneNumber='".$receiver."'") or die("unable to update".mysql_error());
if($update1){
  echo var_dump($amount);
 header('location: services.php');
}


?>
