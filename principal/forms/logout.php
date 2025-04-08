<link rel="stylesheet" href="../style.css">
<?php
session_start();
session_destroy();
header("Location: ../index.php"); // ou login_instituicao.php se quiser
exit;
