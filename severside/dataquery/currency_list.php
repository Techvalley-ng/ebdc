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
$centernumber = $_SESSION['MM_Centernumber'];
mysql_select_db($database_ebdc, $ebdc);
$query_currency_list = "SELECT currency.currency_id,currency.name, currency.code, currency.symbol, CONCAT(staff.fname,' ', staff.lname) AS staff_add, currency.data_added FROM ebdc.currency, ebdc.staff, ebdc.center where currency.center_id = center.id AND center.number='$centernumber' AND staff.fname !='techvalley'";
$currency_list = mysql_query($query_currency_list, $ebdc) or die(mysql_error());
$row_currency_list = mysql_fetch_assoc($currency_list);
$totalRows_currency_list = mysql_num_rows($currency_list);

$currency_listdata = array();

do {
  $currency_listdata[] = $row_currency_list;
  $number++;
} while ($row_currency_list = mysql_fetch_assoc($currency_list));
 
  echo json_encode($currency_listdata);
?>



