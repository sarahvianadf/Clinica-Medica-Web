<h1>Editar paciente</h1>

<?php 
include('config.php');
	$sql = "SELECT * FROM paciente WHERE id_paciente=".$_REQUEST['id_paciente']; 

	$res = $conn->query($sql);

	$row = $res->fetch_object();
?>


<form action="?page=salvar-paciente" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_paciente" value="<?php print $row->id_paciente; ?>">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_paciente" class="form-control"value="<?php print $row->nome_paciente; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>E-mail
			<input type="email" name="email_paciente" class="form-control" value="<?php print $row->email_paciente; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>Telefone
			<input type="text" name="telefone_paciente" class="form-control"value="<?php print $row->telefone_paciente; ?>">
		</label>
	</div>
	<div>
		<button type="submit" class="btn  btn-primary">Enviar</button>
	</div>
</form>