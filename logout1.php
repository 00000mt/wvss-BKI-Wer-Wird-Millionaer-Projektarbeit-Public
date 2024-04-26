<?php
session_start();
session_unset();
session_destroy();
header("Location: anmeldeseite.php"); // Weiterleitung zur Anmeldeseite
exit;
?>
