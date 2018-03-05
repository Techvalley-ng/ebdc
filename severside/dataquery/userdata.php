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

$username     = $_SESSION['MM_Username'];
$Centernumber = $_SESSION['MM_Centernumber']; 

mysql_select_db($database_ebdc, $ebdc);
$query_userinfo = "SELECT staff.username, staff.fname, staff.lname FROM staff, center WHERE staff.center_id = center.id AND center.`number`='$Centernumber' AND staff.username='$username'";
$userinfo = mysql_query($query_userinfo, $ebdc) or die(mysql_error());
$row_userinfo = mysql_fetch_assoc($userinfo);
$totalRows_userinfo = mysql_num_rows($userinfo);

$rows = array();
// while($row_userinfo = mysql_fetch_assoc($userinfo)) {
//     $rows[] = $row_userinfo;
// }
// echo json_encode($rows);

// echo $row_userinfo['fname']
$rows['fname']=$row_userinfo['fname'];
$rows['lname']=$row_userinfo['lname'];
$rows['username']=$row_userinfo['username'];

echo json_encode($rows)
?>



