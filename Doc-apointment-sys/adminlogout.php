<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['hospital_id']);
header("Location: firstpage.php");
?>