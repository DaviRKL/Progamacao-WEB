﻿<?php 
	include("./inc/header.php")
?>
	<h3 align = center> Tabela CRUD sobre Carros - Alteração</h3>

<?php
	
	include_once('conexao.php');
	// recuperando 
	$codigo = $_POST['id'];
	
	// criando a linha do  SELECT
	$sqlconsulta =  "select * from tabelacarro where id = $codigo";
	
	// executando instrução SQL
	$resultado = @mysqli_query($conexao, $sqlconsulta);
	if (!$resultado) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
	} else {
		$num = @mysqli_num_rows($resultado);
		if ($num==0){
		echo "<b>Id: </b>não localizado !!!!<br><br>";
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		exit;		
		}else{
			$dados=mysqli_fetch_array($resultado);
			unlink ('imagens/'.$dados['foto']);
		}
	} 
	
	mysqli_close($conexao);
?>
<form name="produto" enctype="multipart/form-data" action="alterar.php" method="post" align = center>
<b>Id:</b><br> <input type="number" name="id"  style="width:500px" value="<?php echo $dados['id']; ?>"readonly ><br><br>
<b>Modelo:</b><br> <input type="text" name="modelo"  style="width:500px" value="<?php echo $dados['modelo']; ?>" ><br><br>
<b>Marca: </b><br><input type="text" name="marca"  style="width:500px" value="<?php echo $dados['marca']; ?>" ><br><br>
<b>Ano: </b><br> <input type="text" name="ano" style="width:500px" value="<?php echo $dados['ano']; ?>" ><br><br>
<b>DataCad:</b><br><input type="date" name="datacad" style="width:500px" value="<?php echo $dados['datacad']; ?>"  > <br><br>
<b>Foto:</b><br><input type="file" name="foto"style="align: center; width: 500px;" value="<?php echo '<img src="'.$dados['foto'].'">'; ?><br><br>
	<input type="submit" value="Ok">&nbsp;&nbsp;
	<input type="reset" value="Limpar">
	<input type='button' onclick="window.location='alteracao.php';" value="Voltar">
</form>
</body>
</html>
