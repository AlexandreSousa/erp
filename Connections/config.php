<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_config = "127.0.0.1";
$database_config = "sgga2";
$username_config = "alexandresousa";
$password_config = "";
$config = mysql_pconnect($hostname_config, $username_config, $password_config) or trigger_error(mysql_error(),E_USER_ERROR); 
$res2 = mysql_select_db($database_config,$config) or die ("erro ao selecionar a o banco de dados");
?>
