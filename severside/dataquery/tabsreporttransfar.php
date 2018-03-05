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
$query_totaltransfar = "SELECT SUM(`transaction`.amount) AS totaltransfar, SUM(`transaction`.amount*`transaction`.rate) AS totaltransfar2 FROM staff, center, `transaction`, `currency`, marched_currency, deposit WHERE staff.center_id = center.id AND center.`number`=".$_SESSION['MM_Centernumber']." AND `transaction`.username = staff.username AND `transaction`.username != 'techvalley' AND `currency`.currency_id = marched_currency.currency_id_outgoing AND marched_currency.marched_id = deposit.marched_id AND deposit.id = `transaction`.deposit_id AND `transaction`.deposit_id=".$_GET['deposit_id']." AND `transaction`.tran_type='Transfer' GROUP BY `transaction`.deposit_id";
$totaltransfar = mysql_query($query_totaltransfar, $ebdc) or die(mysql_error());
$row_totaltransfar = mysql_fetch_assoc($totaltransfar);
$totalRows_totaltransfar = mysql_num_rows($totaltransfar);

$rows = array();
if($totalRows_totalcash >0){
  $rows['totaltransfar']=$row_totalcash['totaltransfar'];
  $rows['totaltransfar2']=$row_totalcash['totaltransfar2'];
}else{
  $rows['totaltransfar']=0;
  $rows['totaltransfar2']=0;
}
echo json_encode($rows);
?>