<?php require_once('../Connections/ebdc.php'); ?>
<?php session_start(); ?>
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

mysql_select_db($database_ebdc, $ebdc);
$query_totalcash = "SELECT SUM(`transaction`.amount) AS totalCash, SUM(`transaction`.amount*`transaction`.rate) AS totalCash2, (`currency`.symbol) AS symbol1, (SELECT  `currency`.symbol  FROM staff, center, `transaction`, `currency`, marched_currency, deposit WHERE staff.center_id = center.id AND center.`number`=".$_SESSION['MM_Centernumber']." AND `transaction`.username = staff.username AND `transaction`.username != 'techvalley' AND `currency`.currency_id = marched_currency.currency_id_incoming AND marched_currency.marched_id = deposit.marched_id AND deposit.id = `transaction`.deposit_id AND `transaction`.deposit_id=".$_GET['deposit_id']." AND `transaction`.tran_type='cash' GROUP BY `transaction`.deposit_id) AS symbol2 FROM staff, center, `transaction`, `currency`, marched_currency, deposit WHERE staff.center_id = center.id AND center.`number`=".$_SESSION['MM_Centernumber']." AND `transaction`.username = staff.username AND `transaction`.username != 'techvalley' AND `currency`.currency_id = marched_currency.currency_id_outgoing AND marched_currency.marched_id = deposit.marched_id AND deposit.id = `transaction`.deposit_id AND `transaction`.deposit_id=".$_GET['deposit_id']." AND `transaction`.tran_type='cash' GROUP BY `transaction`.deposit_id";
$totalcash = mysql_query($query_totalcash, $ebdc) or die(mysql_error());
$row_totalcash = mysql_fetch_assoc($totalcash);
$totalRows_totalcash = mysql_num_rows($totalcash);
$rows = array();
if($totalRows_totalcash >0){
  $rows['totalCash']=$row_totalcash['totalCash'];
  $rows['totalCash2']=$row_totalcash['totalCash2'];
  $rows['symbol1']=$row_totalcash['symbol1'];
  $rows['symbol2']=$row_totalcash['symbol2'];
}else{
  $rows['totalCash']=0;
  $rows['totalCash2']=0;
}

 
echo json_encode($rows);
?>