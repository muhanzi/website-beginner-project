<?php
session_start();
  if (!isset($_SESSION['username'])) {
    header('location: signin.html');
}else{

}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Dr.Charles">

    <title>Mobile Money</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cssawe\font-awesome.css">
    <link rel="stylesheet" type="text/css" href="cssawe\font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style_file.css">


<style type="text/css">



/* outsource*/
/* @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700');
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); */

*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  min-height: 100vh;
  max-height: 200vh;
}

body {
  font: 14px/1 'Open Sans', sans-serif;
  color: #555;
  background: #eee;
}

h1 {
  padding: 50px 0;
  font-weight: 400;
  text-align: center;
}

p {
  margin: 0 0 20px;
  line-height: 1.5;
}

main {
  min-width:100%;
  max-width: 800px;
  padding: 50px;
  min-height: 100%;
  /*margin: 0 auto;*/
  margin:0;
  background: #fff;
}

section {
  display: none;
  padding: 20px 0 0;
  border-top: 1px solid #ddd;
}

input {
  display: none;
}

label {
  display: inline-block;
  margin: 0 0 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  /*color: #bbb;*/
color:  #870000;

  border: 1px solid transparent;
}

label:before {
  font-family: fontawesome;
  font-weight: normal;
  margin-right: 10px;
  font-size: 20px;
}

label[for*='1']:before { content: '\f0d6'; }
label[for*='2']:before { content: '\f155'; }
label[for*='3']:before { content: '\f155'; }  /* \f1ee */
label[for*='4']:before { content: '\f09d'; }

label:hover {
 /* color: #888;  */
 color: #4C0001;
  cursor: pointer;
}

input:checked + label {
  color: #bbb;
  border: 1px solid #ddd;
  border-top: 2px solid #870000;
  /*border-bottom: 1px solid #fff;*/
}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2,
#tab3:checked ~ #content3,
#tab4:checked ~ #content4 {
  display: block;
}

@media screen and (max-width: 650px) {
  label {
    font-size: 0;
  }
  label:before {
    margin: 0;
    font-size: 18px;
  }
}

@media screen and (max-width: 400px) {
  label {
    padding: 15px;
  }
}
.photo:hover{
  color:#870000;
}
p span{
  color:#566573;
  font-weight: 600;
}
tbody tr td{
  text-align: left;
}
table{
  height: 250px;
}
table tbody tr td input{
  display: block;
}


