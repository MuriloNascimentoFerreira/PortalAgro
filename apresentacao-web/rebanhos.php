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
    <title>Gerenciar Rebanhos</title>
</head>
<body>

    <header>
        <h1>Gerenciar rebanhos</h1>
        
    </header>
    
    <main class="container">
        <form action="http://localhost/portalagro/logica/ControllerRebanho.php" class="row gy-2 gx-3 align-items-center" method="post">
            <div class="col-sm-6">
                <label class="form-label" for="form-label">Título</label>
                <input required type="text" class="form-control" id="titulo" name="descricao" placeholder="Ex: Gado do pasto alugado">
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
                <button type="submit" class="btn btn-success px-4">Adicionar</button>
            </div>
             
        </form>

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="row">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Total de animais</th>
                        <th ></th>
                        <th ></th>
                        
                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                        include_once("../persistencia/RepositoryRebanho.php");
                        $repositoryRebanho = new RepositoryRebanho();
                        $rebanhos = $repositoryRebanho->listar();

                        foreach ($rebanhos as $rebanho):?>
                        <tr>
                        <th> <?php echo $rebanho->getId()?> </th>
                        <td> <?php echo $rebanho->getDescricao()?> </td>
                        <td> <?php echo $rebanho->getTipo()?> </td>
                        <td> <?php echo ''?> </td>
                        <td><a href="http://localhost/portalagro/apresentacao-web/rebanhos?<?php /* echo $rebanho->getId()*/?>.php>" class="btn btn-primary">Acessar</a></td>
                        <td><a href="#" class="btn btn-danger">Excluir</a></td>
                        </tr>
                            
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>
    

    <footer>

        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum et, sint deleniti nostrum omnis delectus expedita porro reprehenderit odio perspiciatis necessitatibus repudiandae beatae distinctio architecto, animi neque maiores nulla eveniet?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum et, sint deleniti nostrum omnis delectus expedita porro reprehenderit odio perspiciatis necessitatibus repudiandae beatae distinctio architecto, animi neque maiores nulla eveniet?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum et, sint deleniti nostrum omnis delectus expedita porro reprehenderit odio perspiciatis necessitatibus repudiandae beatae distinctio architecto, animi neque maiores nulla eveniet?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum et, sint deleniti nostrum omnis delectus expedita porro reprehenderit odio perspiciatis necessitatibus repudiandae beatae distinctio architecto, animi neque maiores nulla eveniet?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum et, sint deleniti nostrum omnis delectus expedita porro reprehenderit odio perspiciatis necessitatibus repudiandae beatae distinctio architecto, animi neque maiores nulla eveniet?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum et, sint deleniti nostrum omnis delectus expedita porro reprehenderit odio perspiciatis necessitatibus repudiandae beatae distinctio architecto, animi neque maiores nulla eveniet?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum et, sint deleniti nostrum omnis delectus expedita porro reprehenderit odio perspiciatis necessitatibus repudiandae beatae distinctio architecto, animi neque maiores nulla eveniet?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum et, sint deleniti nostrum omnis delectus expedita porro reprehenderit odio perspiciatis necessitatibus repudiandae beatae distinctio architecto, animi neque maiores nulla eveniet?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum et, sint deleniti nostrum omnis delectus expedita porro reprehenderit odio perspiciatis necessitatibus repudiandae beatae distinctio architecto, animi neque maiores nulla eveniet?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum et, sint deleniti nostrum omnis delectus expedita porro reprehenderit odio perspiciatis necessitatibus repudiandae beatae distinctio architecto, animi neque maiores nulla eveniet?</p>
        <var>  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum et, sint deleniti nostrum omnis delectus expedita porro reprehenderit odio perspiciatis necessitatibus repudiandae beatae distinctio architecto, animi neque maiores nulla eveniet?</p>
        -->
    </footer>

    <script  type="text/javascript" src="js/javascript.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
