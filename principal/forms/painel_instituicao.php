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
<?php endif; ?>


<div class="card">
    <h2>Bem-vindo, <?php echo $_SESSION["instituicao_nome"]; ?></h2>

    <div class="link-boxes">
        <a href="produtos_disponiveis.php" class="link-btn">Produtos Cadastrados pelos Doadores</a>
        <a href="doacoes.php" class="link-btn">Solicitar Retirada</a>
        <a href="instituicoes_form.php" class="link-btn">Cadastrar solicitação da instituição</a>
        <a href="solicitacoes_form.php" class="link-btn">Solicitações de Retirada</a>
    </div>
    <a href="logout.php" class="logout-btn">Sair</a>
</div>


