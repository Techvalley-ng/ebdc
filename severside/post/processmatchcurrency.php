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

echo $outgoing     = $_POST['outgoing'];
echo $incoming     = $_POST['incoming'];
$location     = "https://".$_SERVER['SERVER_NAME']."/#!/matchcurrency/Match Currency/";    
$today        = date ("Y-m-d");
$username     = $_SESSION['MM_Username']; 
$centernumber =$_SESSION['MM_Centernumber']; 

mysql_select_db($database_ebdc, $ebdc);
$query_checking_old_march     = "SELECT * FROM ebdc.marched_currency 
WHERE currency_id_outgoing ='$outgoing' AND currency_id_incoming ='$incoming'";
$checking_old_march           = mysql_query($query_checking_old_march, $ebdc) or die(mysql_error());
$row_checking_old_march       = mysql_fetch_assoc($checking_old_march);
echo $totalRows_checking_old_march = mysql_num_rows($checking_old_march);

mysql_select_db($database_ebdc, $ebdc);
$query_getting_staffid      = "SELECT staff.staff_id 
FROM ebdc.staff, ebdc.center  
WHERE username='$username' AND staff.center_id=center.id AND center.number='$centernumber'";
$getting_staffid            = mysql_query($query_getting_staffid, $ebdc) or die(mysql_error());
$row_getting_staffid        = mysql_fetch_assoc($getting_staffid);
$totalRows_getting_staffid  = mysql_num_rows($getting_staffid);

$staff_id = $row_getting_staffid['staff_id'];

  if($totalRows_checking_old_march == 0){
        $insertSQL = sprintf("INSERT INTO `marched_currency` (`currency_id_outgoing`, `currency_id_incoming`, `staff_id`, `date_added`) VALUES (%s,%s,%s,%s)",
                      GetSQLValueString($outgoing, "int"),
                      GetSQLValueString($incoming, "int"),
                      GetSQLValueString($staff_id, "int"),
                      GetSQLValueString($today, "date"));
                        mysql_select_db($database_ebdc, $ebdc);
                        $Result1 = mysql_query($insertSQL, $ebdc)or die(mysql_error());
                      
                      if($Result1==1){
                            header(sprintf("Location: %s", $location."8881"));
                            
                        }else {
                            header(sprintf("Location: %s", $location."8882"));
                        } 
    }else {
        header(sprintf("Location: %s", $location."8888"));
    }


  
?>

