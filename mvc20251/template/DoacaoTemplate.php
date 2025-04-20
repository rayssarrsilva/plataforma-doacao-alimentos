<?php
require_once 'ITemplate.php';

class DoacaoTemplate implements ITemplate {
    public function layout($pagina, $dados = null) {
        include($pagina);
    }
}
