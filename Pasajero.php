<?php
class Pasajero{
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    private $numAsiento;
    private $numPasaje;
    
    public function __construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numPasaje)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
        $this->numAsiento = $numAsiento;
        $this->numPasaje = $numPasaje;
        
    }
    // GETTERS Y SETTERS
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getDocumento(){
        return $this->documento;
    }
    public function setDocumento($num){
        $this->numAsiento=$num;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function getNumAsiento(){
        return $this->numAsiento;
    }
    public function setNumAsiento($num){
        $this->numAsiento=$num;
    }
    public function getNumPasaje(){
        return $this->numAsiento;
    }
    public function setNumPasaje($num){
        $this->numPasaje=$num;
    }
    
    public function __toString()
    {
        return "  Nombre: ".$this->getNombre()."\n".
               "   Apellido: ".$this->getApellido()."\n".
               "   Documento: ".$this->getDocumento()."\n".
               "   Telefono: ".$this->getTelefono()."\n".
               "   Numero asiento: ".$this->getNumAsiento()."\n".
               "   Numero pasaje: ".$this->getNumPasaje()."\n";
;
    }

    /*Implementar el método darPorcentajeIncremento() que retorne el porcentaje que 
    debe aplicarse como incremento según las características del pasajero
    Por último, para los pasajeros comunes el porcentaje de incremento es del 10 % */
    public function darPorcentajeIncremento(){
        $porcentajeIncremneto= 0;
        return $porcentajeIncremneto;
    }
}