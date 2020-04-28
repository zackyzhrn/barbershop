<?php
session_start();
print_r($_SESSION);


echo date('d/m/Y', strtotime('+1 day', time()));
?>