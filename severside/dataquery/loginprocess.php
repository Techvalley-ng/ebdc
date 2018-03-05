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



// setting form values to the php vars
  $loginUsername                =$_POST['username'];
  $password                     =$_POST['password'];
  $centernumber                 =$_POST['CenterNumber'];
  $MM_fldUserAuthorization      = "";
  $MM_redirectLoginSuccess      = "billscheck.php";
  $MM_redirectLoginFailed       = $_SERVER['SERVER_NAME'].'/#!/login/4044';
  $MM_redirecttoReferrer        = false;
  
//setecting the AWS database   
  mysql_select_db($database_ebdc, $ebdc);
  
 //undergoing the sql query to check the user from the database
 //SELECT username, password FROM staff WHERE username=%s AND password=%s
 $LoginRS__query=sprintf("SELECT center.`number`, staff.username FROM center, staff WHERE center.id = staff.center_id AND staff.username=%s AND staff.password=%s AND center.`number`=%s",
    GetSQLValueString($loginUsername, "text"), 
    GetSQLValueString($password, "text"),
    GetSQLValueString($centernumber, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $ebdc) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
    
//checking for the use at the result send from the database
 if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username']        = $loginUsername;
    $_SESSION['MM_Centernumber']    = $centernumber;
    $_SESSION['MM_UserGroup']       = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: https://". $MM_redirectLoginFailed );
  }
    
?>

