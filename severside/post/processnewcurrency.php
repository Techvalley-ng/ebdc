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
$MM_Centernumber    = $_SESSION['MM_Centernumber'];
$MM_Username        = $_SESSION['MM_Username'];

if(($_SESSION['MM_Username']=="")||($_SESSION['MM_Centernumber']=="")){
  header("location: https://".$_SERVER['SERVER_NAME']."/severside/dataquery/logout.php");
}else{
  //user is login  in
  mysql_select_db($database_ebdc, $ebdc);
  $query_staff_id     = "SELECT staff.staff_id FROM ebdc.staff WHERE staff.username = '$MM_Username'";
  $staff_id           = mysql_query($query_staff_id, $ebdc) or die(mysql_error()); 
  $row_staff_id       = mysql_fetch_assoc($staff_id);
  $total_row          = mysql_num_rows($staff_id);   
  
  $stafs_id              = $row_staff_id['staff_id'];
  
  //checking if we have the currency aready install
  mysql_select_db($database_ebdc, $ebdc);
  $query_check_currecny = "SELECT currency.name
  FROM ebdc.currency, ebdc.staff, ebdc.center
  WHERE currency.staff_id = staff.staff_id AND staff.center_id = center.id AND center.number = '$MM_Centernumber' AND currency.name = '$result_explode[0]'";
  $check_currecny = mysql_query($query_check_currecny, $ebdc) or die(mysql_error());
  $row_check_currecny = mysql_fetch_assoc($check_currecny);
  echo $totalRows_check_currecny = mysql_num_rows($check_currecny);
  
  if($totalRows_check_currecny == 0){
     $insertSQL = sprintf("INSERT INTO `currency` (`staff_id`, `name`, `code`, `symbol`, `data_added`) VALUES (%s,%s,%s,%s,%s)",
                      GetSQLValueString($stafs_id, "int"),
                      GetSQLValueString($result_explode[0], "text"),
                      GetSQLValueString($result_explode[1], "text"),
                      GetSQLValueString($result_explode[2], "text"),
                      GetSQLValueString($today, "date"));
                        mysql_select_db($database_ebdc, $ebdc);
                        $Result1 = mysql_query($insertSQL, $ebdc)or die(mysql_error());
                        
                      if($Result1==1){
                            header(sprintf("Location: %s", "https://".$location."5555"));
                            
                        }else {
                            header(sprintf("Location: %s", "https://".$location."5557"));
                        }  
  }else{
    header(sprintf("Location: %s", "https://".$location."5556"));
  }
  
 
  
}

?>
