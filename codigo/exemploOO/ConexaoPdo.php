<?php
class ConexaoPdo {
    private static $instancia;

    private function __construct() {}

    private function __clone() {}

    private function __wakeup() {}

    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            try {
                $servidor = "mysql:host=localhost;dbname=agenda";
                $usuario = "root";
                $senha = "123456789";

                self::$instancia = new PDO($servidor, $usuario, $senha);

                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $excecao) {
                echo $excecao->getMessage();
                exit();
            }
        }
        return self::$instancia;
    }
}
?>