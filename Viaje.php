<?php

class Viaje{
    // atributos
    private $codigoViaje;
    private $destino;
    private $cantMaximaPasajeros;
    private $objColeccionPasajeros;
    private $objResponsable;
    
    // metodos
    function __construct($codigoViaje, $destino, $cantMaximaPasajeros, $objColeccionPasajeros, $objResponsable) {
    	$this->codigoViaje = $codigoViaje;
    	$this->destino = $destino;
    	$this->cantMaximaPasajeros = $cantMaximaPasajeros;
    	$this->objColeccionPasajeros = $objColeccionPasajeros;
        $this->objResponsable = $objResponsable;
    }

    public function getCodigoViaje() {
    	return $this->codigoViaje;
    }

    public function getDestino() {
    	return $this->destino;
    }

    public function getCantMaximaPasajeros() {
    	return $this->cantMaximaPasajeros;
    }

    

    public function getObjResponsable() {
    	return $this->objResponsable;
    }

    public function getObjColeccionPasajeros() {
    	return $this->objColeccionPasajeros;
    }

    /**
    * @param $objColeccionPasajeros
    */
    public function setObjColeccionPasajeros($objColeccionPasajeros) {
    	$this->objColeccionPasajeros = $objColeccionPasajeros;
    }

    /**
    * @param $codigoViaje
    */
    public function setCodigoViaje($codigoViaje) {
    	$this->codigoViaje = $codigoViaje;
    }

    /**
    * @param $destino
    */
    public function setDestino($destino) {
    	$this->destino = $destino;
    }

    /**
    * @param $cantMaximaPasajeros
    */
    public function setCantMaximaPasajeros($cantMaximaPasajeros) {
    	$this->cantMaximaPasajeros = $cantMaximaPasajeros;
    }

   

    /**
    * @param $objResponsable
    */
    public function setObjResponsable($objResponsable) {
    	$this->objResponsable = $objResponsable;
    }



    public function modificarPasajero( $nombre, $apellido, $telefono, $dni){
        $encontrado = false;
        $i=0;
        while($i<count($this->getObjColeccionPasajeros()) && !$encontrado){
            $coleccionPasajeros = $this->getObjColeccionPasajeros()[$i];
            if($dni == $coleccionPasajeros->getNumDocumento()){
                $coleccionPasajeros->setNombre($nombre);
                $coleccionPasajeros->setApellido($apellido);
                $coleccionPasajeros->setTelefono($telefono);
                $encontrado= true;
            }
            $i++;
        }
        return $coleccionPasajeros;
    }


    public function buscarPasajero($dniBuscado){
        $encontrado = false;
        $i=0;
        while(!$encontrado && $i<(count($this->getObjColeccionPasajeros()))){
            $coleccionPasajeros = $this->getObjColeccionPasajeros()[$i];
            if($coleccionPasajeros->getNumDocumento() == $dniBuscado){
                $encontrado = true;
            }
            $i++;
        }
        return $encontrado;
    }

    public function buscarResponsable($numEmpleado){
        $encontrado = false;
        $responsable = $this->getObjResponsable();
        if($responsable->getNumEmpleado() == $numEmpleado){
            $encontrado = true;
        }
        return $encontrado;
    }

    public function mostrarPasajeros($objColeccionPasajeros){
        $coleccionPasajeros = null;
        for($i=0; $i < (count($this->getObjColeccionPasajeros())); $i++){
            $pasajero = $this->objColeccionPasajeros[$i];
            $coleccionPasajeros = $coleccionPasajeros. $pasajero;
        }
        return $coleccionPasajeros;
    }

    public function __toString(){
        //string $arregloPasajeros
        $arregloPasajeros = null;
        for ($i=0; $i < (count($this->getObjColeccionPasajeros())) ; $i++) { 
            $pasajero = $this->getObjColeccionPasajeros()[$i];
            $arregloPasajeros = $arregloPasajeros . $pasajero;
        }

        $cadena = "\nCODIGO DE VIAJE: " .$this->getCodigoViaje().
                  "\nDESTINO: " .$this->getDestino().
                  "\nCANTIDAD MAXIMA DE PASAJEROS: " .$this->getCantMaximaPasajeros(). "\n".
                  "\nCOLECCION DE PASAJEROS: " . $arregloPasajeros . "\n" . 
                  "\nRESPONSABLE DEL VIAJE: " .$this->getObjResponsable(). "\n";
        return $cadena;

    }

 
}