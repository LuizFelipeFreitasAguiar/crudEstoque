<?php
include_once "./app/conexao/Conexao.php";
include_once "./app/dao/ProdutoDAO.php";
include_once "./app/modal/Produto.php";

//instancia as classes
$produto = new Produto();
$produtodao = new ProdutoDAO();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Cadastro de Produtos</title>
    <style>
        .menu,
        thead {
            background-color: #bbb !important;
        }

        .row {
            padding: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
            <a class="navbar-brand" href="#">
                Cadastro de Produtos
            </a>
        </div>
    </nav>
    <div class="container">
        <form action="app/controller/ProdutoController.php" method="POST">
            <div class="row">
                <div class="col-md-3">
                    <label>Nome</label>
                    <input type="text" name="nome" value="" autofocus class="form-control" require />
                </div>
                <div class="col-md-5">
                    <label>Preço</label>
                    <input type="number" step="0.01" name="preco" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Quantidade</label>
                    <input type="number" name="quantidade" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <br>
                    <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtodao->read() as $produto) : ?>
                        <tr>
                            <td><?= $produto->getId() ?></td>
                            <td><?= $produto->getNome() ?></td>
                            <td><?= $produto->getPreco() ?></td>
                            <td><?= $produto->getQuantidade() ?></td>
                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $produto->getId() ?>">
                                    Editar
                                </button>
                                <a href="app/controller/ProdutoController.php?del=<?= $produto->getId() ?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editar><?= $produto->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="app/controller/ProdutoController.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" value="<?= $produto->getNome() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-7">
                                                    <label>Preço</label>
                                                    <input type="number" name="preco" value="<?= $produto->getPreco() ?>" class="form-control" require />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Quantidade</label>
                                                    <input type="number" name="quantidade" value="<?= $produto->getQuantidade() ?>" class="form-control" require />
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $produto->getId() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Cadastrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>