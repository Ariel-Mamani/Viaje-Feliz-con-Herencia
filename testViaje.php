<?php
include 'ViajeFeliz.php';
include 'Pasajero.php';
include 'ResponsableV.php';
include 'PasajeroVip.php';
include 'PasajeroEspecial.php';
include 'PasajeroEstandar.php';


// COLECCION DE PASAJEROS
//$nombre,$apellido,$documento,$telefono,$numAsiento,$numPasaje
$objPasajero1 = new PasajeroEstandar("esteban","quito","3333333",29900000,5,10);
$objPasajero2 = new PasajeroVip("yaqui","sieras","44444444",29911111,6,11,2,200);
$objPasajero3 = new PasajeroEspecial("ines","cesario","55555555",29222222,7,12,"si","si","si");
$objPasajero4 = new PasajeroVip("luis","luis","66666666",29933333,8,13,6,400);
$colPasajero = [$objPasajero1,$objPasajero2,$objPasajero3,$objPasajero4];

$objResponsable = new Responsable("17",215477,"luis","luis");
$objViaje = new Viaje(0021,"san martin",5,$colPasajero,$objResponsable,10,0);
//echo $objViaje->mostrarPasajeros();

//Menu modifiicar informacion del viaje
function menu_ModifInfo_viaje(){
    echo "_______________________________________________\n";
    echo "         ¿que desea modificar del viaje?       \n";
    echo "              1) El codigo                     \n";
    echo "              2) El destino                    \n";
    echo "           3) La capacidad maxima              \n";
    echo "              4) Costo viaje                   \n";
    echo "_______________________________________________\n";
    $opcion= trim(fgets(STDIN));
    echo "\n";
    return $opcion;
} 
//Menu modifica informacion del pasajero
function menu_ModifInfo_pasajero(){
    echo "_______________________________________________\n";
    echo "      ¿que desea modificar del pasajero?       \n";
    echo "              1) El nombre                     \n";
    echo "              2) El apellido                   \n";
    echo "              3) El DNI                        \n";
    echo "              4) El telefono                   \n";
    echo "_______________________________________________\n";
    $opcion= trim(fgets(STDIN));
    echo "\n";
    return $opcion;
}

//Menu modifica informacion del responsable
function menu_ModifInfo_responsable(){
    echo "_______________________________________________\n";
    echo "      ¿que desea modificar del responsable?    \n";
    echo "              1) El numero empleado            \n";
    echo "              2) El nombre                     \n";
    echo "              3) El apellido                   \n";
    echo "_______________________________________________\n";
    $opcion= trim(fgets(STDIN));
    echo "\n";
    return $opcion;
}

function solicitarDatosPasajero(){
    echo "Ingrese nombre del pasajero: ";
    $nombre=trim(fgets(STDIN));
    echo "Ingrese el apellido: ";
    $apellido=trim(fgets(STDIN));
    echo "Ingrese el DNI: ";
    $dni=trim(fgets(STDIN));
    echo "Ingrese el numero de telefono: ";
    $telefono=trim(fgets(STDIN));
    echo "Ingrese el numero de asiento: ";
    $numAsiento=trim(fgets(STDIN));
    echo "Ingrese el numero de pasajero: ";
    $numPasajero=trim(fgets(STDIN));
    echo "Ingrese el tipo de pasajero a cargar: estandar - vip - especial: ";
    $tipoPasajero = trim(fgets(STDIN));
    if($tipoPasajero == "estandar"){
        $objPasajeroNuevo= new PasajeroEstandar($nombre,$apellido,$dni,$telefono,$numAsiento,$numPasajero);
    }elseif($tipoPasajero == "vip"){
        echo "Ingrese las millas del pasajero: \n ";
        $millas = trim(fgets(STDIN));
        echo "Ingrese el numero de viajero frecuente: \n";
        $numViajeroFrecuente = trim(fgets(STDIN));
        $objPasajeroNuevo = new PasajeroVIP($nombre,$apellido,$dni,$telefono,$numAsiento,$numPasajero,$numViajeroFrecuente,$millas);
    }elseif($tipoPasajero == "especial"){
        echo "Ingrese si necesita silla de ruedas el pasajero: \n ";
        $sillaDeRuedas = trim(fgets(STDIN));
        echo "Ingrese si necesita asistencia el pasajero: \n";
        $asistencia = trim(fgets(STDIN));
        echo "Ingrese si necesita comida especial el pasajero: \n ";
        $comida = trim(fgets(STDIN));
        $objPasajeroNuevo = new PasajeroEspecial($nombre,$apellido,$dni,$telefono,$numAsiento,$numPasajero,$sillaDeRuedas,$asistencia,$comida);
    }
    
    return $objPasajeroNuevo;
}

