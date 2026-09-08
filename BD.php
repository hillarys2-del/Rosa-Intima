<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                "mysql:host=localhost;dbname=bd_rosaintima",
                "root",
                "root"
            );

            return $conn;
        }
    }