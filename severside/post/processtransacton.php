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


$today            = date ("Y-m-d");
$location         = $_SERVER['SERVER_NAME']."/".$_POST['url'];
$customermoney    = $_POST['Amount']/$_POST['rate'];
$MM_Centernumber  = $_SESSION['MM_Centernumber'];
$MM_Username      = $_SESSION['MM_Username'];
$deport_id        = $_POST['deport_id'];

//validation for money avallabilty
$datatocheck="Transfer";
mysql_select_db($database_ebdc, $ebdc);
$query_check_transaction_balance = "SELECT (`transaction`.amount) AS transaction_made,
(deposit.amount) AS openingbalance, 
(deposit.amount-SUM(`transaction`.amount)) AS balance
FROM ebdc.`transaction`, ebdc.deposit, ebdc.staff, ebdc.center
WHERE `transaction`.deposit_id = deposit.id
AND `transaction`.staff_id = staff.staff_id
AND staff.center_id = center.id
AND `transaction`.deposit_id = '$deport_id'
AND center.`number` = '$MM_Centernumber'
AND `transaction`.tran_type != 'Transfer'
GROUP BY `transaction`.deposit_id";
$check_transaction_balance = mysql_query($query_check_transaction_balance, $ebdc) or die(mysql_error());
$row_check_transaction_balance = mysql_fetch_assoc($check_transaction_balance);
$totalRows_check_transaction_balance = mysql_num_rows($check_transaction_balance);

mysql_select_db($database_ebdc, $ebdc);
$query_getting_staffid      = "SELECT staff.staff_id 
FROM ebdc.staff, ebdc.center  
WHERE username='$MM_Username' AND staff.center_id=center.id AND center.number='$MM_Centernumber'";
$getting_staffid            = mysql_query($query_getting_staffid, $ebdc) or die(mysql_error());
$row_getting_staffid        = mysql_fetch_assoc($getting_staffid);
$totalRows_getting_staffid  = mysql_num_rows($getting_staffid);

$staff_id = $row_getting_staffid['staff_id'];

      if($totalRows_check_transaction_balance == 1){
        //working fine
      $transaction_made = $row_check_transaction_balance['transaction_made'];
      $openingbalance   = $row_check_transaction_balance['openingbalance'];
      $balance          = $row_check_transaction_balance['balance'];
      
      if($openingbalance==$transaction_made){
        header(sprintf("Location: %s", "https://".$location."2172021"));
      }
      else if($customermoney > $openingbalance){
        header(sprintf("Location: %s", "https://".$location."2172022"));
      }
      else if(($openingbalance==$balance) || ($customermoney<$openingbalance) || ($customermoney==$balance)){
        $insertSQL = sprintf("INSERT INTO `transaction` (deposit_id, staff_id, customer_name, amount, rate, tran_type, transaction_date) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['deport_id'], "int"),
                       GetSQLValueString($staff_id, "int"),
                       GetSQLValueString($_POST['Customername'], "text"),
                       GetSQLValueString($_POST['Amount']/$_POST['rate'], "numeric"),
                       GetSQLValueString($_POST['rate'], "int"),
                       GetSQLValueString($_POST['type'], "text"),
                       GetSQLValueString($today, "date"));

                      mysql_select_db($database_ebdc, $ebdc);
                      $Result1 = mysql_query($insertSQL, $ebdc)or die(mysql_error());
                      // echo "done";
                      // or die(mysql_error())
                      
                      if($Result1==1){
                          header(sprintf("Location: %s", "https://".$location."2172018"));
                      }else{
                          
                          header(sprintf("Location: %s", "https://".$location."2172020"));
                      }
      }
      else{
      header(sprintf("Location: %s", "https://".$location."2172020"));  
      }
  }else{
    header(sprintf("Location: %s", "https://".$location."7342018"));
  }
?>