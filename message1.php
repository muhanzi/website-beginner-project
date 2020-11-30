<?php

$note=0;

/*
// 0 notification
if(unset($_SESSION['message1']) && unset($_SESSION['message2'])){
     echo "  <H2>you don't have any notification</H2>";
  } */

// send operation
if (isset($_SESSION['message1'])) {
  
echo "<H2>".$_SESSION['message1']."              
       </H2>
      <h4>
".$_SESSION['message2']."</h4>";

$note +=1;

       }
echo "<br/>";
//withdraw operation
if (isset($_SESSION['message11'])) {
  
echo "<H2>".$_SESSION['message11']."              
       </H2>
      <h4>
".$_SESSION['message22']."</h4>";

$note +=1;

       }

elseif($note==0){
echo "<H2>You Don't Have Any notification</H2>";
}



?>