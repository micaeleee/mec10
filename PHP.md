---
tags: [Didática]
title: PHP
created: '2019-09-12T14:12:46.874Z'
modified: '2019-09-12T18:57:23.192Z'
---

# PHP

## Enviando arquivos para o servidor


### 1 Preparando o formulário

O formulário deve usar `enctype="multipart/form-data"` para indicar que pode haver arquivos na requisição.

```php
<form action="processar.php" method="post" enctype="multipart/form-data">
    <input type="file" name="imagem">
    <input type="submit">
</form>
```

### 2 Tratando a requisição

```php
<?php
    $diretorioDeImagens = $_SERVER["DOCUMENT_ROOT"].'/imagens/';
    $caminhoTemporario = $_FILES['imagem']['tmp_name']; 
    $caminhoDefinitivo = $diretorioDeImagens . basename($_FILES['imagem']['name']);

    if (move_uploaded_file($caminhoTemporario, $caminhoDefinitivo)) {
        echo "Arquivo válido e enviado com sucesso.\n";
    } else {
        echo "Erro ao armazenar o arquivo.\n";
    }
?>
```