/* style of notification */
.modal  {
    /*   display: block;*/
    padding-right: 0px;
  /*  background-color: rgba(4, 4, 4, 0.8); */
    }

    .modal-dialog {
            top: 20%;
                width: 100%;
    position: absolute;
        }
        .modal-content {
                border-radius: 0px;
                border: none;
    top: 40%;
            }
            .modal-body {
                    background-color: #4C0001;
    color: #ECE9E6;  /* fallback for old browsers */
color: -webkit-linear-gradient(to right, #FFFFFF, #ECE9E6);  /* Chrome 10-25, Safari 5.1-6 */
color: linear-gradient(to right, #FFFFFF, #ECE9E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                }




</style>
  </head>

  <body>

    <!-- Navigation
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"

    -->

    <nav class="navbar navbar-expand-lg  fixed-top naviguer" style="/*background-color:#00FF80;*//*text-shadow: 0 21px 1px rgba(0,0,0,0.3);*/">
      <div class="container" style="max-height:300px;min-height: 75px;font-family: 'Lucida Console', Times, serif;">
        <a class="navbar-brand text" href="#" style="font-size:30px;margin-right:-50px;">Mobile Money</a>
                <a href="2.png" style="display: inline-block;transition: 0.3s;"> <img src="2.png" alt="2" style="display:block;width: 30%;margin:auto"></a>
        <button class="navbar-toggler text" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <!--<span class="navbar-toggler-icon"></span>-->
          <i class="fa fa-bars" aria-hidden="true" style="font-size:25px; padding: 0px;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item active">
              <a class="nav-link" href="index.html"><i class="fa fa-home fa-2x" style="padding-top: 0px;"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header style="margin-top: 90px;min-height: 500px; max-height:2000px;background-color:#ECE9E6;">
<div class="container-fluid">
<div class="row">
            <div class="col-md-3" style="/*background-color: #eee;*/min-height:500px;max-height: 800px; padding:50px;"><center><h2 style="color:#bbb;"><b class="photo">User Profile</b></h2>

<p>
 <!-- <i class="fa fa-user" aria-hidden="true" style="font-size:150px; padding: 0px;color: #ABEBC6;"></i>  -->

  <?php

  $cone=mysqli_connect("localhost","root","") or die("failed to connect to the server".mysqli_error());
  mysqli_select_db($cone,"mobile")or die("failed to select database".mysqli_error());

$select=mysqli_query($cone,"SELECT * FROM mone WHERE tel='".$_SESSION['username']."'") or die("fail to retrieve data".mysql_error());
if($select->num_rows > 0){ // mm  if($select){

  while($row = $select->fetch_assoc()) {
      if($row['photo'] == ""){
echo "<i class='fa fa-user' aria-hidden='true' style='font-size:150px; padding: 0px;color: #870000;'></i>";

echo "
</p>
<p>
  <span>Name:   ".$row['surname']."</span>
<br></br>
<span>Phone No:   ".$row['tel']."</span>
  ";

   }else {
echo "<img width='100' height='100' src='profiles/".$row['photo']."' alt='Profile Pic'>";

echo "
</p>
<p>
  <span>Name:   ".$row['surname']."</span>
<br></br>
<span>Account No:   MOM".$row['id']."</span>
<br></br>
<span>Phone No:   ".$row['tel']."</span>
  ";

 }
  }
}
echo " <br></br>";

// select balance from services table
 $select1=mysqli_query($cone,"SELECT * FROM services WHERE phoneNumber='".$_SESSION['username']."'") or die("fail to retrieve data".mysql_error());
if($select1->num_rows > 0){ // mm  if($select){

  while($row = $select1->fetch_assoc()) {
      if($row['balance'] == ""){
        echo "failed to select balance";
 }else{
echo "<span>Balance:   ".$row['balance']." $</span>";
 }
  }
}

 echo "<br></br>";

?>
<span><a href="logout.php" style="color:#870000;
  font-weight: 600;text-decoration: none;font-size: 20px;">Click to >>> Logout</a></span>
</p>
</center>
            </div>
            <div class="col-md-9" style="padding:0;">
<main style="background: #ECE9E6;">
    <center><h2 style="margin-top: -35px;font-family: 'Lucida Console', Times, serif;color:#870000;"><b>Enjoy Our Services</b></h2></center>
  <input id="tab1" type="radio" name="tabs" checked>
  <label for="tab1">Send Money</label>

  <input id="tab2" type="radio" name="tabs">
  <label for="tab2">withdraw cash</label>

  <input id="tab3" type="radio" name="tabs">
  <label for="tab3">deposit</label>

  <input id="tab4" type="radio" name="tabs">
  <label for="tab4">pay bills</label>

  <section id="content1" style="padding-top: 4%;padding-left: 4%;padding-right: 4%;">
    <table class="table">
  <thead class="thead-light">
    <tr style="height: 45px;">
      <th scope="col" colspan="3" style="text-align: center;background-color:#870000;font-weight: 500;color: white;font-size: 20px;">Send Money</th>

    </tr>
  </thead>
  <tbody>
    <form method="post" action="process2.php">
    <tr>
      <th scope="row">step 1</th>
      <td>Receiver's number</td>
      <td><input type="number" class="form-control" name="tel" minlength="10" required></td>

    </tr>
    <tr>
      <th scope="row">step 2</th>
      <td>Amount to send</td>
      <td><input type="number" class="form-control" name="amount" required></td>

    </tr>
   <!--  <tr>
      <th scope="row">step 3</th>
      <td>Agent ID</td>
      <td><input type="text" class="form-control" name="agent" required></td>  -->

    </tr>
    <tr>
      <th scope="row">step 3</th>
      <td>Code Pin</td>
      <td><input type="password" class="form-control" name="codepin" minlength="5" maxlength="5" required></td>

    </tr>
    <tr>
      <th scope="row">step 4</th>
      <td>Process</td>
      <td><input type="submit" class="btn-success butt" name="send" value="send money" style="padding: 6px 6px;"></td>

    </tr>
  </form>
  </tbody>
</table>

  </section>

  <section id="content2" style="padding-top: 4%;padding-left: 4%;padding-right: 4%;">
    <table class="table">
  <thead class="thead-light">
    <tr style="height: 45px;">
      <th scope="col" colspan="3" style="text-align: center;background-color: #870000;font-weight: 500;color: white;font-size: 20px;">Withdraw Cash</th>

    </tr>
  </thead>
  <tbody>
    <form method="post" action="process3.php">
      <tr>
      <th scope="row">step 1</th>
      <td>Agent ID</td>
      <td><input type="text" class="form-control" name="agent" required></td>

    </tr>
    <tr>
      <th scope="row">step 2</th>
      <td>Amount to Withdraw</td>
      <td><input type="number" class="form-control" name="amount" required></td>

    </tr>
    <tr>
      <th scope="row">step 3</th>
      <td>Code Pin</td>
      <td><input type="password" class="form-control" name="codepin" minlength="5" maxlength="5" required></td>

    </tr>
    <tr>
      <th scope="row">step 4</th>
      <td>Process</td>
      <td><input type="submit" class="btn-success butt" name="send1" value="withdraw cash" style="padding: 6px 6px;"></td>

    </tr>
  </form>
  </tbody>
</table>
  </section>

  <section id="content3" style="padding-top: 4%;padding-left: 4%;padding-right: 4%;">
    
  </section>

  <section id="content4" style="padding-top: 4%;padding-left: 4%;padding-right: 4%;">

  </section>

           </main>

        </div>
        <!-- notify the user -->
<div class="container-fluid" style="background-color: #ECE9E6;" >

    <div class="row" style="background-color:#ECE9E6;margin: 0 auto;padding-bottom: 50px;padding-top: 5px;">
        <!-- Large modal -->
 <span style="margin: 0 auto;">
<button type="button" class="butt btn"   data-toggle="modal" data-target=".bs-example-modal-lg" style="margin: 0 auto;">Process's Notifications - <i class="fa fa-envelope-open-o" aria-hidden="true"></i></button>
<span style="color: red;font-size: 20px;">
<?php include 'message.php';?>
</span>
</span>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-body">

<?php include 'message1.php';?>


      </div>
    </div>
  </div>
</div>
    </div>
</div>
<!-- end of notification -->
     </div>
   </div>




</header>





    <!-- Footer
<footer class="py-5 bg-dark"
     -->
    <footer class="py-5 naviguer text" style="min-height: 200px;">
      <div class="container">
        <br></br>
         <br></br>
          <br></br>
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
