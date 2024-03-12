<?php
session_start();
$_SESSION['connected'] = false;
// unset($_SESSION['pseudo']);
session_unset();
header("Location: /php/site_conversion/home.php");
session_unset();