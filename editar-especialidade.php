<h1>Editar especialidade</h1>

<?php 
include('config.php');
	$sql = "SELECT * FROM especialidade WHERE id_especialidade=".$_REQUEST['id_especialidade']; 

	$res = $conn->query($sql);

	$row = $res->fetch_object();
?>


<form action="?page=salvar-especialidade" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_especialidade" value="<?php print $row->id_especialidade; ?>">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_especialidade" class="form-control"value="<?php print $row->nome_especialidade; ?>">
		</label>
	</div>
	<div>
		<button type="submit" class="btn  btn-primary">Enviar</button>
	</div>
</form>