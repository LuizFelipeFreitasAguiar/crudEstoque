<?php
include_once('../conexao/Conexao.php');
include_once('../modal/Produto.php');
include_once('../dao/ProdutoDAO.php');

//instancia as classes
$produto = new Produto();
$produtoDAO = new ProdutoDAO();


//buscar dados passados pelo POST

$d = filter_input_array(INPUT_POST);

// operações de acordo com a condição
// se a codição for cadastrar

if(isset($_POST['cadastrar'])){

    $produto-> setNome($d['nome']);
    $produto-> setPreco($d['preco']);
    $produto-> setQuantidade($d['quantidade']);


    $produtoDAO->create($produto);

    header("Location: ../../");

} 
// se a codição for editar
else if(isset($_POST['editar'])){

    $produto-> setNome($d['nome']);
    $produto-> setPreco($d['preco']);
    $produto-> setQuantidade($d['quantidade']);
    $produto->setId($d['id']);

    $produtoDAO->update($produto);

    header("Location: ../../");
}
// se a codição for deletar
else if(isset($_GET['del'])){

    $produto->setId($_GET['del']);

    $produtoDAO->delete($produto);

    header("Location: ../../");
}else{
    header("Location: ../../");
}


?>
