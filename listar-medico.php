<h1>Listar medico</h1>
<?php 
include('config.php');

	$SQL = "SELECT * FROM medico";

	$res = $conn->query($SQL);

	$qtd = $res->num_rows;

	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<table class='table table-bordered table-striped table-houver'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Nome</th>";
		print "<th>E-mail</th>";
		print "<th>Telefone</th>";
		print "<th>Ações</th>";
		print "</tr>";
		while ($row = $res->fetch_object()) {
			print "<tr>";
			print "<td>".$row->id_medico."</td>";
			print "<td>".$row->nome_medico."</td>";
			print "<td>".$row->email_medico."</td>";
			print "<td>".$row->telefone_medico."</td>";
			print "<td>
				<button class='btn btn-success' onclick=\"location.href='?page=editar-medico&id_medico={$row->id_medico}';\">Editar</button>

				<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-medico&acao=excluir&id_medico={$row->id_medico}';}else{false;}\">Excluir</button>
				</td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "`<P> Não Encontrou resuiltado</p>";
	}

		



	