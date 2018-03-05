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

$datatocheck="Transfar";
$cent = $_SESSION['MM_Centernumber'];
mysql_select_db($database_ebdc, $ebdc);
$query_tabs = "SELECT SUM(transaction.amount) AS transaction_made, (deposit.amount) AS openingbalance, (deposit.amount-SUM(transaction.amount)) AS balance, currency.name, (SELECT currency.code from currency where currency.currency_id = marched_currency.currency_id_incoming) AS incoming, (currency.code) AS outgoing,currency.symbol, (deposit.id) AS deposit_id, (transaction.id) AS transaction_id FROM `transaction`, deposit, marched_currency, `currency`, center WHERE `transaction`.deposit_id = deposit.id AND marched_currency.marched_id = deposit.marched_id AND marched_currency.currency_id_outgoing = `currency`.currency_id AND `currency`.center_id = center.id AND center.`number`='$cent' AND transaction.tran_type!='$datatocheck' GROUP BY `transaction`.deposit_id";
$tabs = mysql_query($query_tabs, $ebdc) or die(mysql_error()); 
$row_tabs = mysql_fetch_assoc($tabs);

// $tabsdata = array();
// while($row_tabsdatainfo = mysql_fetch_assoc($tabs)) {
//     $tabsdata[] = $row_tabsdatainfo;
// }
// echo json_encode($tabsdata);

$tabsdata = array();

do {
  $tabsdata[] = $row_tabs;
  $number++;
} while ($row_tabs = mysql_fetch_assoc($tabs));
 
  echo json_encode($tabsdata);
?>



