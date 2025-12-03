<?php
include('config.php');

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $paciente_id = $_POST['paciente_id_paciente'];
        $medico_id = $_POST['medico_id_medico'];
        $valor = $_POST['valor_consulta'];
        $data = $_POST['data_consulta'];

        $sql = "INSERT INTO consulta (data_consulta, valor_consulta, paciente_id_paciente, medico_id_medico)
                VALUES ('{$data}', '{$valor}', {$paciente_id}, {$medico_id})";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('consulta cadastrada com sucesso!');</script>";
            print "<script>location.href='listar-consultas.php';</script>";
        } else {
            print "<script>alert('Erro ao cadastrar consulta! Detalhes: " . $conn->error . "');</script>";
            print "<script>location.href='listar-consultas.php';</script>";
        }
        break;

    case 'editar':
        // Implementação da edição de consultas, se necessário.
        break;

    case 'excluir':
        // Implementação da exclusão de consultas, se necessário.
        break;
}
?>