do{
    echo "Menú de opciones\n".
         "********************************************************\n".
         "* 1) Cargar la información del viaje                   *\n".
         "* 2) Modificar datos del viaje                         *\n".
         "* 3) Modificar pasajero                                *\n".
         "* 4) Modificar responsable                             *\n".
         "* 5) Vender pasaje                                     *\n".
         "* 6) Ver datos del viaje                               *\n".
         "********************************************************\n".
         "Ingrese la opcion deseada: ";    
    $opcion = trim(fgets(STDIN));
    $i=0;  //es para que cuando cargue los datos del viaje no permita cargarlos de nuevo
    switch($opcion){
        case 1:
            if($i==0){
                //codigo,$dest,$cantMax,$colPasajeros,$responsable,$costoViaje,$sumaCostoAbonados
                echo "Ingrese el codigo del viaje: ";
                $codigo=trim(fgets(STDIN));
                echo "Ingrese el destino: ";
                $destino=trim(fgets(STDIN));
                echo "Ingrese una cantidad maxima de pasajeros: ";
                $limitePasajeros=trim(fgets(STDIN));
                echo "Ingrese el valor del viaje: $ ";
                $costoViajes=trim(fgets(STDIN));
                $sumaCosto = $objViaje->getSumaCosto();
                $objViaje= new Viaje($codigo,$destino,$limitePasajeros,$colPasajero,$colResponsables,$costoViajes,$sumaCosto);
                echo $objViaje;
                $i++;
            }else{
                echo "ya cargo los datos del viaje, elija la opcion 2 para modificar";
            }
        break;
        case 2:
            echo menu_ModifInfo_viaje();
            $eleccion = menu_ModifInfo_viaje();
            modificaViaje($objViaje,$eleccion);
        break;
       case 3:
            modificaInfoPasajero($objViaje);
            if($objViaje->verificaEspacio() != false ){
                echo "Se agrego correctamente un pasajero";
                echo $objViaje->retornaCadena($objViaje->getPasajeros());
            }else{
                echo "++++++++++++ NO HAY ESPACIO ++++++++++++++ \n ";
            }
        break;
        case 4:
            modificaInformacionResponsable($objViaje);
        break;
        case 5:
            $nuevoPasajero= solicitarDatosPasajero();
            echo "Su importe a abonar es de $".$objViaje->venderPasaje($nuevoPasajero)."\n";
        break;
        case 6:
            echo $objViaje;
        break;
        default:
            echo "OPCION INCORRECTA, ingrese opcion valida 1 al 5 \n";
    }
    
}while($opcion>0);

//Funcion que modifica los datos del viaje
function modificaViaje($objViaje,$eleccion){
    switch($eleccion){
        case 1:
            echo "Codigo actual: ".$objViaje->getCodigo()."\n";
            echo "Ingrese el nuevo codigo para cambiarlo: "."\n";
            $nuevoCodigo= trim(fgets(STDIN));
            $objViaje->setCodigo($nuevoCodigo);
            echo "El codigo se cambio correctamente";
        break;
        case 2:
            echo "Destino Actual: ".$objViaje->getDestino()."\n";
            echo "Ingrese el nuevo destino: "."\n";
            $nuevoDestino= trim(fgets(STDIN));
            $objViaje->setDestino($nuevoDestino);
            echo "El destino se cambio correctamente";
        break;
        case 3:
            echo "Capacidad actual: ".$objViaje->getCodigo()."\n";
            echo "Ingrese la nueva capacidad para cambiarla:\n";
            $nCapacidadMaxima= trim(fgets(STDIN));
            $objViaje->setCantMaxima($nCapacidadMaxima);
            echo "La capacidad maxima se cambio correctamente \n";
        break;
        default:
            echo "OPCION INCORRECTA, ingrese opcion valida 1 al 3 \n";
    }
}

