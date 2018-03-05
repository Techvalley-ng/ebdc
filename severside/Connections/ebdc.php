<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ebdc = "techvalleyorg.cksdzwllfbkt.us-east-2.rds.amazonaws.com";
$database_ebdc = "ebdc";
$username_ebdc = "techvalley";
$password_ebdc = "techvalley2015";
$ebdc = mysql_pconnect($hostname_ebdc, $username_ebdc, $password_ebdc) or trigger_error(mysql_error(),E_USER_ERROR); 
?>