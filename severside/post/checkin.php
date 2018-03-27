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
$Username           = $_SESSION['MM_Username'];
$Centernumber       = $_SESSION['MM_Centernumber'];
$currencydeposit_id = $_POST['currencydeposit_id'];
$currencymatch      = $_POST['currencymatch'];
$martch_id          = $_POST['martch_id'];
$amount             = $_POST['amount'];
$symbol             = $_POST['symbol'];
$today              = date ("Y-m-d");
$location           = "https://".$_SERVER['SERVER_NAME']."/#!/makedeposit/Make Deport/";


mysql_select_db($database_ebdc, $ebdc);
$query_staff_name ="SELECT concat(staff.fname, ' ', staff.lname) AS staff_name,staff.staff_id
FROM ebdc.staff
WHERE staff.username='$Username' AND staff.center_id=(SELECT center.id FROM ebdc.center WHERE center.number='$Centernumber')";
$staff_name = mysql_query($query_staff_name, $ebdc) or die(mysql_error());
$row_staff_name = mysql_fetch_assoc($staff_name);
$totalRows_staff_name = mysql_num_rows($staff_name);

$staff_name_data = $row_staff_name['staff_name'];
$stafs_id        = $row_staff_name['staff_id'];

mysql_select_db($database_ebdc, $ebdc);
$query_check_deposit ="SELECT * FROM ebdc.deposit
WHERE deposit.id ='$currencydeposit_id'";
$check_deposit = mysql_query($query_check_deposit, $ebdc) or die(mysql_error());
$row_check_deposit = mysql_fetch_assoc($check_deposit);
$totalRows_check_deposit = mysql_num_rows($check_deposit);


$insertSQL = sprintf("INSERT INTO `ebdc`.`check_in_check_out_history` (`deposit_id`, `match_name`, `statues`,`symbol`,`amount`, `staff_name`, `date_added`) VALUES (%s,%s,%s,%s,%s,%s,%s)",
                      GetSQLValueString($currencydeposit_id, "int"),
                      GetSQLValueString($currencymatch, "text"),
                      GetSQLValueString("Check in", "text"),
                      GetSQLValueString($symbol, "text"),
                      GetSQLValueString($amount, "int"),
                      GetSQLValueString($staff_name_data, "text"),
                      GetSQLValueString($today, "date"));
                      
                        mysql_select_db($database_ebdc, $ebdc);
                        $Result1 = mysql_query($insertSQL, $ebdc)or die(mysql_error());
                        
                      if($Result1==1){
                          //it work and checking for old deporst
                          if($row_check_deposit==0){
                            //we need an insrt not update
                            $insertSQL = sprintf("INSERT INTO `ebdc`.`deposit` (`marched_id`, `staff_id`, `amount`, `date`) VALUES (%s,%s,%s,%s)",
                                                  GetSQLValueString($martch_id, "int"),
                                                  GetSQLValueString($stafs_id, "int"),
                                                  GetSQLValueString($amount, "int"),
                                                  GetSQLValueString($today, "date"));
                                                  mysql_select_db($database_ebdc, $ebdc);
                                                  $Result3 = mysql_query($insertSQL, $ebdc)or die(mysql_error());
                                            if($Result3==1){
                                            //inserting into the transaction table amke a defult value
                                            $insertSQL = "INSERT INTO `ebdc`.`transaction` (`deposit_id`, `staff_id`, `customer_name`, `amount`, `rate`, `tran_type`, `transaction_date`) 
                                            VALUES ( LAST_INSERT_ID(), '$stafs_id', 'Techvalley Robot', '0', '0', 'Cash', '$today')";
                                                  mysql_select_db($database_ebdc, $ebdc);
                                                  $Result4 = mysql_query($insertSQL, $ebdc)or die(mysql_error());
                                              
                                        header(sprintf("Location: %s", $location."7712"));
                                    }else{
                                        header(sprintf("Location: %s", $location."7710"));
                                    }      
                        
                          }else{
                            $insertSQL2 = sprintf("UPDATE `ebdc`.`deposit` SET `amount`=`amount`+'$amount' WHERE `id`=%s",
                                                GetSQLValueString($currencydeposit_id, "int"));
                                    mysql_select_db($database_ebdc, $ebdc);
                                    $Result2 = mysql_query($insertSQL2, $ebdc)or die(mysql_error());
                                    if($Result2==1){
                                        header(sprintf("Location: %s", $location."7712"));
                                    }else{
                                        header(sprintf("Location: %s", $location."7710"));
                                    }
                          }
                          
                      }else{
                          //did not work
                          header(sprintf("Location: %s", $location."7779"));
                      }


?>
