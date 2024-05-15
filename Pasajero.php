<?php
class Pasajero{
    private $nombre;
    private $dni;
    private $numAsiento;
    private $numTicket;
    private $porcentajIncremento;
    
    public function __construct($nombre,$dni,$asiento,$ticket)
    {
        $this->nombre=$nombre;
        $this->dni=$dni;
        $this->numAsiento=$asiento;
        $this->numAsiento=$ticket;
        $this->porcentajIncremento=10;
        
    }
    // GETTERS Y SETTERS
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni=$dni;
    }
    public function getNumAsiento(){
        return $this->numAsiento;
    }
    public function setNumAsiento($num){
        $this->numAsiento=$num;
    }
    public function getTicket(){
        return $this->numTicket;
    }
    public function setTicket($ticket){
        $this->numTicket=$ticket;
    }
    public function getPorcentajeIncremento(){
        return $this->porcentajIncremento;
    }
    public function setPorcentajeIncremento($porcentaje){
        $this->porcentajIncremento=$porcentaje;
    }
    
    public function __toString()
    {
        return "  Nombre: ".$this->getNombre()."\n".
               "   DNI: ".$this->getDni()."\n".
               "   Numero asiento: ".$this->getNumAsiento()."\n".
               "   Numero de ticket del viaje: ".$this->getTicket()."\n".
               "   Porcentaje incremento: ".$this->getPorcentajeIncremento()."%"."\n";
;
    }

    /*Implementar el método darPorcentajeIncremento() que retorne el porcentaje que 
    debe aplicarse como incremento según las características del pasajero
    Por último, para los pasajeros comunes el porcentaje de incremento es del 10 % */
    public function darPorcentajeIncremento(){
        $porcentajeIncremneto= $this->getPorcentajeIncremento();
        return $porcentajeIncremneto;
    }
}