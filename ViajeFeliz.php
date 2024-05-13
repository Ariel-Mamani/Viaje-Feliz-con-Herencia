<?php
class Viaje{
    private $codigoViaje;
    private $destino;
    private $cantMaximaPasajeros;    
    private $colPasajeros;             
    private $objPesponsable;  
    private $costoViaje;
    private $sumaCostoAbonados;

    //Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos 
    //abonados por los pasajeros
    public function __construct($codigo,$dest,$cantMax,$colPasajeros,$responsable,$costoViaje,$sumaCostoAbonados)
    {
        $this->codigoViaje = $codigo;
        $this->destino = $dest;
        $this->cantMaximaPasajeros = $cantMax;
        $this->colPasajeros = $colPasajeros;
        $this->objPesponsable = $responsable;
        $this->costoViaje = $costoViaje;
        $this->sumaCostoAbonados = $sumaCostoAbonados;

    }
    // GETTERS Y SETTERS
    public function getCodigo(){
        return $this->codigoViaje;
    }
    public function setCodigo($num){
        $this->codigoViaje = $num;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($lugar){
        $this->destino = $lugar;
    }
    public function getCantMaxima(){
        return $this->cantMaximaPasajeros;
    }
    public function setCantMaxima($num){
        $this->cantMaximaPasajeros = $num;
    }
    public function getPasajeros(){
        return $this->colPasajeros;
    }
    public function setPasajeros($pasajeros){
        $this->colPasajeros=$pasajeros;
    }
    public function getResponsable(){
        return $this->objPesponsable;
    }
    public function setResponsable($responsable){
        $this->objPesponsable = $responsable;
    }
    public function getCostoViaje(){
        return $this->costoViaje;
    }
    public function setCostoViaje($costo){
        $this->costoViaje = $costo;
    }
    public function getSumaCosto(){
        return $this->sumaCostoAbonados;
    }
    public function setSumaCosto($suma){
        $this->sumaCostoAbonados = $suma;
    }

    public function __toString()
    {
        return "*CODIGO DEL VIAJE: ".$this->getCodigo()."\n".
               "*DESTINO: ".$this->getDestino()."\n".
               "*CAMTIDAD MAXIMA DE PASAJEROS: ".$this->getCantMaxima()."\n".
               "*PASAJEROS: "."\n".$this->mostrarPasajeros()."\n".
               "*RESPONSABLE: "."\n".$this->getResponsable()."\n".
               "*COSTO VIAJE: "."\n".$this->getCostoViaje()."\n".
               "*SUMA COSTOs ABONADOS: "."\n".$this->getSumaCosto()."\n";
    }
    //MUESTRA paajeros
    public function mostrarPasajeros(){
        $pasajeros=$this->getPasajeros();
        $i=1;
        foreach($pasajeros as $pasajero){
            echo $i.": ".$pasajero."\n";
            $i++;
        }
    }
    //Verifica que haya lugar para agregar un pasajero mas
    public function verificaEspacio(){
        $verifica=false;
        $maximo=$this->getCantMaxima();
        $cantPasajeros=$this->getPasajeros();
        if(count($cantPasajeros)<$maximo){
            $verifica=true;
        }
        return $verifica;
    }

    // VERIFICA que el pasajero no este cargado mas de una vez en el viaje
    public function pasajeroCargado($documento){
        $dni=$documento;
        $coleccionPasajeros=$this->getPasajeros();
        $bandera=false;
        $i=0;
        while($i<count($coleccionPasajeros) && $bandera){
            if($coleccionPasajeros[$i]->getDni()==$dni){
                $bandera=true;
            }
            $i++;
        }
        return $bandera;
    }
    //Agrega un pasajero
    public function agregarPasajero($objPasajero){
        $coleccionPasajeros=$this->getPasajeros();
        array_push($coleccionPasajeros,$objPasajero);
        $nuevaColPasajeros=$this->setPasajeros($coleccionPasajeros);
        return $nuevaColPasajeros;
    }
    
    // Agrega responsable
    public function agregarResponsable($objResponsable){
        $responsable=$this->getResponsable();
        array_push($coleccionPasajeros,$objResponsable);
        $nuevaColPasajeros=$this->setPasajeros($coleccionPasajeros);
        return $nuevaColPasajeros;
    }
    // Muestra coleccion de pasajeros
    public function muestraPasajeros(){
        $colPasajeros=$this->getPasajeros();
        $cadena=" ";
        $numPasajero=0;
        for($i=0;$i<count($colPasajeros);$i++){
            $numPasajero++;
            $pasajero=$colPasajeros[$i];
            $cadena= $cadena."Pasajero: ".$numPasajero.":\n".$pasajero."\n";
        }
        return $cadena;
    }
    
    //Funcion que SETEA los valores que tenia objViaje(codigo,destino,capacidad maxima)
    public function modificaInformacion($codigo,$destino,$cantMaxima){
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantMaxima($cantMaxima);
    }
    

    /* Implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero
     a la colección de pasajeros (solo si hay espacio disponible), actualizar los costos 
     abonados y retornar el costo final que deberá ser abonado por el pasajero */
    public function venderPasaje($objPasajero){
        $cosoAbonar = -1;
        $costoViaje= $this->getCostoViaje();
        $dniPasajero = $objPasajero->getDni();
        $verificaEspacio = $this->verificaEspacio();
        $pasajeroCargardo = $this->pasajeroCargado($dniPasajero);
        if($verificaEspacio &&  $pasajeroCargardo ){
            $this->agregarPasajero($objPasajero); 
            $costoAbonar= $costoViaje + ($costoViaje*($objPasajero->darPorcentajeIncremento()/100));
            $costoAbonadoPorPasajeros= $this->getSumaCosto();
            $costoAbonadoPorPasajeros+= $costoAbonar;
            $this->setSumaCosto($costoAbonadoPorPasajeros);
        }
        return $cosoAbonar;
    }

    /*Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad 
    de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso 
    contrario */
    public function  hayPasajesDisponible(){
        $verifica=false;
        $colPasajeros= $this->getPasajeros();
        $cantMax= $this->getCantMaxima();
        if(count($colPasajeros) < $cantMax){
            $verifica=true;
        }
        return $verifica;
    }
}
