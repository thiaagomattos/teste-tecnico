<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $data_nasc = $_POST["data_nasc"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $estado_civ = $_POST["estado_civ"];


        $sql = "INSERT INTO funcionario (nome, data_nasc, cpf, email, estado_civ) VALUES ('{$nome}', '{$data_nasc}', '{$cpf}', '{$email}', '{$estado_civ}')";     

        $res = $conn->query($sql);



        if(strlen($nome) < 3) {
            print "<script>alert('Use seu nome verdadeiro!')</script>";
            
            $res=false;
        }

        if($res==true){
            print "<script>alert('Funcionário cadastrado com sucesso!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar o funcionário!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;
    case 'editar':
        $nome = $_POST["nome"];
        $data_nasc = $_POST["data_nasc"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $estado_civ = $_POST["estado_civ"];

        $sql = "UPDATE funcionario SET
                    nome='{$nome}',
                    data_nasc='{$data_nasc}',
                    cpf='{$cpf}',
                    email='{$email}',
                    estado_civ='{$estado_civ}'
                WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Funcionário editado com sucesso!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível editar o funcionário!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;
    case 'excluir':

        $sql = "DELETE FROM funcionario WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Funcionário excluído com sucesso!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível excluir o funcionário!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }

        break;
}