<?php require_once('../Connections/ebdc.php'); ?>
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
$query_billscheck = "SELECT bill.due_date FROM bill, center WHERE bill.center_id = center.id AND center.`number` =2308 ORDER BY bill.id DESC LIMIT 0,1";
$billscheck = mysql_query($query_billscheck, $ebdc) or die(mysql_error());
$row_billscheck = mysql_fetch_assoc($billscheck);
$totalRows_billscheck = mysql_num_rows($billscheck);

//checking on date 
$due_date = $row_billscheck['due_date'];
$today =  date('Y-m-d');

if(($due_date==$today)||($due_date<$today)){
  
  //your sub is due
  echo "your sub is over";
  
}else{
  //you still have sub
  $location = $_SERVER['SERVER_NAME'].'/#!/home/Dashboard';
  header("location: https://".$location);
}

?>
