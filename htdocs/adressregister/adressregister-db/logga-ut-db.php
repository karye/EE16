<?php
session_start();
session_unset();
session_destroy();
header('Location: logga-in-db.php');
exit;