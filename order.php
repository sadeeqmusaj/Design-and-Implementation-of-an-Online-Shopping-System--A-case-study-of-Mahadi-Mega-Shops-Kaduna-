<?php require_once('Conn/Conn.php'); ?>
<?php

if (!isset($_SESSION)) {
	session_start();
	}	
if($_GET){
	$_GET['f_id'];
	$_SESSION['f_id']=$_GET['f_id'];
	
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
  $insertSQL = sprintf("INSERT INTO `card` (trackno, cust_id, cust_name, cust_phone, cust_address, f_id, qty, price, card_no, cvv_code) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($trackno, "int"),
					   GetSQLValueString($_POST['cust_id'], "int"),
                       GetSQLValueString($_POST['cust_name'], "text"),
                       GetSQLValueString($_POST['cust_phone'], "text"),
                       GetSQLValueString($_POST['cust_address'], "text"),
                       GetSQLValueString($mealid, "int"),
                       GetSQLValueString($_POST['qty'], "int"),
                       GetSQLValueString($_POST['price'], "double"),
                       GetSQLValueString($_POST['card_no'], "int"),
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
<html lang="en">
<head>
<title>Order Meal</title>
<meta charset="utf-8">
<!--css-->
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link href='http://fonts.googleapis.com/css?family=PT+Serif+Caption:400,400italic' rel='stylesheet' type='text/css'>
<!--js-->
<script type="text/javascript" src="js/jquery-1.7.1.min.js" ></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/forms.js"></script>
<script>
$(document).ready(function(){
    $("#form1").submit(function(){
		$.post('test.php',{cust_name: $('#cust_name').val(),},function(){ alert(data +"Submitted");});
        
    });
});
</script>
<!--[if lt IE 8]>
      <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
          <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
       </a>
     </div>
      <link href='http://fonts.googleapis.com/css?family=PT+Serif+Caption:400italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=PT+Serif+Caption:400' rel='stylesheet' type='text/css'>
    <![endif]-->

<!--[if lt IE 9]>
   		<script src="js/html5.js"></script>
  		<link rel="stylesheet" href="css/ie.css"> 
       <link href='http://fonts.googleapis.com/css?family=PT+Serif+Caption:400italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=PT+Serif+Caption:400' rel='stylesheet' type='text/css'>
	<![endif]-->

</head>
<body>


  <div class="border-horiz"></div>

    <div class="main">
    <h3>Your Order</h3>
    
    <table width="100%" border="1">
  <tr>
    <th scope="row">Meal No</th>
    <td>Meal Name</td>
    <td>Description</td>
    <td>Price</td>
    <td>Action</td>
  </tr>
  
    <?php 
	foreach($_SESSION['meals'] as $name => $mealid) { 
	mysql_select_db('mms');
$query = "SELECT * FROM clouths WHERE clouths.id={$mealid}";
$food = mysql_query($query) or die(mysql_error());
$row_food = mysql_fetch_assoc($food);
$totalRows_food = mysql_num_rows($food);
	
	
	?>
		
  <tr>
    <th scope="row"><?php echo $row_food['id']; ?></th>
    <td><?php echo $row_food['productname']; ?></td>
    <td><?php echo $row_food['f_description']; ?></td>
    <td><?php echo $row_food['price']; ?></td>
    <td></td>
    <td></td>
    
  </tr>
  	<?php	} ?>
</table>    
    <div class="overflow padd-2">
        
            <article class="grid_8">
            <div class="box-contact">
        <h3>Payment Details</h3>
        <form method="post" name="form1" id="form1" action="<?php echo $editFormAction; ?>">
          <table align="center">
            <tr valign="baseline">
              <td nowrap align="right">Customer name:</td>
              <td><input type="text" name="cust_name" id="cust_name" size="32" required></td>
              <td nowrap align="right">Qty:</td>
              <td><input type="text" name="qty" value="" size="32" required></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Customer phone:</td>
              <td><input type="text" name="cust_phone" value="" size="32" required></td>
              <td nowrap align="right"><br>Card number:</td>
              <td>
              Master Card <input name="cardtype" type="radio" value="master" checked>
              Visa Card <input name="cardtype" type="radio" value="visa"><br>
              <input type="text" name="card_no" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right" valign="top">Customer address:</td>
              <td><textarea name="cust_address" rows="3" cols="24" required></textarea></td>
              <td nowrap align="right">Cvv code:</td>
              <td><input type="text" name="cvv_code" value="" size="3" maxlength="3" required></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td nowrap align="right">&nbsp;</td>
              <td><input type="submit" value="Make Payment" class="btn"></td>
            </tr>
          </table>
          <?php
		  if(isset($_SESSION['MM_Username']))
		  mysql_select_db('mms');
$query = "SELECT * FROM users WHERE users.email='adamucovering@yahoo.com'";
$customer = mysql_query($query) or die(mysql_error());
$row_customer = mysql_fetch_assoc($customer);
$totalRows_customer = mysql_num_rows($customer);
		  ?>
          <input type="hidden" name="cust_id" value="1">
          <input type="hidden" name="f_id" value="<?php echo $row_food['f_id']; ?>">
          <input type="hidden" name="price" value="<?php echo $row_food['f_price']; ?>">
          <input type="hidden" name="MM_insert" value="form1">
        </form>
        <p>&nbsp;</p>
        </div>
            </article>
    </div>    
    <div class="clear"></div>
        
    </div>
    
   <div class="border-horiz extra"></div>   
      <div class="container_12">
    
       
    <div class="clear"></div>
  </div> 
   
</section>

<!--==============================footer=================================-->
<footer>
  <div class="main">
    <ul class="soc-list">
      <li><a href="#"><img alt="" src="images/icon-1.png"></a></li>
      <li><a href="#"><img alt="" src="images/icon-2.png"></a></li>
      <li><a href="#"><img alt="" src="images/icon-3.png"></a></li>
      <li><a href="#"><img alt="" src="images/icon-4.png"></a></li>
    </ul>
    <div class="policy"> &copy; HASSAM Fast foods ltd </div>
    <div class="clear"></div>
  </div>
</footer>
</body>
</html>
<?php
mysql_free_result($food);

mysql_free_result($customer);
?>
