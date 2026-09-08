<?php
    class FuncionarioDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM funcionario");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaFuncionarios = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $funcionario = new Funcionario(); //Classe bean
                    $funcionario->setId($linha['id_funcionario']);
                    $funcionario->setNome($linha['nome']);
                    $funcionario->setCpf($linha['cpf']);
                    $funcionario->setCargo($linha['cargo']);
                    $funcionario->setTelefone($linha['telefone']);

                    array_push($listaFuncionarios, $funcionario);

                }

                return $listaFuncionarios;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
            
        }
    }