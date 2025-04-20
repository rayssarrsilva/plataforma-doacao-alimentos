<?php
require_once './generic/Conexao.php';

class DoacaoDAO {
    public function inserir($doadorId, $instituicaoId, $descricao) {
        $sql = "INSERT INTO doacoes (doador_id, instituicao_id, descricao) VALUES (?, ?, ?)";
        $stmt = Conexao::getInstancia()->prepare($sql);
        $stmt->execute([$doadorId, $instituicaoId, $descricao]);
    }
}
