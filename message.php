<?php
$_SESSION['note']=0;

//pour send
if (isset($_SESSION['messageA'])) {
	$_SESSION['note'] +=1;

	//
	if (isset($_SESSION['messageB'])) {
	$_SESSION['note'] +=1;

    if($_SESSION['note']== 1){
echo "".$_SESSION['note']."  ".$_SESSION['messageB']."";
     }else{
echo "".$_SESSION['note']."  ".$_SESSION['messageB']."s";
     }

}
//

	elseif($_SESSION['note']==1){
echo "".$_SESSION['note']."  ".$_SESSION['messageA']."";
     }else{
echo "".$_SESSION['note']."  ".$_SESSION['messageA']."s";
     }
return;
}

// pour withdraw

if (isset($_SESSION['messageB'])) {
	$_SESSION['note'] +=1;


//
    if (isset($_SESSION['messageA'])) {
	$_SESSION['note'] +=1;

       if($_SESSION['note']==1){
echo "".$_SESSION['note']."  ".$_SESSION['messageA']."";
     }else{
echo "".$_SESSION['note']."  ".$_SESSION['messageA']."s";
     }

}
//

    elseif($_SESSION['note']== 1){
echo "".$_SESSION['note']."  ".$_SESSION['messageB']."";
     }else{
echo "".$_SESSION['note']."  ".$_SESSION['messageB']."s";
     }

}
return;
?>