//Funcion que modifica la informacion del pasajero
function modificaInfoPasajero($elViaje){
    $pasajeros= $elViaje->getPasajeros();
    echo "En el viaje hay". count($pasajeros). "pasajeros \n";
    echo $elViaje->mostrarPasajero();
    echo "Ingrese el DNI del pasajero que quiere modificar su informacion:\n";
    $dniPasajero= trim(fgets(STDIN));
    $aPasajero= $elViaje->buscarPasajero($dniPasajero);
    $unPasajero= null;
    if($aPasajero != null){
        $unPasajero=$pasajeros[$aPasajero];
        switch(menu_ModifInfo_pasajero()){
            case 1:
                echo $unPasajero->getNombre(). " es el nombre actual \n";
                echo "Se cambiara a: ";
                $nuevoNombre= trim(fgets(STDIN));
                $unPasajero->setNombre($nuevoNombre);
                echo "Se cambio correctamente a ". $unPasajero->getNombre(). "\n";
            break;
            case 2:
                echo $unPasajero->getApellido(). " es el apellido actual \n";
                echo "Se cambiara a: ";
                $nuevoApellido= trim(fgets(STDIN));
                $unPasajero->setApellido($nuevoApellido);
                echo "Se cambio correctamente a ". $unPasajero->getApellido(). "\n";
            break;
            case 3:
                echo $unPasajero->getTelefono(). " es el telefono actual \n";
                echo "Se cambiara a: ";
                $nuevoTelefono= trim(fgets(STDIN));
                $unPasajero->setTelefono($nuevoTelefono);
                echo "Se cambio correctamente a ". $unPasajero->getTeleono(). "\n";
            break;
            case 4:
                echo $unPasajero->getNombre(). " es el nombre actual \n";
                echo "Se cambiara a: ";
                $nuevoNombre= trim(fgets(STDIN));
                echo $unPasajero->getApellido(). " es el apellido actual \n";
                echo "Se cambiara a: ";
                $nuevoApellido= trim(fgets(STDIN));
                echo $unPasajero->getTelefono(). " es el telefono actual \n";
                echo "Se cambiara a: ";
                $nuevoTelefono= trim(fgets(STDIN));
                echo "Se cambiaron correctamente los datos \n";
            break;
            default:
                echo "OPCION INCORRECTA, ingrese opcion valida 1 al 4 \n";
        }
    }else{
        echo "No existe un pasajero con ese numero de documento. Lo damos de alta? s/n \n";
        $respuesta= trim(fgets(STDIN));
        if($respuesta== "s"){
            $unPasajero =solicitarDatosPasajero();  
        }
    }
    return $unPasajero;

}



//Funcion que modifica la informacion del responsable
function modificaInformacionResponsable($elViaje){
    $responsable=$elViaje->getResponsable();
    switch(menu_ModifInfo_responsable()){
        case 1:
            echo $responsable->getNumEmpleado()." es el numero de empleado \n";
            echo "Se cambiara a: ";
            $nuevoNumEmpleado= trim(fgets(STDIN));
            $responsable->setNumEmpleado($nuevoNumEmpleado);
            echo "Se cambio correctamente a: ".$responsable->getNumEmpleado()."\n";  
        break;
        case 2:
            echo $responsable->getNombre(). " es el nombre \n";
            echo "Se cambiara a: ";
            $nuevoNombre= trim(fgets(STDIN));
            $responsable->setNombre($nuevoNombre);
            echo "Se cambio correctamente a: ". $responsable->getNombre()."\n";
        break;
        case 3:
            echo $responsable->getApellido()." es el apellido \n";
            echo "Se cambiara a: ";
            $nuevoApellido= trim(fgets(STDIN));
            $responsable->setApellido($nuevoApellido);
            echo "Se cambio correctamente a: ". $responsable->getApellido()."\n";
        break;
        case 4:
            echo $responsable->getNumEmpleado(). " es el numero de empleado \n";
            echo "Se cambiara a: ";
            $nuevoNumEmpleado= trim(fgets(STDIN));
            echo $responsable->getNombre(). " es el nombre \n";
            echo "Se cambiara a: ";
            $nuevoNombre= trim(fgets(STDIN));
            echo $responsable->getApellido()." es el apellido \n";
            echo "Se cambiara a: ";
            $nuevoApellido= trim(fgets(STDIN));
            $responsable->modificarResponable($nuevoNumEmpleado,$nuevoNombre,$nuevoApellido);
            echo "Se cambiaron correctamente los datos \n";
        break;
        default:
            echo "OPCION INCORRECTA, ingrese opcion valida 1 al 4 \n";
    }
}

