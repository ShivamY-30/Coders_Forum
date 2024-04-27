<?php
session_start();
session_unset();
// echo "logging out";
session_destroy();
header("location:/FORUMS/");
?>