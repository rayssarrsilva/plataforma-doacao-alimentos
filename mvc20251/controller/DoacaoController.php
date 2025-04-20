<?php
require_once './dao/DoacaoDAO.php';

class DoacaoController {
    public function registrar() {
        $dao = new DoacaoDAO();
        $dao->inserir($_POST['doador_id'], $_POST['instituicao_id'], $_POST['descricao']);
        header('Location: /mvc20251/public/form_doacao.php');
    }
}
