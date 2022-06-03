<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

    <link rel="stylesheet" href="styles/styleform.css">

    <title>Gerenciar Animais</title>
</head>
<body>

    <?php 
        include_once("../persistencia/RepositoryAnimal.php");

        //criar o formulario de adicionar e a tabela de listar os animais

        //criar a tabela de animais e fazer relação com os rebanhos

    ?>
    <div class="container">
        <h1>Gerenciar Animais</h1>

        <form action="ControllerAnimais.php" class="row gy-2 gx-3 align-items-center" method="post">
            <div class="col-sm-6">
                <label class="form-label" for="titulo">Título</label>
                <input required type="text" class="form-control" id="titulo" name="descricao" placeholder="teste<?php /*echo $this->rebanho->getDescricao();*/?>">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="autoSinizingSelect">Tipo</label>
                <select class="form-select" id="select" name="tipo">
                    <option selected value="2">Bovino</option>
                    <option value="1">Assinino</option>
                    <option value="3">Bufalino</option>
                    <option value="4">Caprino</option>
                    <option value="5">Equino</option>
                    <option value="6">Muar</option>
                    <option value="7">Ovino</option>
                    <option value="8">Suíno</option>
                  </select>
            </div>

            <div class="col-auto align-self-end">
                <button type="submit" class="btn btn-success px-4">Alterar</button>
            </div>

        </form>
    
        <h2 class="text-start mt-5">Nome do rebanho atual</h2>

    </div>
    
    <script  type="text/javascript" src="js/javascript.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>