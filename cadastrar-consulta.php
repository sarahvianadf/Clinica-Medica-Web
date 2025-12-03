<?php include('config.php'); ?>
<h1>Cadastrar consulta</h1>
<form action="salvar-consulta.php" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label for="paciente_id_paciente" class="form-label">paciente</label>
        <select name="paciente_id_paciente" id="paciente_id_paciente" class="form-control" required>
            <option value="">Selecione o paciente</option>
            <?php
            $sql_paciente = "SELECT id_paciente, nome_paciente FROM paciente ORDER BY nome_paciente";
            $res_paciente = $conn->query($sql_paciente);
            if ($res_paciente && $res_paciente->num_rows > 0) {
                while ($row_paciente = $res_paciente->fetch_object()) {
                    print "<option value='{$row_paciente->id_paciente}'>{$row_paciente->nome_paciente}</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="medico_id_medico" class="form-label">Funcionário</label>
        <select name="medico_id_medico" id="medico_id_medico" class="form-control" required>
            <option value="">Selecione o Funcionário</option>
            <?php
            $sql_medico = "SELECT id_medico, nome_medico FROM medico ORDER BY nome_medico";
            $res_medico = $conn->query($sql_medico);
            if ($res_medico && $res_medico->num_rows > 0) {
                while ($row_medico = $res_medico->fetch_object()) {
                    print "<option value='{$row_medico->id_medico}'>{$row_medico->nome_medico}</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="especialidade_id_especialidade" class="form-label">especialidade do Veículo</label>
        <select name="especialidade_id_especialidade" id="especialidade_id_especialidade" class="form-control" required>
            <option value="">Selecione o especialidade</option>
            <?php
            $sql_especialidade = "SELECT id_especialidade, nome_especialidade FROM especialidade ORDER BY nome_especialidade";
            $res_especialidade = $conn->query($sql_especialidade);
            if ($res_especialidade && $res_especialidade->num_rows > 0) {
                while ($row_especialidade = $res_especialidade->fetch_object()) {
                    print "<option value='{$row_especialidade->id_especialidade}'>{$row_especialidade->nome_especialidade}</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="valor_consulta" class="form-label">Valor da consulta (R$)</label>
        <input type="number" step="0.01" name="valor_consulta" id="valor_consulta" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="data_consulta" class="form-label">Data da consulta</label>
        <input type="date" name="data_consulta" id="data_consulta" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Registrar consulta</button>
    </div>
</form>
