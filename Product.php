<?php require_once('Conn/Conn.php'); ?>
<?php
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

mysql_select_db('mms');
$query_menu = "SELECT * FROM clouths ORDER BY clouths.productname";
$menu = mysql_query($query_menu) or die(mysql_error());
$row_menu = mysql_fetch_assoc($menu);
$totalRows_menu = mysql_num_rows($menu);
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
<style type="text/css">
   #main1 {
    position: relative;
    left: -30px;
   }
</style>
</head>
<title>Products</title></title>
<body>
        <?php include "header.php";?><br>

<center>
  <div id="main1">
      <form action="add2.php" method="post" name="addto">
        <input name="order" type="submit" value="Proceed To Payment Page" class="btn btn-default btn-success">
        <ul class="list-menu" >
        
        <li>
        <br>
    <?php 
    $count=1;
    do { ?>
        
      <div id="main">
       <div class="row-fluid">
         <ul class="">
            <li class="col-md-2">
               <article class="thumbnail">  

          </h4><img src="assets/img/<?php echo $row_menu['img']; ?>" />
          <span>NGN<?php echo $row_menu['price']; ?></span>
          <input name="qty['qty']" type="text" size="3" placeholder="Qty" value="1">
<br>
          <input name="meals[]" type="checkbox" value="<?php echo $row_menu['id']; ?>">
          <?php echo $row_menu['productname']; ?><br><br>
         
         </article>
            </li>
         </ul>
       </div>

           <?php 
      $count++;
      } while ($row_menu = mysql_fetch_assoc($menu)); ?>

          <div class="clear"></div>
        </li>
        </ul>
        
      </form>
      </div>
  </center>
  
        <script src="jquery.min.js" ></script>
        <script src="jquery.min.js" ></script>
        <script src="bootstrap.min.js" ></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox-plus-jquery.min.js"></script>
    
</body>

</html>

<?php
mysql_free_result($menu);
?>