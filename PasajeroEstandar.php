<?php

class PasajeroEstandar extends Pasajero{

    public function __construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numPasaje)
    {
        parent:: __construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numPasaje);
    }

    /*Implementar el método darPorcentajeIncremento() que retorne el porcentaje que 
    debe aplicarse como incremento según las características del pasajero
    Por último, para los pasajeros comunes el porcentaje de incremento es del 10 % */
    public function darPorcentajeIncremento(){
        $porcentajeIncremneto = parent:: darPorcentajeIncremento();
        $porcentajeIncremneto= 0.1;
        return $porcentajeIncremneto;
    }
    public function __toString()
    {
        return parent:: __toString()."\n"."Incremento: ". $this->darPorcentajeIncremento()."\n";
    }
}