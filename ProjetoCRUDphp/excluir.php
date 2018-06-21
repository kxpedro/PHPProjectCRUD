<?php

    extract($_GET);
    require_once 'FuncionarioDAO.php';
    
    $funDAO = new FuncionarioDAO();

    $funDAO->excluir($id);

echo '
<script type="text/javascript">
    alert ("Excluido com sucesso");
    window.location.href="index.php?listar=Listar";
</script>';
