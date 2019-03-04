<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['doc_id']);
unset($_SESSION['hosp_id']);
unset($_SESSION['shift']);
header("Location: firstpage.php");
?>