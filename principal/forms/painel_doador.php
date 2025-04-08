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
    <h2>Bem-vindo, <?php echo $_SESSION["doador_nome"]; ?></h2>

    <div class="link-boxes">
        <a href="produtos_disponiveis.php" class="link-btn">Produtos Cadastrados</a>
        <a href="minhas_solicitacoes.php" class="link-btn">Solicitações feitas</a>
        <a href="doadores_forms.php" class="link-btn">Cadastrar Produtos para Doação</a>
        <a href="solicitacoes_form.php" class="link-btn">Solicitações de Retirada</a>
    </div>
    <a href="logout.php" class="logout-btn">Sair</a>
</div>
