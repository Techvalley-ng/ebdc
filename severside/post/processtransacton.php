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


$today= date ("Y-m-d");
$location = $_SERVER['SERVER_NAME']."/".$_POST['url'];
$customermoney = $_POST['Amount']/$_POST['rate'];

//validation for money avallabilty
$datatocheck="Transfar";
mysql_select_db($database_ebdc, $ebdc);
$query_tabs = "SELECT SUM(transaction.amount) AS transaction_made, (deposit.amount) AS openingbalance, (deposit.amount-SUM(transaction.amount)) AS balance, currency.name, (SELECT currency.code from currency where currency.currency_id = marched_currency.currency_id_incoming) AS incoming, (currency.code) AS outgoing,currency.symbol, (deposit.id) AS deposit_id, (transaction.id) AS transaction_id FROM `transaction`, deposit, marched_currency, `currency`, center WHERE `transaction`.deposit_id = deposit.id AND marched_currency.marched_id = deposit.marched_id AND marched_currency.currency_id_outgoing = `currency`.currency_id AND `currency`.center_id = center.id AND center.`number`=".$_SESSION['MM_Centernumber']." AND transaction.tran_type!='$datatocheck' AND deposit.id=".$_POST['deport_id']." GROUP BY `transaction`.deposit_id";
$tabs = mysql_query($query_tabs, $ebdc) or die(mysql_error());
$row_tabs = mysql_fetch_assoc($tabs);
$totalRows_tabs = mysql_num_rows($tabs);

if($totalRows_tabs==1){
  //working fine
  $transaction_made = $row_tabs['transaction_made'];
  $openingbalance = $row_tabs['openingbalance'];
  $balance = $row_tabs['balance'];
  
  if($openingbalance==$transaction_made){
    header(sprintf("Location: %s", "https://".$location."2172021"));
  }
  else if($customermoney > $openingbalance){
    header(sprintf("Location: %s", "https://".$location."2172022"));
  }
  else if(($openingbalance==$balance) || ($customermoney<$openingbalance) || ($customermoney==$balance)){
       $insertSQL = sprintf("INSERT INTO `transaction` (deposit_id, username, customer_name, amount, rate, tran_type, transaction_date) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['deport_id'], "int"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($_POST['Customername'], "text"),
                       GetSQLValueString($_POST['Amount']/$_POST['rate'], "int"),
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
    
  }else{
          header(sprintf("Location: %s", "https://".$location."2172020"));
  }
}else{
  header(sprintf("Location: %s", "https://".$location."7342018"));
}

?>