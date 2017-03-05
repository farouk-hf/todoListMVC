<?php
ini_set('display_errors', 1); 
ini_set('log_errors',1); 
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once (dirname(__FILE__).'/database.php');
require_once '/core/App.php';
require_once '/core/Controller.php';
