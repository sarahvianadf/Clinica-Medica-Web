<h1>Salvar Funcionário</h1>

<?php
include('config.php');
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $_POST['nome_medico'];
        $email = $_POST['email_medico'];
        $telefone = $_POST['telefone_medico'];

        $sql = "INSERT INTO medico (nome_medico, email_medico, telefone_medico)
                VALUES ('{$nome}', '{$email}', '{$telefone}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";
        } else {
            print "<script>alert('Erro ao cadastrar!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";
        }
        break;

        case 'editar':
       		$nome = $_POST['nome_medico'];
        	$email = $_POST['email_medico'];
        	$telefone = $_POST['telefone_medico'];

        	$sql = "UPDATE medico SET nome_medico='{$nome}', email_medico='{$email}', telefone_medico='{$telefone}' WHERE id_medico=".$_REQUEST['id_medico'];

        	$res = $conn->query($sql);

        	if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";
        	} else {
            print "<script>alert('Não editar!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";
        }
        break;
        case 'excluir':
        	$sql = "DELETE FROM medico WHERE id_medico=".$_REQUEST['id_medico'];

        	$res = $conn->query($sql);

        	if($res == true){
        		print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";
        	}else{
            print "<script>alert('Não excluiu!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";

        	}
        	break;

}
?>
