<?php
session_start();
unset($_SESSION['member']);

echo "<script>window.location='../index.php';</script>";
?>