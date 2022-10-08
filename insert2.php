<!DOCTYPE html>
<html>
<head>
<title>PayWay</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
</head>
    
<body style="background-color: white">

  <?php include "header.php";?>

   <center><br><br>  

<?php
       error_reporting(0);

            $firstname= $_POST["firstname"];
            $lastname= $_POST["lastname"];
            $email= $_POST["email"];
            $comment= $_POST["comment"];

        
            $mah = mysqli_connect("localhost","root","","mms") or die("error connect");
  
          $sql = "INSERT INTO `contactus`(`id`, `firstname`, `lastname`, `email`, `comment`) VALUES ('$id', '$firstname', '$lastname', '$email', '$comment')";


         if ($mah->query($sql)===true)
        
         {
           echo '<html><head><body><center><font size="3" ><p>Thank you for your time we will respond shortly...!!!<br /></font></center></body></head></html>';
           echo date('<font color="white">H:i, jS F');
           echo '</p> </font>';
         }

         else
          
         {
         	echo '<font><p>somethimg is messing...!!!';
    	    echo date('H:i, jS F');
            echo '</p></font>';
         }
?>
</center>
<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox-plus-jquery.min.js"></script>

</body>
</html>
