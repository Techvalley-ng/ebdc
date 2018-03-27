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
$query_loanlist = "SELECT loan.loan_id,
staff.fname,
staff.lname,
loan.personname,
loan.loaninformation,
loan.date_added
FROM ebdc.loan, ebdc.staff, ebdc.center
WHERE center.id = loan.center
AND loan.staff_id = staff.staff_id
AND center.`number` = '$MM_Centernumber'
ORDER BY loan.loan_id DESC";
$loanlist = mysql_query($query_loanlist, $ebdc) or die(mysql_error());
$row_loanlist = mysql_fetch_assoc($loanlist);
$totalRows_loanlist = mysql_num_rows($loanlist);

$loanlistdata = array();

do {
  $loanlistdata[] = $row_loanlist;
  $number++;
} while ($row_loanlist = mysql_fetch_assoc($loanlist));
 
  echo json_encode($loanlistdata);

?>