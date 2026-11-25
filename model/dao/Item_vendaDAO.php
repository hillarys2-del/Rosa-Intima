<?php
    class Item_vendaDAO {

    public function create($item_venda) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO item_venda(quantidade, preco_unitario, id_venda, id_produto) 
                     VALUES (:q, :u, :v, :p)"
                );
                $query->bindValue(':q', $item_venda->getQuantidade(), PDO::PARAM_STR);
                $query->bindValue(':u', $item_venda->getPrecoU(), PDO::PARAM_STR);
                //Bind para a chave estrangeira
                $query->bindValue(':v', $item_venda->getVenda()->getId(), PDO::PARAM_INT);
                $query->bindValue(':p', $item_venda->getProduto()->getId(), PDO::PARAM_INT);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM item_venda WHERE id_venda = :v");
                $query->bindValue(':v', $id, PDO::PARAM_INT);
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaItem_vendas = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $item_venda = new Item_venda(); //Classe bean
                    $item_venda->setQuantidade($linha['quantidade']);
                    $item_venda->setPrecoU($linha['preco_unitario']);

                    //Atributo da associação 
                    $daoVenda = new VendaDAO();
                    $venda = $daoVenda->find($linha['id_venda']);
                    $item_venda->setVenda($venda);

                    //Atributo da associação 
                    $daoProduto = new ProdutoDAO();
                    $produto = $daoProduto->find($linha['id_produto']);
                    $item_venda->setProduto($produto);

                    array_push($listaItem_vendas, $item_venda);

                }

                return $listaItem_vendas;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
    
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM item_venda 
                    WHERE id_item_venda = :i");

                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $item_venda = new Item_venda(); //Classe bean
                    $item_venda->setId($linha['id_item_venda']);
                    $item_venda->setQuantidade($linha['quantidade']);
                    $item_venda->setPrecoU($linha['preco_unitario']);

                    //Atributo da associação 
                    $daoVenda = new VendaDAO();
                    $venda = $daoVenda->find($linha['id_venda']);
                    $item_venda->setVenda($venda);

                    //Atributo da associação 
                    $daoProduto = new ProdutoDAO();
                    $produto = $daoProduto->find($linha['id_produto']);
                    $item_venda->setProduto($produto);
                }
                    return $item_venda;

            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
            
        }

        public function update($item_venda) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE item_venda
                    SET quantidade = :q
                        preco_unitario = :u,
                        id_venda = :v,
                        id_produto = :p
                    WHERE id_item_venda = :i"
                );
                $query->bindValue(':i', $item_venda->getId(),PDO::PARAM_INT);
                $query->bindValue(':q', $item_venda->getQuantidade(),PDO::PARAM_STR);
                $query->bindValue(':u', $item_venda->getPrecoU(),PDO::PARAM_STR);
                $query->bindValue(':v', $item_venda->getVenda()->getId(), PDO::PARAM_INT);
                $query->bindValue(':p', $item_venda->getProduto()->getId(), PDO::PARAM_INT);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($idVenda, $idProduto) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM item_venda
                    WHERE id_venda = :v and id_produto = :p"
                );
                $query->bindValue(':v', $idVenda,PDO::PARAM_INT);
                $query->bindValue(':p', $idProduto,PDO::PARAM_INT);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }

    }