<?php


class Produto{

    private $id;
	private $nome;
	private $preco;
	private $quantidade;

	function getId() { 
 		return $this->id; 
	} 

	function setId($id) {  
		$this->id = $id; 
	} 

	function getNome() { 
 		return $this->nome; 
	} 

	function setNome($nome) {  
		$this->nome = $nome; 
	} 

	function getPreco() { 
 		return $this->preco; 
	} 

	function setPreco($preco) {  
		$this->preco = $preco; 
	} 

	function getQuantidade() { 
 		return $this->quantidade; 
	} 

	function setQuantidade($quantidade) {  
		$this->quantidade = $quantidade; 
	} 

}	
?>