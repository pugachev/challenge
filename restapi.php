<?php
session_start();
$json = file_get_contents('php://input');
$_SESSION['rcvjson'] = mb_convert_encoding($json,"utf-8","auto");
echo 'success';
?>