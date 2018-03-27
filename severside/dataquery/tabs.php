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

$datatocheck="Transfer";
$MM_Centernumber = $_SESSION['MM_Centernumber'];
mysql_select_db($database_ebdc, $ebdc);
$query_tabs = "SELECT SUM(transaction.amount) AS transaction_made,
(deposit.amount) AS openingbalance,
(deposit.amount-SUM(transaction.amount)) AS balance,
currency.`name`,
currency.symbol,
(currency.code) AS outgoing,
(deposit.id) AS deposit_id, 
(transaction.id) AS transaction_id,
(SELECT currency.code from ebdc.currency where currency.currency_id = marched_currency.currency_id_incoming) AS incoming 
FROM ebdc.transaction,
ebdc.deposit,
ebdc.marched_currency,
ebdc.staff,
ebdc.center,ebdc.currency
WHERE transaction.deposit_id = deposit.id 
AND deposit.marched_id = marched_currency.marched_id
AND deposit.staff_id = staff.staff_id AND staff.center_id = center.id AND center.number = '$MM_Centernumber'
AND marched_currency.currency_id_outgoing = currency.currency_id
AND transaction.tran_type!='$datatocheck' GROUP BY `transaction`.deposit_id";
$tabs = mysql_query($query_tabs, $ebdc) or die(mysql_error()); 
$row_tabs = mysql_fetch_assoc($tabs);



$tabsdata = array();

do {
  $tabsdata[] = $row_tabs;
  $number++;
} while ($row_tabs = mysql_fetch_assoc($tabs));
 
  echo json_encode($tabsdata);
?>



