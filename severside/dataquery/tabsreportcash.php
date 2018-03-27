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
$query_totalcash = "SELECT SUM(`transaction`.amount) AS totalCash, 
SUM(`transaction`.amount*`transaction`.rate) AS totalCash2, 
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
AND `transaction`.tran_type='Cash' 
GROUP BY `transaction`.deposit_id
ORDER BY `transaction`.id DESC";
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