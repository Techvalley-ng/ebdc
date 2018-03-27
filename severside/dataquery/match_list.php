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
$query_get_center_id = "SELECT center.id FROM ebdc.center WHERE center.number='$centernumber'";
$get_center_id = mysql_query($query_get_center_id, $ebdc) or die(mysql_error());
$row_get_center_id = mysql_fetch_assoc($get_center_id);
$totalRows_get_center_id = mysql_num_rows($get_center_id);

if($totalRows_get_center_id ==1){
  $center_id = $row_get_center_id['id'];
  mysql_select_db($database_ebdc, $ebdc);
  $query_match_list = "SELECT marched_currency.marched_id, currency.name, currency.code, currency.symbol, 
  (SELECT currency.name from ebdc.currency where currency.currency_id = marched_currency.currency_id_incoming) AS incomingname,
  (SELECT currency.code from ebdc.currency where currency.currency_id = marched_currency.currency_id_incoming) AS incomingcode,
  (SELECT currency.symbol from ebdc.currency where currency.currency_id = marched_currency.currency_id_incoming) AS incomingsymbol,
  concat(staff.fname, ' ', staff.lname) AS staff_added, marched_currency.date_added
  FROM ebdc.currency, ebdc.marched_currency, ebdc.staff
  WHERE currency.currency_id = marched_currency.currency_id_outgoing AND marched_currency.staff_id = staff.staff_id AND staff.center_id ='$center_id'
  ORDER BY marched_currency.marched_id DESC";
  $match_list = mysql_query($query_match_list, $ebdc) or die(mysql_error());
  
    
    $match_array_id = array();
  
      do {
        $match_array_id[] = $row_match_list;
       
      } while ($row_match_list = mysql_fetch_assoc($match_list));
  echo json_encode($match_array_id);


}

?>