<?php
require 'scripts/core.inc.php';
ob_start();
session_destroy();
header('Location: index.php');


?>