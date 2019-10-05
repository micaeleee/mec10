<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">    
</head>
<body>
    <table class="table table-striped table-hover">
        <thead>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Nascimento</th>
            <th>CPF</th>
            <th>Curso</th>
            <th>Imagem</th>
        </thead>
<?php
    try {
        require('conexao.php');
        // A variável $pdo, usada a seguir, está vindo do conexao.php

        $consulta = $pdo->prepare("SELECT aluno.nome, aluno.sobrenome, aluno.cpf, aluno.nascimento, aluno.imagem, curso.nome AS curso
        FROM sgtcc_a.aluno AS aluno
        JOIN sgtcc_a.curso AS curso
        ON aluno.curso_id = curso.id");
        $consulta->execute();

        $alunos = $consulta->fetchAll();
        /*
        for($i = 0; $i < count($alunos); $i++) {
            echo "<p>{$alunos[$i]["nome"]}</p>";
        }
        */
        foreach($alunos as $aluno) {
            echo "<tr>
                    <td>{$aluno["nome"]}</td>
                    <td>{$aluno["sobrenome"]}</td>
                    <td>{$aluno["nascimento"]}</td>
                    <td>{$aluno["cpf"]}</td>
                    <td>{$aluno["curso"]}</td>
                    <td><img src='imagens\\{$aluno["imagem"]}'></td> 
                </tr>";
        }

    } catch(Exception $e) {
        die("Erro de banco de dados: " . $e->getMessage());
    }    
?>    
    </table>
    <p><a href="index.php">Voltar ao início.</a></p>
    <script src="vendor/popper.min.js"></script>
    <script src="vendor/jquery-3.3.1.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
