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
$MM_Centernumber = $_SESSION['MM_Centernumber'];
mysql_select_db($database_ebdc, $ebdc);
$query_deporsit_list = "SELECT check_in_check_out_history.match_name, 
check_in_check_out_history.match_name,
check_in_check_out_history.statues,
check_in_check_out_history.symbol,
check_in_check_out_history.amount,
check_in_check_out_history.staff_name
FROM ebdc.check_in_check_out_history, ebdc.deposit, ebdc.staff, ebdc.center
WHERE check_in_check_out_history.deposit_id = deposit.id AND deposit.staff_id = staff.staff_id AND staff.center_id = center.id
AND center.number = '$MM_Centernumber' 
order by check_in_check_out_history.id DESC;";
$deporsit_list = mysql_query($query_deporsit_list, $ebdc) or die(mysql_error());
$row_deporsit_list = mysql_fetch_assoc($deporsit_list);
$totalRows_deporsit_list = mysql_num_rows($deporsit_list);

$deporsit_listdata = array();

do {
  $deporsit_listdata[] = $row_deporsit_list;
  $number++;
} while ($row_deporsit_list = mysql_fetch_assoc($deporsit_list));
 
  echo json_encode($deporsit_listdata);
?>