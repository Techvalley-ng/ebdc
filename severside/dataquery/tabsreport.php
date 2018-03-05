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
$query_todayreport = "SELECT  CONCAT(staff.fname,' ', staff.lname) AS name, (`currency`.name) AS selling, `currency`.symbol, (SELECT currency.name from currency where currency.currency_id = marched_currency.currency_id_incoming) AS buying,(SELECT currency.symbol from currency where currency.currency_id = marched_currency.currency_id_incoming) AS sellingsymbol, `transaction`.rate, `transaction`.customer_name, `transaction`.tran_type, (`transaction`.amount) AS amount FROM staff, center, `transaction`, `currency`, marched_currency, deposit WHERE staff.center_id = center.id AND center.`number`=2308 AND `transaction`.username = staff.username AND `transaction`.username != 'techvalley' AND `currency`.currency_id = marched_currency.currency_id_outgoing AND marched_currency.marched_id = deposit.marched_id AND deposit.id = `transaction`.deposit_id AND `transaction`.deposit_id=6";
$todayreport = mysql_query($query_todayreport, $ebdc) or die(mysql_error());
$row_todayreport = mysql_fetch_assoc($todayreport);
$totalRows_todayreport = mysql_num_rows($todayreport);

$todayreportdata = array();

do {
  $todayreportdata[] = $row_todayreport;
  $number++;
} while ($row_todayreport = mysql_fetch_assoc($todayreport));
 
  echo json_encode($todayreportdata);

?>