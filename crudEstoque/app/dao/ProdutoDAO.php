<?php


class ProdutoDAO{
   
    public function create(Produto $produto){
        try {
            $sql = "INSERT INTO produto (
                nome, preco, quantidade) VALUES (:nome, :preco, :quantidade)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $produto->getNome());
            $p_sql->bindValue(":preco",$produto->getPreco());
            $p_sql->bindValue(":quantidade", $produto->getQuantidade());


            return $p_sql->execute();

        }catch(Exception $e){
            print "Erro ao cadastrar produto <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM produto order by nome asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaProduto($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    public function update(Produto $produto) {
        try {
            $sql = "UPDATE produto set
                
                  nome=:nome,
                  preco=:preco,
                  quantidade=:quantidade
                                
                                                                       
                  WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $produto->getNome());
            $p_sql->bindValue(":preco", $produto->getPreco());
            $p_sql->bindValue(":quantidade", $produto->getQuantidade());
            $p_sql->bindValue(":id", $produto->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete(Produto $produto) {
        try {
            $sql = "DELETE FROM produto WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $produto->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir produto<br> $e <br>";
        }
    }


    

    private function listaProduto($row) {
        $produto = new Produto();
        $produto->setId($row['id']);
        $produto->setNome($row['nome']);
        $produto->setPreco($row['preco']);
        $produto->setQuantidade($row['quantidade']);


        return $produto;
    }
 }


?>