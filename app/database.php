<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'todos';

$conn = mysql_connect($host, $user, $password) or die (mysql_error());
mysql_select_db($database , $conn);


