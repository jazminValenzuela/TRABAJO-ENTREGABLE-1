<?php
 class ResponsableV{
    // atributos
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;
    

    function __construct($numEmpleado, $numLicencia, $nombre, $apellido) {
    	$this->numEmpleado = $numEmpleado;
    	$this->numLicencia = $numLicencia;
    	$this->nombre = $nombre;
    	$this->apellido = $apellido;
    
    }

    public function getNumEmpleado() {
    	return $this->numEmpleado;
    }

    public function getNumLicencia() {
    	return $this->numLicencia;
    }

    public function getNombre() {
    	return $this->nombre;
    }

    public function getApellido() {
    	return $this->apellido;
    }

    /**
    * @param $numEmpleado
    */
    public function setNumEmpleado($numEmpleado) {
    	$this->numEmpleado = $numEmpleado;
    }

    /**
    * @param $numLicencia
    */
    public function setNumLicencia($numLicencia) {
    	$this->numLicencia = $numLicencia;
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

     //PARA IMPRIMIR
     public function __toString(){
      $cadena = "\nNOMBRE RESPONSABLE: " . $this->getNombre()."|".
                " APELLIDO RESPONSABLE: " . $this->getApellido()."|".
                " NUMERO DE EMPLEADO: " . $this->getNumEmpleado()."|".
                " NUMERO DE LICENCIA: " . $this->getNumLicencia()."|" ;
      
      return $cadena;
      }
 }