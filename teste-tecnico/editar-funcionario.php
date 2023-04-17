<h1> Editar Funcionário </h1>
<?php
    $sql = "SELECT * FROM funcionario WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value='editar'>
    <input type="hidden" name="id" value="<?php print $row->id; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php print $row->nome; ?>" class="form-ajustes">
    </div>

    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php print $row->email; ?>" class="form-ajustes">
    </div>
    <div class="mb-3">
        <label>CPF</label>
        <input type="cpf" name="cpf" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}" required
            value="<?php print $row->cpf; ?>" class="form-ajustes">
    </div>
    <div class="mb=3 estadocivil">
        <label class="form-ajustes" for="estadocivil">Estado civil:</label>

        <select name="estado_civ" id="estado_civ" value=" <?php print $row->estado_civ; ?>">
            <option value="solteiro">Solteiro(a)</option>
            <option value="casado">Casado(a)</option>
            <option value="separado">Separado(a)</option>
            <option value="divorciado">Divorciado(a)</option>
            <option value="viuvo">Viuvo(a)</option>
        </select>
    </div>
    <div class="mb-3 form-data">
        <label>Data de Nascimento</label>
        <input type="date" name="data_nasc" value="<?php print $row->data_nasc; ?>" class="form-data" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Enviar
        </button>
    </div>