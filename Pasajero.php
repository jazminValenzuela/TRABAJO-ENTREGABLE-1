<?php

class Pasajero{
    // atributos
    private $nombre;
    private $apellido;
    private $numDocumento;
    private $telefono;

    // metodos
    function __construct($nombre, $apellido, $telefono, $numDocumento) {
    	$this->nombre = $nombre;
    	$this->apellido = $apellido;
        $this->telefono = $telefono;
    	$this->numDocumento = $numDocumento;
    }

    public function getNombre() {
    	return $this->nombre;
    }

    public function getApellido() {
    	return $this->apellido;
    }

    public function getNumDocumento() {
    	return $this->numDocumento;
    }

    public function getTelefono() {
    	return $this->telefono;
    }

    /**
    * @param $nombre
    */
    public function setNombre($nombre) {
    	$this->nombre = $nombre;
    }

    /**
    * @param $apellido
    */
    public function setApellido($apellido) {
    	$this->apellido = $apellido;
    }

    /**
    * @param $numDocumento
    */
    public function setNumDocumento($numDocumento) {
    	$this->numDocumento = $numDocumento;
    }

    /**
    * @param $telefono
    */
    public function setTelefono($telefono) {
    	$this->telefono = $telefono;
    }

    public function __toString(){
        $cadena = "\nNOMBRE: " . $this->getNombre()."|". 
                  " APELLIDO: " . $this->getApellido()."|".
                  " NUMERO DE DOCUMENTO: " . $this->getNumDocumento()."|".
                  " TELEFONO: " . $this->getTelefono() ;
        return $cadena;
    }
}