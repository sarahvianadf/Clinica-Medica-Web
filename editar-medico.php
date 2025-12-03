<h1>Editar medico</h1>
<?php 
include('config.php');
	$sql = "SELECT * FROM medico WHERE id_medico=".$_REQUEST['id_medico']; 

	$res = $conn->query($sql);

	$row = $res->fetch_object();
?>


<form action="?page=salvar-medico" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_medico" value="<?php print $row->id_medico; ?>">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_medico" class="form-control"value="<?php print $row->nome_medico; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>E-mail
			<input type="email" name="email_medico" class="form-control" value="<?php print $row->email_medico; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>Telefone
			<input type="text" name="telefone_medico" class="form-control"value="<?php print $row->telefone_medico; ?>">
		</label>
	</div>
	<div>
		<button type="submit" class="btn  btn-primary">Enviar</button>
	</div>
</form>