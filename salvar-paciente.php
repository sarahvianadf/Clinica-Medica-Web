<h1>Salvar paciente</h1>

<?php
include('config.php');
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $_POST['nome_paciente'];
        $email = $_POST['email_paciente'];
        $telefone = $_POST['telefone_paciente'];

        $sql = "INSERT INTO paciente (nome_paciente, email_paciente, telefone_paciente)
                VALUES ('{$nome}', '{$email}', '{$telefone}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso!');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";
        } else {
            print "<script>alert('Erro ao cadastrar!');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";
        }
        break;

        case 'editar':
       		$nome = $_POST['nome_paciente'];
        	$email = $_POST['email_paciente'];
        	$telefone = $_POST['telefone_paciente'];

        	$sql = "UPDATE paciente SET nome_paciente='{$nome}', email_paciente='{$email}', telefone_paciente='{$telefone}' WHERE id_paciente=".$_REQUEST['id_paciente'];

        	$res = $conn->query($sql);

        	if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";
        	} else {
            print "<script>alert('Não editar!');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";
        }
        break;
        case 'excluir':
        	$sql = "DELETE FROM paciente WHERE id_paciente=".$_REQUEST['id_paciente'];

        	$res = $conn->query($sql);

        	if($res == true){
        		print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";
        	}else{
            print "<script>alert('Não excluiu!');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";

        	}
        	break;

}
?>
