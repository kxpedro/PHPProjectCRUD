<!DOCTYPE html>
<html>
<head>
	<title>Projeto CRUD PHP</title>
</head>
<body>
	<style>
		table, th, td {
		    border: 1px solid black;
		}
		table {
		    max-width: 2000px;
		}
		td {
		    min-width: 150px;
		}

		.p{
			 display: inline-block;
		}

	</style>

	<h1>Projeto CRUD PHP</h1>
	<form method="get" class="p">
		<input type="submit" name="cadastro" value="Cadastrar">
		<input type="submit" name="listar" value="Listar">
	</form>
	<br>
	<?php

	require_once 'FuncionarioTO.php';
	require_once 'FuncionarioDAO.php';

	$cadastro = isset($_GET["cadastro"]) ? $_GET["cadastro"] : '';
	$listar   = isset($_GET["listar"]) ? $_GET["listar"] : '';
	
	$funDAO = new FuncionarioDAO();

	if($cadastro != null){
		echo '<form method="post"> 
			    <h4>Nome:<h4/><input type="text" name="nome"><br>
			    <h4>Data de nascimento:<h4/><input type="date" name="nasc"><br>
			    <h4>Salario:<h4/><input type="number" name="sal"><br>
			    <h4>Foto:<h4/><input type="text" name="foto"><br>
			    <h4><input type="submit" name="enviar"/>
			  </form>';

		$nome   = isset($_POST["nome"]) ? $_POST["nome"] : '';
		$nasc   = isset($_POST["nasc"]) ? $_POST["nasc"] : '';
		$sal    = isset($_POST["sal"]) ? $_POST["sal"] : '';
		$foto   = isset($_POST["foto"]) ? $_POST["foto"] : '';
		$enviar = isset($_POST["enviar"]) ? $_POST["enviar"] : '';

		$fun = new FuncionarioTO($nome, $nasc, $sal, $foto);	
			
		if ($enviar != null) {
			$funDAO->Inserir($fun);
			echo '
			<script type="text/javascript">
			    alert ("Cadastro efetuado com sucesso");
			    window.location.href="index.php?listar=Listar";
			</script>';			
		}
	}

	$resultado = $funDAO->Listar();


	if($listar != null){	
		echo " <br>";
		foreach($resultado as $linha){
		    echo '			   

				<table>		
					<tr>
						<td><b>Nome</td>
						<td><b>Data de nascimento</td>
						<td><b>Salario</td>
						<td><b>Foto</td>							
						<td><b>Editar</td>							
						<td><b>Excluir</td>							
					</tr>	
			    	<tr>
						<td>'. $linha->nome.'</td>
						<td>'. $linha->nasc.'</td>
						<td>'. $linha->sal.'</td>
						<td>'. $linha->foto.'</td>
						<td><a href="editar.php?id='.$linha->id.'"><img src=img/editar.png alt="editar" title="Editar"/></a></td>
			            <td><a href="excluir.php?id='.$linha->id.'"><img src=img/excluir.png alt="excluir" title="Excluir"/></a></td>
					</tr>
				</table>';

			}
		}
	?>
</body>
</html>	
	
