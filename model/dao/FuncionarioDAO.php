<?php
    class FuncionarioDAO {
        public function create($funcionario) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO funcionario(nome, cpf, cargo, telefone) 
                     VALUES (:n, :c, :e, :t)"
                );
                $query->bindValue(':n', $funcionario->getNome(),PDO::PARAM_STR);
                $query->bindValue(':c', $funcionario->getCpf(),PDO::PARAM_STR);
                $query->bindValue(':e', $funcionario->getCargo(),PDO::PARAM_STR);
                $query->bindValue(':t', $funcionario->getTelefone(),PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM funcionario");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listafuncionarios = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $funcionario = new Funcionario(); //Classe bean
                    $funcionario->setId($linha['id_funcionario']);
                    $funcionario->setNome($linha['nome']);
                    $funcionario->setCpf($linha['cpf']);
                    $funcionario->setCargo($linha['cargo']);
                    $funcionario->setTelefone($linha['telefone']);

                    array_push($listafuncionarios, $funcionario);

                }

                return $listafuncionarios;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
            
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM funcionario WHERE id_funcionario = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $funcionario = new Funcionario(); //Classe bean
                    $funcionario->setId($linha['id_funcionario']);
                    $funcionario->setNome($linha['nome']);
                    $funcionario->setCpf($linha['cpf']);
                    $funcionario->setCargo($linha['cargo']);
                    $funcionario->setTelefone($linha['telefone']);
                }
                    return $funcionario;

            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
            
        }

        public function update($funcionario) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE funcionario
                    SET nome = :n, cpf = :c, cargo = :c, telefone = :t 
                    WHERE id_funcionario = :i"
                );
                $query->bindValue(':n', $funcionario->getNome(),PDO::PARAM_STR);
                $query->bindValue(':c', $funcionario->getCpf(),PDO::PARAM_STR);
                $query->bindValue(':e', $funcionario->getCargo(),PDO::PARAM_STR);
                $query->bindValue(':t', $funcionario->getTelefone(),PDO::PARAM_STR);
                $query->bindValue(':i', $funcionario->getId(),PDO::PARAM_INT);

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
                    "DELETE FROM funcionario
                    WHERE id_funcionario = :i"
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