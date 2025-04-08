<link rel="stylesheet" href="../style.css">

<?php
session_start();

$painel_url = "";

if (isset($_SESSION["doador_id"])) {
    $painel_url = "painel_doador.php";
} elseif (isset($_SESSION["instituicao_id"])) {
    $painel_url = "painel_instituicao.php";
}
?>
<?php if ($painel_url): ?>
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="<?php echo $painel_url; ?>" class="link-btn">Ir para o Painel</a>
    </div>
<?php endif; 


include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO instituicoes (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);
    $stmt->execute();

    echo "Instituição registrada! <a href='login_instituicao.php'>Ir para login</a>";
}
?>

<h2>Registro de Instituição</h2>
<form method="post">
    Nome: <input type="text" name="nome" required><br>
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Registrar</button>
</form>
