<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_denuncia = "fdb5.royalwebhosting.net";
$database_denuncia = "1321137_b5b3";
$username_denuncia = "1321137_b5b3";
$password_denuncia = "kikevanelalo";
$denuncia = mysql_pconnect($hostname_denuncia, $username_denuncia, $password_denuncia) or trigger_error(mysql_error(),E_USER_ERROR); 
?>