<?php
include_once('Viaje.php');
include_once('Pasajero.php');
include_once('ResponsableV.php');


 function menu(){
     //int $eleccion
     echo "\n*******************MENÚ DE OPCIONES*******************\n" ;
     echo "1.MODIFICAR DATOS DEL PASAJERO \n";
     echo "2.AGREGAR PASAJEROS AL VIAJE \n";
     echo "3.CARGAR LA INFORMACION DEL RESPONSABLE DEL VIAJE \n";
     echo "4.MOSTRAR INFORMACION COMPLETA \n";
     echo "5.SALIR \n";
     echo "\nIngrese su opción: ";
     $eleccion = trim(fgets(STDIN));
     return $eleccion;
 }

  $objPasajero1 = new Pasajero("jazmin", "valenzuela", 2994584611, 43530680);
  $objPasajero2 = new Pasajero("nicolas", "torres", 2994448596,  43575236);
  $objPasajero3 = new Pasajero("nicolas", "bucarey", 2994573646, 41911258);
  $objPasajero4 = new Pasajero("victoria", "jimenez", 2992563144, 42457832);
  
  $arregloPasajeros=[];
  $arregloPasajeros[0]= $objPasajero1;
  $arregloPasajeros[1]= $objPasajero2;
  $arregloPasajeros[2]= $objPasajero3;
  $arregloPasajeros[3]= $objPasajero4;


  $objResponsable =  new ResponsableV(4322, 43530,"juan", "torres");


  $objViaje = new Viaje(46598, "brasil", 10, $arregloPasajeros, $objResponsable);


 do{
    $eleccion = menu();
    switch ($eleccion) {
        case 1:
            echo $objViaje->mostrarPasajeros($arregloPasajeros)."\n";
            echo "\nINGRESE EL DNI DEL PASAJERO QUE DESEA MODIFICAR: ";
            $dniBuscado = trim(fgets(STDIN));
            $encontro = $objViaje->buscarPasajero($dniBuscado);
            if($encontro){
                echo "PASAJERO ENCONTRADO!\n";
                echo "MODIFICAR NOMBRE: ";
                $nombreNuevo=trim(fgets(STDIN));
                echo "MODIFICAR APELLIDO: ";
                $apellidoNuevo=trim(fgets(STDIN));
                echo "MODIFICAR TELEFONO: ";
                $telefonoNuevo=trim(fgets(STDIN));
                $arregloModificado = $objViaje->modificarPasajero( $nombreNuevo, $apellidoNuevo, $telefonoNuevo, $dniBuscado);
                echo "\nARREGLO MODIFICADO\n". $objViaje->mostrarPasajeros($arregloModificado);
            }
            else{
                echo "NO SE ENCONTRO A UN PASAJERO CON ESE DNI!\n";
            }
            break;

        case 2:
            echo "INGRESE LA CANTIDAD DE PASAJEROS QUE DESEA AGREGAR: ";
            $cantPasajeros = trim(fgets(STDIN));

            for ($i=0; $i < $cantPasajeros ; $i++) {
                echo "INGRESE NOMBRE: ";
                $nombre = trim(fgets(STDIN));
                echo "INGRESE APELLIDO: ";
                $apellido = trim(fgets(STDIN));
                echo "INGRESE NRO DOCUMENTO: ";
                $dni = trim(fgets(STDIN));
                while($objViaje->buscarPasajero($dni)){
                    echo "el dni ingresado ya se encuentra, por favor ingresar otro: ";
                    $dni = trim(fgets(STDIN));
                }
                echo "INGRESE TELEFONO: ";
                $telefono = trim(fgets(STDIN));
                $objPasajero5 = new Pasajero($nombre, $apellido, $telefono, $dni);
                $arregloPasajeros[]=$objPasajero5;
                $objViaje->setObjColeccionPasajeros($arregloPasajeros);
            }

            echo "\nARREGLO MODIFICADO\n". $objViaje->mostrarPasajeros($arregloPasajeros);
            break;

        case 3:
            echo "******MODIFIQUE LOS DATOS DEL RESPONSABLE DEL VIAJE******";
            echo "\nMODIFICAR NOMBRE DEL RESPONSABLE: ";
            $nombreResp = trim(fgets(STDIN));
            echo "MODIFICAR APELLIDO DEL RESPONSABLE: ";
            $apellidoResp = trim(fgets(STDIN));
            echo "MODIFICAR NUMERO DE EMPLEADO: ";
            $numeroEmpleado = trim(fgets(STDIN));
            while($objViaje->buscarResponsable($numeroEmpleado)){
                echo "el número de empleado ingresado es igual al anterior, por favor ingresar otro: ";
                $numeroEmpleado = trim(fgets(STDIN));
            }
            echo "MODIFICAR NUMERO DE LICENCIA: ";
            $numeroLicencia = trim(fgets(STDIN));
            $objResponsable = new ResponsableV($nombreResp, $apellidoResp, $numeroEmpleado, $numeroLicencia);
            $objViaje->setObjResponsable($objResponsable);
            echo "\nLOS DATOS DEL RESPONSABLE HAN SIDO MODIFICADOS CON EXITO\n";
            echo "\n". $objViaje->getObjResponsable();
            break;

        case 4:
            echo "\n" . $objViaje ;
            break;
    }
  }while($eleccion!=5);