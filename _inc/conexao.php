<?php
session_start();
$mysql_banco='narutohi_nh2';
$mysql_usuario='root';
$mysql_senha='';
$mysql_host='localhost';
$conexao=mysql_pconnect($mysql_host,$mysql_usuario,$mysql_senha);
mysql_select_db($mysql_banco);
mysql_query("SET NAMES 'utf8'");
?>