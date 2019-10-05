<?php
    try {
        require('conexao.php');

        $consulta = $pdo->prepare("SELECT * FROM curso");
        $consulta->execute();

        $cursos = $consulta->fetchAll();

    } catch(Exception $e) {
        die("Erro de banco de dados: " . $e->getMessage());
    }    
?> 
<!DOCTYPE html>
<html lang="pt-br">
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
    <form method="post" action="tratar.php" enctype="multipart/form-data"> <!-- reconhecimento de arquivos -->
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome"  placeholder="Entre com seu nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" class="form-control" id="sobrenome"  placeholder="Entre com seu sobrenome" name="sobrenome">
        </div>       
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento"  name="data_nascimento">
        </div>         
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" placeholder="12345678900" name="cpf" size="11" maxlength="11">
        </div>
        <div class="form-group">
            <label for="genero">Gênero</label>
            <select class="form-control" id="genero" name="genero" required>
                <option value="1">Feminino</option>
                <option value="2">Masculino</option>
                <option value="3" selected>Não identificado</option>
            </select>
        </div>        
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="tel" class="form-control" id="telefone"  placeholder="63988880000" name="telefone" size="11" maxlength="11">
        </div>    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email"  placeholder="fulano@email.com" name="email">
        </div>

        <div class="form-group">  <!-- adicionando imagem -->
            <label for="imagem">Imagem</label>
            <input type="file" class="form-control" id="imagem" name="imagem">
        </div>

        <div class="form-group">
            <label for="curso">Curso</label>
            <select class="form-control" id="curso" name="curso" required>
                
                <?php
                foreach($cursos as $curso) {
                    echo "<option value='{$curso["id"]}'>{$curso["nome"]}</option>";
                }                
                ?>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <script src="vendor/popper.min.js"></script>
    <script src="vendor/jquery-3.3.1.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>