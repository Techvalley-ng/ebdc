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
$deposit_id = $_GET['deposit_id'];
$MM_Centernumber = $_SESSION['MM_Centernumber'];
mysql_select_db($database_ebdc, $ebdc);
$query_totaltransfar = "SELECT SUM(`transaction`.amount) AS totaltransfar, 
SUM(`transaction`.amount*`transaction`.rate) AS totaltransfar2, 
(`currency`.symbol) AS symbol1,
(SELECT currency.symbol 
FROM ebdc.currency,ebdc.marched_currency, ebdc.deposit 
WHERE currency.currency_id = marched_currency.currency_id_incoming AND deposit.marched_id = marched_currency.marched_id AND deposit.id='$deposit_id') AS symbol2
FROM ebdc.staff, 
ebdc.center, 
ebdc.`transaction`,
ebdc.deposit,
ebdc.marched_currency,
ebdc.currency 
WHERE staff.center_id = center.id
AND center.`number` = '$MM_Centernumber'
AND `transaction`.deposit_id = deposit.id
AND deposit.marched_id = marched_currency.marched_id
AND marched_currency.currency_id_outgoing = currency.currency_id
AND staff.staff_id = deposit.staff_id
AND deposit.id='$deposit_id'
AND `transaction`.tran_type='Transfer'
GROUP BY `transaction`.deposit_id
ORDER BY `transaction`.id DESC";
$totaltransfar = mysql_query($query_totaltransfar, $ebdc) or die(mysql_error());
$row_totaltransfar = mysql_fetch_assoc($totaltransfar);
$totalRows_totaltransfar = mysql_num_rows($totaltransfar);

$rows = array();
if($totalRows_totaltransfar >0){
  $rows['totaltransfar1']  = $row_totaltransfar['totaltransfar'];
  $rows['totaltransfar2'] = $row_totaltransfar['totaltransfar2'];
  $rows['symbol1']        = $row_totaltransfar['symbol1'];
  $rows['symbol2']        = $row_totaltransfar['symbol2'];
}else{
  $rows['totaltransfar1']=0;
  $rows['totaltransfar2']=0;
}
echo json_encode($rows);
?>