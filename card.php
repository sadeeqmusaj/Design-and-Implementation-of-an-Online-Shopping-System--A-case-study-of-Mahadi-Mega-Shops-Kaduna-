<?php require_once('Conn/Conn.php'); ?>
<?php

if (!isset($_SESSION)) {
  session_start();
  } 
if($_GET){
  $_GET['id'];
  $_SESSION['id']=$_GET['id'];
  
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $trackno=rand(1000000000,9999999999);
   foreach($_SESSION['meals'] as $name => $mealid) { 
  $insertSQL = sprintf("INSERT INTO `card` (trackno, cardname, name, fulladdress, cardno, phoneno, password, qty, productnumber, cvv_code) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($trackno, "int"),
             GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['fulladdress'], "text"),
                       GetSQLValueString($_POST['cardno'], "text"),
                       GetSQLValueString($mealid, "int"),
                       GetSQLValueString($_POST['qty'], "int"),
                       GetSQLValueString($_POST[' phoneno'], "text"),
                       GetSQLValueString($_POST['cvv_code'], "int"));
mysql_select_db('mms');
  $Result1 = mysql_query($insertSQL) or die(mysql_error());
   }

  $insertGoTo = "ordersuccess.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

?>
<!DOCTYPE html>
<html>
<head>
<title>PayWay</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="bootstrap.css">

</script>
<script>
$(document).ready(function(){
    $("#form1").submit(function(){
    $.post('test.php',{name: $('#name').val(),},function(){ alert(data +"Submitted");});
        
    });
});
</script>
</head>
    
<body style="background-color: #222">

  <?php include "header.php";?>
<br><br>

  <center>
<font color=silver size=5><b>Use your MasterCard,Visa Card or VAB Card to Buy</b></font><br></center>

        <center><font color="grey" size="5" <h3>Your Order</h3></font></center>
  <center>
  <div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-bordered" style="background-color: #F8F8F8; width: 50%;">
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
$query_food = "SELECT * FROM clouths WHERE clouths.id={$mealid}";
$food = mysql_query($query_food) or die(mysql_error());
$row_food = mysql_fetch_assoc($food);
$totalRows_food = mysql_num_rows($food);
  
  
  ?>
    
  <tr>
    <th scope="row"><?php echo $row_food['id']; ?></th>
    <td><?php echo $row_food['productname']; ?></td>
    <td><?php echo $row_food['price']; ?></td>
    <td></td>
    <td></td>
    
  </tr>
    <?php } ?>
      </tbody>
   </table>

<form role="form" method="POST" action="insert.php">
     <font color=silver size=5>Payment Details</font>
        <form method="post" name="form1" id="form1" action="<?php echo $editFormAction; ?>">
           
             <div class="form-group">
              <font color=silver size=3 face="nyala">Card Type :</font>
              <input type="CardName" name="cardnam" id="cardnam" required class="form-control1">
             </div>

            <div class="form-group">
              <font color=silver size=3 face="nyala">Name:</font>
              <input type="Name" name="name" value="" required  class="form-control1"></td>
            </div>

            <div class="form-group">
              <font color=silver size=3 face="nyala">Full Address:</font>
              <input type="FullAddress" name="fulladdress" value="" required  class="form-control1">
            </div>

            <div class="form-group">
              <font color=silver size=3 face="nyala">CardNo:</font>
              <input type="CardNo" name="cardno" value="" required  class="form-control1">
            </div>

            <div class="form-group">
              <font color=silver size=3 face="nyala">PhoneNo:</font>
              <input type="PhoneNo" name="phoneno" value="" class="form-control1">
            </div>

            <div class="form-group">
             <font color=silver size=3 face="nyala">Password:</font>
             <input type="Password" name="password" value="" class="form-control1">
            </div>

            <div class="form-group">
             <font color=silver size=3 face="nyala">Quantity:</font>
             <input type="qyt" name="qyt" value=""  class="form-control1">
            </div>

            <div class="form-group">
              <font color=silver size=3 face="nyala">cvv code:</font>
              <input type="cvv_code" name="cvv_code" value="" size="3" maxlength="3" required class="form-control1">
             </div>
<br>

            

<tr valign="baseline" style="position: relative; right: 8px;">
              <td nowrap align="right">&nbsp;</td>
              <td nowrap align="right">&nbsp;</td>
              <td><input type="submit" value="Make Payment"  name="make_payment"  class="btn btn-default btn-success"></td>
            </tr>
</table><br><br>
 <!-- <?php
      if(isset($_SESSION['MM_Username']))
      mysql_select_db('mms');
$query_customer = "SELECT * FROM
custormers WHERE custormers.email='adamucovering@yahoo.com'";
$customer = mysql_query($query_customer) or die(mysql_error());
$row_customer = mysql_fetch_assoc($customer);
$totalRows_customer = mysql_num_rows($customer);
      ?>
          <input type="hidden" name="id" value="1">
          <input type="hidden" name="id" value="<?php echo $row_food['id']; ?>">
          <input type="hidden" name="price" value="<?php echo $row_food['price']; ?>">
          <input type="hidden" name="MM_insert" value="form1"> -->

</form>
       
 <?php include "header3.php";?>
<br>

<br>
</body>
</html>
<?php
mysql_free_result($food);

mysql_free_result($customer);
?>

   
   
   
   
   
   
 