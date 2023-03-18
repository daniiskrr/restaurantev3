<?php
class reseña{
    public $id_reseña;
    public $num_pedido;
    public $nombre;
    public $apellido;
    public $mensaje;
    public $fecha;
    public $valoracion;

    public function __construct($id_reseña,$num_pedido,$nombre,$apellido,$mensaje,$fecha,$valoracion){
        $this->id_reseña = $id_reseña;
        $this->num_pedido = $num_pedido;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->mensaje = $mensaje;
        $this->fecha = $fecha;
        $this->valoracion = $valoracion;
    }

    
    public function getId_reseña()
    {
        return $this->id_reseña;
    }

    public function setId_reseña($id_reseña)
    {
        $this->id_reseña = $id_reseña;
    }

    public function getNum_pedido()
    {
        return $this->num_pedido;
    }

    public function setNum_pedido($num_pedido)
    {
        $this->num_pedido = $num_pedido;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function getValoracion()
    {
        return $this->valoracion;
    }

    public function setValoracion($valoracion)
    {
        $this->valoracion = $valoracion;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
}
?>