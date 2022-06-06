<?php
    if(session_status() == 1){
        session_start();
    }
    
    if(!$_SESSION['logado']){
        header('location:login.php');
    }
    if(isset($_GET['id'])){
        $_SESSION['rebanho_id'] = $_GET['id'];
        
    }
    
?>
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
        <a href="logout.php" class="btn btn-secondary">Sair</a>
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
                        <td class="align-center"> <?php echo $rebanho->getDescricao()?> </td>
                        <td> <?php echo $rebanho->getTipo()?> </td>
                        <td> <?php echo ''?> </td>
                        <td><a href="http://localhost/portalagro/apresentacao-web/formAnimais.php?id=<?php echo $rebanho->getId(); ?>" class="btn btn-primary">Acessar</a></td>
                        <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmarExclusao">Excluir</button></td>
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

    <form action="http://localhost/portalagro/logica/confirmaExclusao.php?id=<?php echo $rebanho->getId(); ?>" method="POST">
        <div class="modal" tabindex="-1" id="confirmarExclusao">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir esse rebanho?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Sim</button>
                </div>
                </div>
            </div>
        </div>
    </form>

    <script  type="text/javascript" src="js/javascript.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
