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
        include_once("../persistencia/RepositoryRebanho.php");
        include_once("../logica/Rebanho.php");
        session_start();
        $repositoryRebanho = new RepositoryRebanho();
        $rebanho = $repositoryRebanho->getRebanho($_GET['id']);
        $rebanho
        //criar o formulario de adicionar e a tabela de listar os animais
        if(isset($_GET['id']) && $rebanho->getId() == $_SESSION['usuario_id']){
         // se tiver esse paramentro na url ele vai buscar por todos os animais que pertencem a esse id(id do rebanho)
            echo 'permitido 1';
            if($rebanho->getId() == $_SESSION['usuario_id']){
                echo 'permitido2';
            }else{
                echo "acesso negado";
                header("location:rebanhos.php");
            }   

        }
       
    ?>
    <div class="container">
        <h1 class="pb-1">Gerenciar Animais</h1>
 
        <form action="../logica/ControllerRebanhoEditar.php" class="row gy-2 gx-3 align-items-center" method="post">
            <div class="col-sm-6">
                <label class="form-label" for="titulo">Título</label>
                <input required type="text" class="form-control" id="titulo" name="descricao" placeholder="teste<?php /*echo $this->animal->rebanho->getDescricao();*/?>">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="autoSinizingSelect">Tipo</label>
                <select class="form-select" id="select" name="tipo">
                    <option selected value="<?php /*echo $this->animal->rebanho->getTipoEmNumero();*/?>"><?php /*echo $this->animal->rebanho->getTipoEmString();*/?></option>
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
    
        <h2 class="text-start mt-4 pb-1">Nome do rebanho atual<?php /*echo $this->animal->rebanho->getDescricao();*/?></h2>

        <!-- quando clicar deve chamar o animal controller e se tudo tiver certo chamar essa tela novamente com o animal já listado -->
        <form action="../logica/ControllerAnimal.php" class="row gy-2 gx-3 md-1 align-items-center" method="post">
            <div class="col-sm-2">
                <label class="form-label" for="racao">Ração(kg)</label>
                <input required type="text" class="form-control" id="racao" name="racao" placeholder="Ex: 5">
            </div>

            <div class="col-sm-2">
                <label class="form-label" for="peso">Peso(kg)</label>
                <input required type="text" class="form-control" id="peso" name="peso" placeholder="">
            </div>

            <div class="col-sm-3">
                <label class="form-label" for="titulo">Data De Nascimento</label>
                <input required type="date" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="">
            </div>

            <div class="col-md-2">
                <label class="form-label" for="select">Situação</label>
                <select class="form-select" id="select" name="situacao">
                    <option selected value="1">Vivo </option>
                    <option value="2">Abatido</option>
                  </select>
            </div>

            <div class="col-auto align-self-end">
                <button type="submit" class="btn btn-success px-4">Adicionar</button>
            </div>

        </form>
        
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="row">#</th>
                        <th scope="col">Ração(kg)</th>
                        <th scope="col">Peso(kg)</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Situação</th>
                        <th ></th>
                        <th ></th>
                        
                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                        include_once("../persistencia/RepositoryAnimal.php");
                        $repositoryAnimal = new RepositoryAnimal();
                        $animais = $repositoryAnimal->listar();

                        foreach ($animais as $animal):?>
                        <tr>
                        <th> <?php echo $animal->getId()?> </th>
                        <td> <?php echo $animal->getRacao()?> </td>
                        <td> <?php echo $animal->getPeso()?> </td>
                        <td> <?php echo $animal->getDataNascimento()?> </td>
                        <td> <?php echo $animal->getSituacao()?> </td>

                            <!-- http://localhost/portalagro/logica/ControllerAnimalEditar.php?id=<?php /*echo $rebanho->getId(); */?> -->

                        <td><a href="#" class="btn btn-primary">Acessar</a></td>
                        <td><a href="#" class="btn btn-danger">Excluir</a></td>
                        </tr>
                            
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
    
    <script  type="text/javascript" src="js/javascript.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>