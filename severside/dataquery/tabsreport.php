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
$query_todayreport = "SELECT (SELECT staff.fname
FROM ebdc.staff, ebdc.deposit
WHERE staff.staff_id = `transaction`.staff_id
AND deposit.id = '$deposit_id') AS fname,
(SELECT staff.lname
FROM ebdc.staff, ebdc.deposit
WHERE staff.staff_id = `transaction`.staff_id
AND deposit.id = '$deposit_id') AS lname,
(currency.`name`) AS selling,
currency.symbol,
(SELECT currency.name 
FROM ebdc.currency,ebdc.marched_currency, ebdc.deposit 
WHERE currency.currency_id = marched_currency.currency_id_incoming AND deposit.marched_id = marched_currency.marched_id AND deposit.id='$deposit_id') AS buying,
(SELECT currency.symbol 
FROM ebdc.currency,ebdc.marched_currency, ebdc.deposit 
WHERE currency.currency_id = marched_currency.currency_id_incoming AND deposit.marched_id = marched_currency.marched_id AND deposit.id='$deposit_id') AS sellingsymbol,
`transaction`.rate, 
`transaction`.customer_name, 
`transaction`.tran_type, 
(`transaction`.amount) AS amount 
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
ORDER BY `transaction`.id DESC";
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