<?php
//La clase "Pasajero VIP" tiene como atributos adicionales el número de viajero frecuente
// y cantidad de millas de pasajero
class PasajeroVIP extends Pasajero{
    private $numViajeroFrecuente;
    private $millasPasajero;

    public function __construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numPasaje,$numViajeroFrecuente,$millasPasajero)
    {
        parent::__construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numPasaje);
        $this->numViajeroFrecuente = $numViajeroFrecuente;
        $this->millasPasajero = $millasPasajero;
    }
    public function getNumViajero(){
        return $this->numViajeroFrecuente;
    }
    public function setNumViajero($num){
        $this->numViajeroFrecuente=$num;
    }
    public function getMillas(){
        return $this->millasPasajero;
    }
    public function setMillas($millas){
        $this->millasPasajero=$millas;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.="\n +  Numero viajero: ".$this->getNumViajero()."\n";
        $cadena.=" +  Millas: ".$this->getMillas()."\n";
        return $cadena;
    }
    /* Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe 
    aplicarse como incremento según las características del pasajero. Para un pasajero VIP
     se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 
     300 millas se realiza un incremento del 30% */
    public function darPorcentajeIncremento(){
        $porcentajeIncremneto = parent::darPorcentajeIncremento() + 0.35 ;
        $millasAcumuladas = $this->getMillas();
        if($millasAcumuladas > 300){
            $porcentajeIncremneto = 0.30;
        }
        return $porcentajeIncremneto;
    }
    





}