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
$centernumber =$_SESSION['MM_Centernumber'];
$today        = date ("Y-m-d");
$location     = "https://".$_SERVER['SERVER_NAME']."/#!/loan/Cash On Loan/";   

mysql_select_db($database_ebdc, $ebdc);
$query_getting_staffid      = "SELECT staff.staff_id 
FROM ebdc.staff, ebdc.center  
WHERE username='$username' AND staff.center_id=center.id AND center.number='$centernumber'";
$getting_staffid            = mysql_query($query_getting_staffid, $ebdc) or die(mysql_error());
$row_getting_staffid        = mysql_fetch_assoc($getting_staffid);
$totalRows_getting_staffid  = mysql_num_rows($getting_staffid);

$staff_id = $row_getting_staffid['staff_id'];

mysql_select_db($database_ebdc, $ebdc);
$query_getting_centerid      = "SELECT center.id
FROM ebdc.center
WHERE center.`number` = '$centernumber'";
$getting_centerid            = mysql_query($query_getting_centerid, $ebdc) or die(mysql_error());
$row_getting_centerid        = mysql_fetch_assoc($getting_centerid);
$totalRows_getting_centerid  = mysql_num_rows($getting_centerid);

$centerid = $row_getting_centerid['id'];

$insertSQL = sprintf("INSERT INTO `loan` (`center`, `staff_id`, `personname`, `loaninformation`, `date_added`) VALUES (%s,%s,%s,%s,%s)",
                      GetSQLValueString($centerid, "int"),
                      GetSQLValueString($staff_id, "int"),
                      GetSQLValueString($_POST['personname'], "text"),
                      GetSQLValueString($_POST['loaninfo'], "text"),
                      GetSQLValueString($today, "date"));
                      
                        mysql_select_db($database_ebdc, $ebdc);
                        $Result1 = mysql_query($insertSQL, $ebdc)or die(mysql_error());
                        
                      if($Result1==1){
                          header(sprintf("Location: %s", $location."9991"));
                      }else{
                          header(sprintf("Location: %s", $location."9992"));
                      }
?>