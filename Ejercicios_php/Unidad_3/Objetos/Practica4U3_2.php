<?php
abstract class Vehiculo{
    private $peso;
    private $color;

    public function __construct($peso,$color){
        $this->peso = $peso;
        $this->color = $color;
    }
    public static function ver_atributo(Object $obj){
        foreach ($obj as $key => $value) {
            echo $key.": ".$value."<br>";
        }
    }
    public function getPeso(){
        return $this->peso;
    }
    public function setPeso($peso){
        $this->peso = $peso;
    }
    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
    }
     public function circula(){
        echo "El vehiculo circula";
    }
    abstract protected function añadir_persona($peso_persona);
    public function __toString()
    {
        return "Peso: $this->peso  Color: $this->color";
    }
}

class Cuatro_ruedas extends Vehiculo{
    private $numero_ruedas=4;
    public function repintar($color){
        parent::setColor($color);
        echo "El colores es: $color";
    }
    public function añadir_persona($peso_persona){
        parent::setPeso(parent::getPeso() + $peso_persona);
    }
    public function getNumero_ruedas(){
        return $this->numero_ruedas;
    }
    public function setNumero_ruedas($numero_ruedas){
        $this->numero_ruedas = $numero_ruedas;
    }

    public function __toString()
    {
        return parent::__toString()."  Numero de ruedas: $this->numero_ruedas";
    }
}

class Coche extends Cuatro_ruedas{
    private $numero_cadenas_nieve=0;
    public function añadir_cadenas_nieve($n){
        $this->numero_cadenas_nieve+= $n;
    }
    public function quitar_cadenas_nieve($n){
        $this->numero_cadenas_nieve-= $n;
    }
    public function getNumero_cadenas_nieve(){
        return $this->numero_cadenas_nieve;
    }
    public function setNumero_cadenas_nieve($numero_cadenas_nieve){
        $this->numero_cadenas_nieve = $numero_cadenas_nieve;
    }
    public function __toString()
    {
        return parent::__toString(). " Numero de cadenas nieve: $this->numero_cadenas_nieve";
    }
}

class Camion extends Cuatro_ruedas{
    private $longitud=0;
    public function añadir_longitud($l){
        $this->longitud+= $l;
    }
    public function getLongitud(){
        return $this->longitud;
    }
    public function setLongitud($longitud){
        $this->longitud = $longitud;
    }
    public function añadir_remolque($longitud_remolque){
        $this->longitud+= $longitud_remolque;
    }
    public function __toString()
    {
        return parent::__toString(). " Longitud: $this->longitud";}
}

class Dos_ruedas extends Vehiculo{
    private $cilindrada=125;
    public function añadir_persona($peso_persona){
        parent::setPeso(parent::getPeso() + $peso_persona+2);
    }
    public function poner_gasolina($l){
        parent::setPeso(parent::getPeso() + $l);
    }   
    public function getCilindrada(){
        return $this->cilindrada;
    }
    public function setCilindrada($cilindrada){
        $this->cilindrada = $cilindrada;
    }
    public function __toString()
    {
        return parent::__toString(). " Cilindrada: $this->cilindrada";
    }
    }
?>