<?php
class resenyaController{
    public static function index(){
        
        $titulo = "Valoraciones";
        session_start();

        if(isset($_SESSION['usuario'])){ 
            $conexion = DataBase::connect();
            $consulta = "SELECT id_pedido FROM pedido WHERE id_usuario = '{$_SESSION['usuario']['id_usuario']}'";
            $resultado = mysqli_query($conexion, $consulta);
        }   

        require_once 'views/includes/cabecera.php';
        require_once 'views/valoraciones.php';
        require_once 'views/includes/footer.php';
    }
}
?>