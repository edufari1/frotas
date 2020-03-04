<!DOCTYPE html>
<html>
<head>
	<title>cadastro de cores</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Cadastro de cores</h1>
	<form method="POST" action="cadasto_cores.php">
		<label>Código da cor</label>
		<input type="number" name="codigo">
		<label>Nome da cor</label>
		<input type="text" name="cor"><br>
		<label for 1>Cadastrar</label>
		<input type="radio" name="acao" value="1"><br>	
		<label for 2>Consultar pela descrição</label>
		<input type="radio" name="acao" value="2"><br>
		<label for 3>Consultar pelo codiggo</label>
		<input type="radio" name="acao" value="3"><br>
		<label for 4>Atualizar cor</label>
		<input type="radio" name="acao" value="4"><br>
		<label for 5>Deletar cor</label>
		<input type="radio" name="acao" value="5"><br>

		<input type="submit" name="submit">


	</form>
</body>
</html>