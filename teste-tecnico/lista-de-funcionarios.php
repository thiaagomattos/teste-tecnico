<h1> Lista de Funcionários </h1>
<?php
    $sql = "SELECT * FROM funcionario";

    $res = $conn->query($sql);

    $quantidade = $res->num_rows;

    if($quantidade > 0){
        print "<table class='table table-hover table-striped table-bordered'>";
            print "<tr>";
            print "<th>#</th>";
            print "<th>Nome</th>";
            print "<th>Data de Nascimento</th>";
            print "<th>CPF</th>";
            print "<th>E-mail</th>";
            print "<th>Estado Civil</th>";
            print "<th>Ações</th>";
            print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id;"</td>";
            print "<td>".$row->nome;"</td>";
            print "<td>".$row->data_nasc;"</td>";
            print "<td>".$row->cpf;"</td>";
            print "<td>".$row->email;"</td>";
            print "<td>".$row->estado_civ;"</td>";
            print "<td>
                    <button onclick=\"location.href='?page=editar&id=".$row->id."';\"class='btn btn-success'>Editar</button>

                    <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\"class='btn btn-danger'>Excluir</button>
                </td>";
            print "</tr>";
        }
        print "</table>";

    } else {
        print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
    }