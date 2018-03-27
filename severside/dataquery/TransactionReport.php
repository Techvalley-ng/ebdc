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
$MM_Centernumber    = $_SESSION['MM_Centernumber'];
$martch_id          = $_GET['martch_id'];
$datefrom           = date("Y-m-d", strtotime($_GET['datefrom']));
$dateto             = date("Y-m-d", strtotime($_GET['dateto']));

mysql_select_db($database_ebdc, $ebdc);
if($martch_id=="All"){
//i have try working the model for the report of all currency but it did not work on pending command
    $query_report_with_id = "SELECT (currency.`code`) AS outgoing,
(SELECT currency.`code` 
FROM ebdc.currency,ebdc.marched_currency, ebdc.deposit 
WHERE currency.currency_id = marched_currency.currency_id_incoming 
AND deposit.marched_id = marched_currency.marched_id) AS incoming,
(SELECT staff.fname
FROM ebdc.staff, ebdc.deposit,ebdc.marched_currency
WHERE staff.staff_id = `transaction`.staff_id
AND deposit.marched_id = marched_currency.marched_id) AS fname,
(SELECT staff.lname
FROM ebdc.staff, ebdc.deposit,ebdc.marched_currency
WHERE staff.staff_id = `transaction`.staff_id
AND deposit.marched_id = marched_currency.marched_id) AS lname,
`transaction`.customer_name,
(`transaction`.amount * `transaction`.rate) AS transactionamount,
`transaction`.amount AS outgoing_amount,
`transaction`.rate,
transaction.tran_type,
`transaction`.transaction_date	
FROM ebdc.currency, ebdc.marched_currency,ebdc.deposit, ebdc.staff, ebdc.`transaction`,ebdc.center
WHERE currency.currency_id = marched_currency.currency_id_outgoing
AND deposit.marched_id = marched_currency.marched_id
AND `transaction`.deposit_id = deposit.id
AND `transaction`.staff_id = staff.staff_id
AND staff.center_id = center.id
AND center.`number`= '$MM_Centernumber'
AND DATE(`transaction`.transaction_date) BETWEEN '$datefrom' AND '$dateto'
ORDER BY transaction.id DESC";
}else{
$query_report_with_id = "SELECT (currency.`code`) AS outgoing,
(SELECT currency.`code` 
FROM ebdc.currency,ebdc.marched_currency, ebdc.deposit 
WHERE currency.currency_id = marched_currency.currency_id_incoming 
AND deposit.marched_id = marched_currency.marched_id 
AND marched_currency.marched_id = '$martch_id') AS incoming,
(SELECT staff.fname
FROM ebdc.staff, ebdc.deposit,ebdc.marched_currency
WHERE staff.staff_id = `transaction`.staff_id
AND deposit.marched_id = marched_currency.marched_id
AND marched_currency.marched_id = '$martch_id') AS fname,
(SELECT staff.lname
FROM ebdc.staff, ebdc.deposit,ebdc.marched_currency
WHERE staff.staff_id = `transaction`.staff_id
AND deposit.marched_id = marched_currency.marched_id
AND marched_currency.marched_id = '$martch_id') AS lname,
`transaction`.customer_name,
(`transaction`.amount * `transaction`.rate) AS transactionamount,
`transaction`.amount AS outgoing_amount,
`transaction`.rate,
transaction.tran_type,
`transaction`.transaction_date	
FROM ebdc.currency, ebdc.marched_currency,ebdc.deposit, ebdc.staff, ebdc.`transaction`,ebdc.center
WHERE currency.currency_id = marched_currency.currency_id_outgoing
AND deposit.marched_id = marched_currency.marched_id
AND `transaction`.deposit_id = deposit.id
AND `transaction`.staff_id = staff.staff_id
AND staff.center_id = center.id
AND center.`number`= '$MM_Centernumber'
AND marched_currency.marched_id = '$martch_id'
AND DATE(`transaction`.transaction_date) BETWEEN '$datefrom' AND '$dateto'
ORDER BY transaction.id DESC";
}
$report_with_id = mysql_query($query_report_with_id, $ebdc) or die(mysql_error());
$row_report_with_id = mysql_fetch_assoc($report_with_id);
$totalRows_report_with_id = mysql_num_rows($report_with_id);

$report_with_iddata = array();
do {
  $report_with_iddata[] = $row_report_with_id;
  
} while ($row_report_with_id = mysql_fetch_assoc($report_with_id));
 
  echo json_encode($report_with_iddata);
 
?>