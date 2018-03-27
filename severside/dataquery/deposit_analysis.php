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

$centernumber           = $_SESSION['MM_Centernumber'];
$martch_data            = explode('|', $_GET['martch_id']);
$martch_id              = $martch_data[0];
$martch_code            = $martch_data[1];
$martch_incomingcode    = $martch_data[2];
$martch_symbol          = $martch_data[3];

mysql_select_db($database_ebdc, $ebdc);
$query_deposit_analysis = "SELECT 
SUM(transaction.amount) AS transaction_made,
(deposit.amount) AS openingbalance, 
(deposit.amount-SUM(transaction.amount)) AS balance,
deposit.id
FROM ebdc.`transaction`, ebdc.deposit,ebdc.staff, ebdc.center, ebdc.marched_currency
WHERE `transaction`.deposit_id = deposit.id 
AND marched_currency.marched_id = deposit.marched_id 
AND deposit.staff_id=staff.staff_id AND staff.center_id=center.id 
AND center.number='$centernumber' AND marched_currency.marched_id='$martch_id'";
$deposit_analysis = mysql_query($query_deposit_analysis, $ebdc) or die(mysql_error());
$row_deposit_analysis = mysql_fetch_assoc($deposit_analysis);
$totalRows_deposit_analysis = mysql_num_rows($deposit_analysis);

// $centernumber

$row_deposit_analysisdata = array();
$row_deposit_analysisdata['transaction_made'] = $row_deposit_analysis['transaction_made'];
$row_deposit_analysisdata['openingbalance'] = $row_deposit_analysis['openingbalance'];
$row_deposit_analysisdata['balance'] = $row_deposit_analysis['balance'];
$row_deposit_analysisdata['deposite_id'] = $row_deposit_analysis['id'];
$row_deposit_analysisdata['martch_code'] = $martch_code;
$row_deposit_analysisdata['martch_incomingcode'] = $martch_incomingcode;
$row_deposit_analysisdata['martch_symbol'] = $martch_symbol;
$row_deposit_analysisdata['martch_id'] = $martch_id;

// do {
//   $row_deposit_analysisdata[] = $row_deposit_analysis;
  
// } while ($row_deposit_analysis = mysql_fetch_assoc($deposit_analysis));
 
  echo json_encode($row_deposit_analysisdata);
?>
