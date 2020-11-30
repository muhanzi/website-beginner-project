
<?php

session_start();
     //  $_SESSION['username'];
$cone;
if(isset($_POST["send"])){
  $cone=mysqli_connect("localhost","root","") or die("failed to connect to the server".mysqli_error());
  mysqli_select_db($cone,"mobile")or die("failed to select database".mysqli_error());

/* $target_dir = "C:/wamp64/www/start site/profiles/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);  */

move_uploaded_file($_FILES['file']['tmp_name'],"profiles/".$_FILES['file']['name']);

$target_file=$_FILES['file']['name'];
//echo var_dump($target_file);

$surname=$_POST['surname'];
$othername=$_POST['othername'];
$tel=$_POST['tel'];
$adress=$_POST['adress'];

$pass=$_POST['confirm'];
$password=md5($pass);

$gender=$_POST['gender'];
$nin=$_POST['nin'];
$email=$_POST['email'];
$birth=$_POST['birth'];

$balance=0.0000;


$insert=mysqli_query($cone,"INSERT INTO mone(surname,othername,tel,adress,codePin,photo,gender,nin,email,BirthDate)VALUES ('$surname','$othername','$tel','$adress','$password','$target_file','$gender','$nin','$email','$birth')") or die("failed to insert data".mysqli_error($cone));
if($insert){
echo "new record inserted";
  
}

$insert1=mysqli_query($cone,"INSERT INTO services(phoneNumber,balance) VALUES ('$tel','$balance')") or die("failed to insert data".mysqli_error());
if($insert1){
//echo "new record inserted";
  $_SESSION['username']=$tel;
 header("location: services.php");
}
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

<script type="text/javascript">
  function validate(){
    var x=document.getElementById("pass1").value;
    var y=document.getElementById("pass2").value;
    if(x!==y){ 
      document.getElementById("error").value="the codes don't match";
      document.getElementById("pass1").value="";
      document.getElementById("pass2").value="";
   // document.getElementById("error").innerHTML ="the two passwords don't match";
    }else{
      document.getElementById("error").value="";
    }  
  }

</script>

<style type="text/css">
input{  /* input[type=text]{ */
border-radius: 50px;
border:1px solid #870000;
}
input[type='file']{
  border:0px solid #870000;
  }
</style>
  </head>

  <body class="back">

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
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header style="margin-top:140px;min-height: 450px; max-height:2000px;padding: 10px 10px 20px 10px;border:0px;">
     <div class="container-fluid">
        <div class="row">
        <div class="col-md-6" style="margin:0 auto;padding:0px;min-height:200px;max-height:2000px;"> <!-- mu col-md-6 border-radius:10px;box-shadow:0px 0px 5px 5px; -->
        <div class="table-responsive">  
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
          <table class="table" style="min-height:50px;max-height: 2000px;" border="0" cellpadding="1">
            <tr>
              <td colspan="2" style="font-size: 30px;color:#870000;" align="center">Fill To Register</td>
            </tr>
            <tr>
              <td style="font-size:20px;color:#870000;">Surname:</td>
              <td><input type="text" class="form-control" name="surname"></td>
            </tr>
            <tr>
              <td style="font-size:20px;color:#870000;">Othername:</td>
              <td><input type="text" class="form-control" name="othername"></td>
            </tr>
            <tr>
              <td style="font-size:20px;color:#870000;">Tel:</td>
              <td><input type="number" class="form-control" name="tel" placeholder="+256"  required></td>
            </tr>
            <tr>
              <td style="font-size:20px;color:#870000;">Adress:</td>
              <td><input type="text" class="form-control" name="adress"></td>
            </tr>
            <tr>
              <td style="font-size:20px;color:#870000;">codePin:</td>
              <td><input  type="password" class="form-control" name="codepin" id="pass1" minlength="5" maxlength="5" placeholder="only numbers are allowed" required></td>
            </tr>
            <tr>
              <td  style="font-size:20px;color:#870000;">confirm your<br/> codepin:</td>
              <td><input type="password" class="form-control" name="confirm" id="pass2" placeholder="only numbers are allowed" onmouseout="validate()" minlength="5" maxlength="5" required>
                <input type="text" class="form-control back" name="error" id="error" style="color: #870000;border:0px solid #ECE9E6;min-width:50%;max-width:100%;">
                </td>
            </tr>
             <!--   <tr>
                   <td style="font-size:20px;color:#21618C;">code pin:</td> 
             <td> <input type="text" class="form-control" name="error" id="error" style="color:red;border:0px solid #eee;background-color:#eee;min-width:50%;max-width:100%;"> </td> </tr>  -->
            <tr>
              <td style="font-size:20px;color:#870000;">Photo:</td>
              <td><input type="file" class="form-control" name="file" id="fileToUpload"></td>
            </tr>
            <tr>
  <td style="font-size:20px;color:#870000;">Gender</td><td>
        <label class="radio-inline"><input type="radio" name="gender" value="male" checked> Male </label>
        <label class="radio-inline"><input type="radio" name="gender" value="female"> Female</label>
      </td>
           

            </tr>
            <tr>
              <td style="font-size:20px;color:#870000;">National Id:</td>
              <td><input type="text" class="form-control" name="nin"></td>
            </tr>
            <tr>
              <td style="font-size:20px;color:#870000;">Email:</td>
              <td><input type="email" class="form-control" name="email" required></td>
            </tr>
            <tr>
              <td style="font-size:20px;color:#870000;">Birth Date:</td>
              <td><input type="date" class="form-control" name="birth"></td>
            </tr>
            <tr>
      <td>
        <input type="submit" name="send">
      </td>
      <td>
        <input type="reset" name="reset" value="cancel">
      </td>
    </tr>
    <tr>
      <td style="font-size: 20px;">
Already Have An Account ?</td>
<td>
 <a  class="butt" href="signin.html" style="font-size: 15px;text-decoration: none;">Login </a>
</td>
    </tr>

          </table>
          </form>
          </div>  
        </div>
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
