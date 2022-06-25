<?php
    session_start();
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript" src="js/formatarData.js"></script>
  
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>

    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

    <link rel="stylesheet" href="styles/styleform.css">

    <title>Gerenciar Animais</title>
</head>
<body>

    <?php 
        include_once("../persistencia/RepositoryRebanho.php");
        include_once("../logica/Rebanho.php");

        $repositoryRebanho = new RepositoryRebanho();
        $rebanho = $repositoryRebanho->getRebanho($_SESSION['rebanho_id']);
    

        if(isset($_SESSION['rebanho_id'])){
       
            if($rebanho->getUsuario()->getId() != $_SESSION['usuario_id']){
                header("location:rebanhos.php");
            }  

        }
       
    ?>
    <a href="rebanhos.php" class="btn btn-secondary float-left">Voltar</a>
    <div class="container">
        <h1 class="pb-1">Gerenciar Animais</h1>
 
        <form action="../logica/ControllerEditarRebanho.php?id=<?php echo $rebanho->getId();?>" class="row gy-2 gx-3 align-items-center" method="post">
            <div class="col-sm-6">
                <label class="form-label" for="titulo">Título</label>
                <input required type="text" class="form-control" id="titulo" name="descricao" value="<?php echo $rebanho->getDescricao();?>">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="autoSinizingSelect">Tipo</label>
                <select class="form-select" id="select" name="tipo">
                    
                <option selected value="<?php echo $rebanho->getTipoRebanhoEmNumero($rebanho->getTipo());?>"> <?php echo $rebanho->getTipo();?> </option>
                    
                    <?php if($rebanho->getTipo() != TipoRebanho::ASSININO):?>
                        <option value="1"><?php echo TipoRebanho::ASSININO?></option>
                    <?php endif ?>

                    <?php if($rebanho->getTipo() != TipoRebanho::BOVINO):?>
                        <option value="2"><?php echo TipoRebanho::BOVINO?></option>
                    <?php endif ?>

                    <?php if($rebanho->getTipo() != TipoRebanho::BUFALINO):?>
                        <option value="3"><?php echo TipoRebanho::BUFALINO?></option>
                    <?php endif ?>

                    <?php if($rebanho->getTipo() != TipoRebanho::CAPRINO):?>
                        <option value="4"><?php echo TipoRebanho::CAPRINO?></option>
                    <?php endif ?>

                    <?php if($rebanho->getTipo() != TipoRebanho::EQUINO):?>
                        <option value="5"><?php echo TipoRebanho::EQUINO?></option>
                    <?php endif ?>

                    <?php if($rebanho->getTipo() != TipoRebanho::MUAR):?>
                        <option value="6"><?php echo TipoRebanho::MUAR?></option>
                    <?php endif ?>

                    <?php if($rebanho->getTipo() != TipoRebanho::OVINO):?>
                        <option value="7"><?php echo TipoRebanho::OVINO?></option>
                    <?php endif ?>

                    <?php if($rebanho->getTipo() != TipoRebanho::SUINO):?>
                        <option value="8"><?php echo TipoRebanho::SUINO ?></option>
                    <?php endif ?>

                  </select>
            </div>

            <div class="col-auto align-self-end">
                <button type="submit" class="btn btn-success px-4">Alterar</button>
            </div>

        </form>

        <h2 class="text-start mt-4 pb-1">Adicionar animal ao rebanho</h2>

        <form action="../logica/ControllerAnimal.php" class="row gy-2 gx-3 md-1 align-items-center" method="post">
            <div class="col-sm-2">
                <label class="form-label" for="racao">Ração(kg)</label>
                <input required type="text" class="form-control" id="racao" name="racao" placeholder="">
            </div>

            <div class="col-sm-2">
                <label class="form-label" for="peso">Peso(kg)</label>
                <input required type="text" class="form-control" id="peso" name="peso" placeholder="">
            </div>

            <div class="col-sm-3">
                <label class="form-label" for="titulo">Data de Nascimento</label>
                <input required type="text" class="form-control" id="dataNascimento" name="dataNascimento" onfocus="formatarData()">
            </div>
            
            <div class="col-md-2">
                <label class="form-label" for="select">Situação</label>
                <select class="form-select" id="select" name="situacao">
                    <option selected value="1">Vivo</option>
                    <option value="2">Abatido</option>
                  </select>
            </div>

            <div class="col-auto align-self-end">
                <button type="submit" class="btn btn-success px-4">Adicionar</button>
            </div>

        </form>
        
        <h3 class="text-start mt-3 pb-2"><?php echo $rebanho->getDescricao();?></h3>

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
                        <td> <?php echo $animal->getDataNascimentoBr()?> </td>
                        <td> <?php echo $animal->getSituacao()?> </td>

                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarAnimal">Editar</button></td>  

                        <td><a href="../logica/ControllerMudarSituacaoAnimal.php?id=<?php echo $animal->getId() ?>" class="btn btn-warning">
                        <?php if ($animal->getSituacao() == TipoSituacao::VIVO){  
                            echo "Abater";
                        }else{
                            echo "Cancelar Abate";
                        }
                        ?></a></td>

                        <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmarExclusao">Excluir</button></td>
                        </tr>
                            
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <form action="../logica/ControllerExclusaoAnimal.php?id=<?php echo $animal->getId(); ?>" method="POST">
        <div class="modal" tabindex="-1" id="confirmarExclusao">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir esse animal?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Sim</button>
                </div>
                </div>
            </div>
        </div>
    </form>

    <form action="../logica/ControllerEditarAnimal.php?id=<?php echo $animal->getId(); ?>" method="POST">
        <div class="modal" tabindex="-1" id="editarAnimal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Animal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-sm-2">
                        <label class="form-label" for="racao">Ração(kg)</label>
                        <input required type="text" class="form-control" id="racao" name="racao" value= "<?php echo $animal->getRacao()?>">
                    </div>

                    <div class="col-sm-2">
                        <label class="form-label" for="peso">Peso(kg)</label>
                        <input required type="text" class="form-control" id="peso" name="peso" placeholder="" value= "<?php echo $animal->getPeso()?>">
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label" for="titulo">Data de Nascimento</label>
                        <input required type="text" class="form-control" id="dataNascimento2" name="dataNascimento" onfocus="formatarData()" value= "<?php echo $animal->getDataNascimentoBr()?>">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label" for="select">Situação</label>
                        <select class="form-select" id="select" name="situacao">
                            <option selected value="<?php echo $animal->getSituacaoNumero($animal->getSituacao())?>"><?php echo $animal->getSituacao()?></option>
    
                            <option value="<?php if($animal->getSituacao() == 'Vivo'){
                                echo 2;
                            }else{
                                echo 1;
                            }?>"><?php if($animal->getSituacao() == 'Vivo'){
                                echo "Abatido";
                            }else{
                                echo "Vivo";
                            }?></option>
                        </select>
                    </div>

                    <!-- adicionar uma tabela com os histórico de modificações do animal -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                </div>
            </div>
        </div>
    </form>
    
    <script type="text/javascript" src="js/javascript.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>