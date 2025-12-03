<?php include("config.php"); ?>
<h1>Listar consulta</h1>

<?php
$sqli = "SELECT 
            v.id_consulta, 
            c.nome_paciente, 
            f.nome_medico, 
            m.nome_especialidade, 
            v.data_consulta, 
            v.valor_consulta 
        FROM 
            consulta AS v
        JOIN 
            paciente AS c ON v.paciente_id_paciente = c.id_paciente
        JOIN 
            medico AS f ON v.medico_id_medico = f.id_medico
        JOIN 
            especialidade AS m ON v.especialidade_id_especialidade = m.id_especialidade
        ORDER BY 
            v.data_consulta DESC";

$res = $conn->query($sqli);

if ($res === false) {
    die("Erro na consulta: " . $conn->error);
}

$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class=\"table table-hover table-striped table-bordered\">";
    print "<tr>";
    print "<th>#</th>";
    print "<th>paciente</th>";
    print "<th>Funcionário</th>";
    print "<th>especialidade</th>";
    print "<th>Data da consulta</th>";
    print "<th>Valor da consulta</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>{$row->id_consulta}</td>";
        print "<td>{$row->nome_paciente}</td>";
        print "<td>{$row->nome_medico}</td>";
        print "<td>{$row->nome_especialidade}</td>";
        print "<td>" . date("d/m/Y", strtotime($row->data_consulta)) . "</td>";
        print "<td>R$ " . number_format($row->valor_consulta, 2, ',', '.') . "</td>";
        print "<td>
                   <button onclick=\"location.href='?page=editar-consulta&id_consulta={$row->id_consulta}';\" class=\"btn btn-success\">Editar</button>
                   <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-consulta&acao=excluir&id_consulta={$row->id_consulta}';}else{false;}\" class=\"btn btn-danger\">Excluir</button>
               </td>";
        print "</tr>";
    }

    print "</table>";
} else {
    print "<p class=\"alert alert-danger\">Nenhuma consulta encontrada.</p>";
}
?>
