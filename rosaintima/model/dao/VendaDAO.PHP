<?php
    class VendaDAO { //Falta fazer essa parte

    public function create($venda) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO venda(data_venda, valor_total, forma_pagamento, id_funcionario, id_cliente) 
                     VALUES (:d, :v, :p, :f, :c)"
                );
                $query->bindValue(':d', $venda->getData_venda(), PDO::PARAM_STR);
                $query->bindValue(':v', $venda->getValor_total(), PDO::PARAM_STR);
                $query->bindValue(':p', $venda->getForma_pagamento(), PDO::PARAM_STR);
                //Bind para a chave estrangeira
                $query->bindValue(':f', $venda->getFuncionario()->getId(), PDO::PARAM_STR);
                $query->bindValue(':c', $venda->getCliente()->getId(), PDO::PARAM_STR);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM venda");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaVendas = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $venda = new Venda(); //Classe bean
                    $venda->setId($linha['id_venda']);
                    $venda->setData_venda($linha['data_venda']);
                    $venda->setValor_total($linha['valor_total']);
                    $venda->setForma_pagamento($linha['forma_pagamento']);

                    array_push($listaVendas, $venda);

                }

                return $listaVendas;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
    
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM venda WHERE id_venda = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $venda = new Venda(); //Classe bean
                    $venda->setId($linha['id_venda']);
                    $venda->setData_venda($linha['data_venda']);
                    $venda->setValor_total($linha['valor_total']);
                    $venda->setForma_pagamento($linha['forma_pagamento']);
                }
                    return $venda;

            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
            
        }

        public function update($venda) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE venda
                    SET data_venda = :d, valor_total = :v, forma_pagamento = :p,
                    WHERE id_venda = :i"
                );
                $query->bindValue(':d', $venda->getData_venda(),PDO::PARAM_INT);
                $query->bindValue(':v', $venda->getValor_total(),PDO::PARAM_STR);
                $query->bindValue(':p', $venda->getForma_pagamento(),PDO::PARAM_STR);
                $query->bindValue(':i', $venda->getId(),PDO::PARAM_INT);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM venda
                    WHERE id_venda = :i"
                );
                $query->bindValue(':i', $id,PDO::PARAM_INT);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }

    }