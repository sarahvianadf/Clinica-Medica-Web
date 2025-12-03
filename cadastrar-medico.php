<h1>Cadastrar medico</h1>
<form action="?page=salvar-medico" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_medico" class="form-control">
		</label>
	</div>
	<div class="mb-3">
		<label>E-mail
			<input type="email" name="email_medico" class="form-control">
		</label>
	</div>
	<div class="mb-3">
		<label>Telefone
			<input type="text" name="telefone_medico" class="form-control">
		</label>
	</div>
	<div>
		<button type="submit" class="btn  btn-primary">Enviar</button>
	</div>
</form>