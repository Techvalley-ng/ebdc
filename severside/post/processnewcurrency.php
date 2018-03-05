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

$today              = date ("Y-m-d");
$location           = $_SERVER['SERVER_NAME']."/".$_POST['url'];
$result             = $_POST['money'];
$result_explode     = explode('|', $result);
$MM_Centernumber    =$_SESSION['MM_Centernumber'];

if(($_SESSION['MM_Username']=="")||($_SESSION['MM_Centernumber']=="")){
  header("location: https://".$_SERVER['SERVER_NAME']."/severside/dataquery/logout.php");
}else{
  //user is login  in
  mysql_select_db($database_ebdc, $ebdc);
  $query_staff_id     = "SELECT staff.staff_id FROM ebdc.staff WHERE staff.username = 'wali'";
  $staff_id           = mysql_query($query_staff_id, $ebdc) or die(mysql_error()); 
  $row_staff_id       = mysql_fetch_assoc($staff_id);
  $total_row              = mysql_num_rows($staff_id);   
  
  echo $center_id              = $row_staff_id['id'];
  
}

?>
