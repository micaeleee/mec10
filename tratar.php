<?php
    //var_dump($_POST);
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $genero = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $curso = $_POST['curso'];

    $diretorioDeImagens = $_SERVER["DOCUMENT_ROOT"].'/imagens/'; 
    $caminhoTemporario = $_FILES['imagem']['tmp_name']; 
    $caminhoDefinitivo = $diretorioDeImagens . basename($_FILES['imagem']['name']);

    if (move_uploaded_file($caminhoTemporario, $caminhoDefinitivo)) {
        echo "Arquivo válido e enviado com sucesso.\n";
    } else {
        echo "Erro ao armazenar o arquivo.\n";
    }


    $pronome = '';
    if($genero == 1) {
        $pronome = "Sra.";
    } else if($genero == 2) {
        $pronome = "Sr.";
    }

    try {
        include_once('conexao.php');
        // A variável $pdo, usada a seguir, está vindo do conexao.php

        $consulta = $pdo->prepare("INSERT INTO aluno
        (nome, sobrenome, nascimento, cpf, telefone, email, genero_id, curso_id, imagem)
        VALUES
        (:nome, :sobrenome, :nascimento, :cpf, :telefone, :email, :genero_id, :curso_id, :imagem)");

        $consulta->bindValue(":nome", $nome);
        $consulta->bindValue(":sobrenome", $sobrenome);
        $consulta->bindValue(":nascimento", $data_nascimento);
        $consulta->bindValue(":cpf", $cpf);
        $consulta->bindValue(":telefone", $telefone);
        $consulta->bindValue(":email", $email);
        $consulta->bindValue(":genero_id", $genero);
        $consulta->bindValue(":curso_id", $curso);
        $consulta->bindValue(":imagem", basename($_FILES['imagem']['name']));  

        $consulta->execute();

    } catch(Exception $e) {
        die("Erro de banco de dados: " . $e->getMessage());
    }

    header('location: listar.php');
?>