<?php 
/*La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden 
requerir servicios especiales como sillas de ruedas, asistencia para el embarque o 
desembarque, o comidas especiales para personas con alergias o restricciones alimentarias*/
class PasajeroEspecial extends Pasajero{
    private $sillaDeRuedas;   //boolean : si requiere silla de ruedas true
    private $asistencia;      //boolean : si requiere asistencia true
    private $comidaEspecial;  //boolean : si requiere comida especial true

    //Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia 
    // y comida especial entonces
    public function __construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numPasaje,$sillaDeRuedas,$asistencia,$comidaEspecial)
    {
        parent::__construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numPasaje);
        $this->sillaDeRuedas = $sillaDeRuedas;
        $this->asistencia = $asistencia;
        $this->comidaEspecial = $comidaEspecial;

    }
    public function getSilla(){
        return $this->sillaDeRuedas;
    }
    public function setSilla($respuesta){
        $this->sillaDeRuedas=$respuesta;
    }
    public function getAsistencia(){
        return $this->asistencia;
    }
    public function setAsistencia($respuesta){
        $this->asistencia=$respuesta;
    }
    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }
    public function setComidaEspecial($comida){
        $this->comidaEspecial=$comida;
    
    }
    public function __toString()
    {
        $cadena= parent::__toString();
        $cadena.="\n +  Silla de ruedas: ".$this->getSilla()."\n";
        $cadena.=" +  Asistencia: ".$this->getAsistencia()."\n";
        $cadena.=" +  Comida especial: ".$this->getComidaEspecial()."\n";
        $cadena.=" +  Porcentaje incremento: ".$this->darPorcentajeIncremento()."\n";       
        return $cadena;
    }
    /* Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia
    y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere 
    uno de los servicios prestados entonces el incremento es del 15% */
    public function darPorcentajeIncremento(){
        $requiereSillaRuedas = $this->getSilla();
        $requiereAsistencia = $this->getAsistencia();
        $comidaEspecial = $this->getComidaEspecial();
        $incremento = parent::darPorcentajeIncremento();
        if($requiereSillaRuedas == "si" && $requiereAsistencia == "si" &&  $comidaEspecial== "si"){
            $incremento = 0.30;
        }elseif($requiereSillaRuedas == "si" || $requiereAsistencia == "si" ||  $comidaEspecial== "si"){
            $incremento = 0.22;
        }
        return $incremento;
    }
}               