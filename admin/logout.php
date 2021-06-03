<?php
session_start();
session_destroy();
header("Location: ../?logged=1");
exit();
?>