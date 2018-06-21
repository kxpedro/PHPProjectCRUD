<?php

    extract($_GET);
    require_once 'FuncionarioDAO.php';
    
    $funDAO = new FuncionarioDAO();

	echo '<form method="post"> 
		<i>Preencha os campos que deseja editar!</i><br>
		<i>Pode escolher editar somente um ou todos</i>
	    <h4>Novo Nome:</h4><input type="text" name="nome">
	    <h4>Novo Data de nascimento:</h4><input type="date" name="nasc">
	    <h4>Novo Salario:</h4><input type="number" name="sal">
	    <h4>Novo Foto:</h4><input type="text" name="foto">
	    <input type="submit" name="enviar"/>
	</form>';

	$nome   = isset($_POST["nome"]) ? $_POST["nome"] : '';
	$nasc   = isset($_POST["nasc"]) ? $_POST["nasc"] : '';
	$sal    = isset($_POST["sal"]) ? $_POST["sal"] : '';
	$foto   = isset($_POST["foto"]) ? $_POST["foto"] : '';
	$enviar = isset($_POST["enviar"]) ? $_POST["enviar"] : '';

	if ($enviar != null) {
		if ($nome != null) {		
			$col = 'nome';
			$novo = $_POST['nome'];

			$funDAO->editar($col,$novo,$id);
			echo '
			<script type="text/javascript">
			    alert ("Editado com sucesso");
			    window.location.href="index.php?listar=Listar";
			</script>';		
		}
	}

	if ($enviar != null) {
		if ($nasc != null) {
			
			$col = 'nasc';
			$novo = $_POST['nasc'];

			$funDAO->editar($col,$novo,$id);
			echo '
			<script type="text/javascript">
			    alert ("Editado com sucesso");
			    window.location.href="index.php?listar=Listar";
			</script>';			
		}
	}

	if ($enviar != null) {
		if ($sal != null) {
			
			$col = 'sal';
			$novo = $_POST['sal'];

			$funDAO->editar($col,$novo,$id);
			echo '
			<script type="text/javascript">
			    alert ("Editado com sucesso");
			    window.location.href="index.php?listar=Listar";
			</script>';			
		}
	}

	if ($enviar != null) {
		if ($foto != null) {
			
			$col = 'foto';
			$novo = $_POST['foto'];

			$funDAO->editar($col,$novo,$id);
			echo '
			<script type="text/javascript">
			    alert ("Editado com sucesso");
			    window.location.href="index.php?listar=Listar";
			</script>';
		}
    }


