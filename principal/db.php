<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "doacoes_db"; // Substitua com o nome do seu banco

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
