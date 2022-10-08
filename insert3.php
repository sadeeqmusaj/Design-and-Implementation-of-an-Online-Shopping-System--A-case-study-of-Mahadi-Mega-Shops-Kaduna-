<?php require_once('conn/conn.php'); ?>

<?php

if(!isset($_SESSION)){
  session_start();
  }

//$f_id=$_SESSION['f_id'] ;   

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
/*
mysql_select_db($database, $marwako);
$query_food = "SELECT * FROM food WHERE food.f_id={$f_id}";
$food = mysql_query($query_food, $marwako) or die(mysql_error());
$row_food = mysql_fetch_assoc($food);
$totalRows_food = mysql_num_rows($food);
*/

mysql_select_db('mms');
$query_orders = "SELECT * FROM `card` ORDER BY `card`.id desc limit 1";
$orders = mysql_query($query_orders) or die(mysql_error());
$row_orders = mysql_fetch_assoc($orders);
$totalRows_orders = mysql_num_rows($orders);
?>
<html>
  <head>
   <title>MMS Online Shopping</title>
     <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script>
$(document).ready(function(){
    $("#form1").submit(function(){
    $.post('test2.php',{name: $('#name').val(),},function(){ alert(data +"Submitted");});
        
    });
});
</script>
<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>
  </head>
<body style="background-color: #222">

       <?php include "header.php";?>
       <center><br><br>  

   <div class="border-horiz"></div>
<font color="white">
    <div class="main">
    <h3>Order Successfully Done</h3>
    <div class="overflow padd-2">
        <p></p>  
            <article class="grid_8">
            <div id="printdiv">
  
        <h3>order details </h3>
         
        <p> Order Successfully done</p>
        <p> Free Toll for tracking: 023 7100 942</p>
        <p> Order</p>
  </font>
 <center>
  <div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-bordered" style="background-color: #F8F8F8; width: 50%;">
        <th scope="row" colspan="3">Order Reference Number : <?php echo $row_orders['trackno']; ?></th>
  <tr>
    <th>Product No</th>
    <td>Product Name</td>
    <td>Price</td>
  </tr>
  </font>
  </center>
  <br>
    <tbody>

       <?php 
  foreach($_SESSION['meals'] as $name => $mealid) { 
  mysql_select_db('mms');
$query_food = "SELECT * FROM clouths, `card` WHERE clouths.id={$mealid} AND clouths.id = `card`.id";
$food = mysql_query($query_food) or die(mysql_error());
$row_food = mysql_fetch_assoc($food);
$totalRows_food = mysql_num_rows($food);
  
  
  ?>
    
  <tr>
    <th scope="row"><?php echo $row_food['id']; ?></th>
    <td><?php echo $row_food['productname']; ?></td>
    <td><?php echo $row_food['price']; ?> * <?php echo $row_food['qty']; ?></td>
  </tr>
    <?php } ?>
</table>
</div>
<input name="printbtn" id="printbtn" type="button" value="Print Details"  class="btn btn-default btn-success" onclick="printContent('printdiv')">

  </font>
  </center>

   

 <?php

        error_reporting(0);
       
        $muk = mysqli_connect("localhost","root","","mms") or die ("error connect");

        $sql ="SELECT * FROM `card`";
    
        $muks=$muk->query($sql);
      
           if($row=$muks->fetch_assoc())
           {
            $id = $row['id'];
            $cardname= $_POST["cardname"];
            $name= $_POST["name"];
            $fulladdress= $_POST["fulladdress"];
            $cardno= $_POST["cardno"];
            $phoneno= $_POST["phoneno"];
            $password= $_POST["password"];
            $qyt= $_POST["qyt"];
            $cvv_code= $_POST["cvv_code"];
            

                 echo"<tr><td align=center>
        <a href=\"edit2.php?ids=$id&productnames=$productname&prices=$price&quantitys=$quantity&imgs=$img\">$id</a></td>
          
          <td>$productname</td>
          <td>$price</td>
          <td>$quantity</td>
          <td>$img</td>
        </tr>";
   

    ?>
         <?php

           }
      ?>
  </center>
    <script src="jquery.min.js" ></script>
    <script src="js/loader.js" ></script>
</body>
</html> 
<?php
mysql_free_result($food);

mysql_free_result($orders);
?>