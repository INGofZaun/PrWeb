<?php
class UsuarioDAO
{
    public static function existeUsuario($username, $password)
    {
        $conexion = Conexion::conectar();

        try {
            $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE username = :username AND password = :password");
            $consulta->bindParam(':username', $username);
            $consulta->bindParam(':password', $password);
            $consulta->execute();

            // Verificar si se encontró un usuario
            return $consulta->rowCount() > 0;
        } catch (PDOException $e) {
            exit($e->getMessage());
        } finally {
            Conexion::desconectar();
        }
    }
}
?>
