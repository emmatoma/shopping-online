<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // redirect to the homepage or any other page you want
exit();
?>