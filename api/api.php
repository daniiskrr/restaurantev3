<?php
include "../config/dataBase.php";
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}
    if ($method == "GET") {
        $conexion = DataBase::connect();
        $consulta = "SELECT * FROM reseña";
        $resultado = mysqli_query($conexion, $consulta);
        $resenas = array();
        $rowCount = mysqli_num_rows($resultado);
        
        if ($rowCount == 0) {
            echo "No hay valoraciones.";
        } else {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $resena = array(
                    "numeropedido" => $fila['num_pedido'],
                    "nombre" => $fila['nombre'],
                    "apellido" => $fila['apellido'],
                    "comentario" => $fila['mensaje'],
                    "valoracion" => $fila['valoracion']
                );
                array_push($resenas, $resena);
            }
            echo json_encode($resenas);
        }
    }
			
	if($method == "POST"){
		$datosJSON = file_get_contents('php://input');
		$datos = json_decode($datosJSON);
		$numeropedido = $datos->numeropedido;
		$nombre = $datos->nombre;
		$apellido = $datos->apellido;
		$comentario = $datos->comentario;
		$valoracion = $datos->valoracion;

    $conexion = DataBase::connect();
    $consulta = "SELECT * FROM reseña WHERE num_pedido = '$numeropedido'";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) > 0) {
        // Ya se ha hecho la reseña de este pedido
        $response = array(
            "type" => "warning",
            "text" => "Calmate!! Ya has enviado una reseña sobre este pedido!!"
        );
    } else {
        $consulta2 = "INSERT INTO reseña (num_pedido, nombre, apellido, mensaje, valoracion) VALUES ('$numeropedido', '$nombre', '$apellido', '$comentario', '$valoracion')";
        if (mysqli_query($conexion, $consulta2)) {
            //Creamos un array para el notie.alert en el caso que la reseña se inserte
            $response = array(
                "type" => "success",
                "text" => "Reseña insertada :)"
            );
        } else {
            //Creamos un array para el notie.alert en el caso que la consulta no se ejecute
            $response = array(
                "type" => "error",
                "text" => "Algo salió mal"
            );
        }
    }
    echo json_encode($response);
    }
?>