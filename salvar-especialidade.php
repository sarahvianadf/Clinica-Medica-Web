<h1>Salvar especialidades</h1>

<?php
include('config.php');
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $_POST['nome_especialidade'];
        
        $sql = "INSERT INTO especialidade (nome_especialidade)
                VALUES ('{$nome}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso!');</script>";
            print "<script>location.href='?page=listar-especialidade';</script>";
        } else {
            print "<script>alert('Erro ao cadastrar!');</script>";
            print "<script>location.href='?page=listar-especialidade';</script>";
        }
        break;

        case 'editar':
       		$nome = $_POST['nome_especialidade'];
        	

        	$sql = "UPDATE especialidade SET nome_especialidade='{$nome}' WHERE id_especialidade=".$_REQUEST['id_especialidade'];

        	$res = $conn->query($sql);

        	if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-especialidade';</script>";
        	} else {
            print "<script>alert('Não editar!');</script>";
            print "<script>location.href='?page=listar-especialidade';</script>";
        }
        break;
        case 'excluir':
        	$sql = "DELETE FROM especialidade WHERE id_especialidade=".$_REQUEST['id_especialidade'];

        	$res = $conn->query($sql);

        	if($res == true){
        		print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=listar-especialidade';</script>";
        	}else{
            print "<script>alert('Não excluiu!');</script>";
            print "<script>location.href='?page=listar-especialidade';</script>";

        	}
        	break;

}
?>
